<?php

// $Id: zend_gdata.inc,v 1.1.2.6 2008/05/23 17:27:30 jhedstrom Exp $

/**
 * @file Provide an abstracted API for interfacing with the Zend GData
 *   client library
 */

// Upload token url
define('VIDEO_UPLOAD_GDATA_TOKEN_UPLOAD_URL', 'http://gdata.youtube.com/action/GetUploadToken');

// note the different schemes for categories and developer tags
define('VIDEO_UPLOAD_GDATA_CATEGORIES_SCHEME', 'http://gdata.youtube.com/schemas/2007/categories.cat');
define('VIDEO_UPLOAD_GDATA_DEVELOPER_TAG_SCHEME', 'http://gdata.youtube.com/schemas/2007/developertags.cat');

// Authentication url
define('VIDEO_UPLOAD_GDATA_AUTHENTICATE_URL', 'https://www.google.com/youtube/accounts/ClientLogin');

/**
 * Wrapper function to include necessary Zend Gdata functions and
 * libraries
 */
function _video_upload_gdata_initialize($op) {
  _video_upload_gdata_set_include_path();
  // Include Zend loader class
  if (@include_once('Zend/Loader.php')) {
    switch ($op) {
    case 'authenticate' :
      Zend_Loader::loadClass('Zend_Gdata_ClientLogin', $inc_path);
      break;
    case 'youtube' :
      Zend_Loader::loadClass('Zend_Gdata_YouTube', $inc_path);
      break;
    }
    return true;
  }
  else {
    watchdog('video_upload', 'Couldn\'t find the Zend client libraries', WATCHDOG_ERROR);
  }
}

/**
 * Authenticate YouTube user account
 */
function _video_upload_gdata_authenticate_youtube() {
  // username
  $username = variable_get('video_upload_youtube_username', false);
  if (!$username) {
    watchdog('video_upload', t('No YouTube username set'), WATCHDOG_ERROR);
  }

  // password
  $password = variable_get('video_upload_youtube_password', false);
  if (!$password) {
    watchdog('video_upload', t('No YouTube password set'), WATCHDOG_ERROR);
  }

  if (!$username || !$password) {
    drupal_set_message(t('YouTube Uploads not currently available'), 'error');
    return false;
  }

  if (_video_upload_gdata_initialize('authenticate')) {
    try {
      $http_client = Zend_Gdata_ClientLogin::getHttpClient(
	$username, // username
        $password, // password
	$service = 'youtube',
	$client = null,
	$source = 'drupal',
	$loginToken = null,
	$loginCaptcha = null,
	VIDEO_UPLOAD_GDATA_AUTHENTICATE_URL
      );
    }
    catch (Zend_Gdata_App_AuthException $authEx) {
      drupal_set_message(t('YouTube uploads currently unavailable'), 'error');
      watchdog('video_upload', t('Authentication error for YouTube Account'), WATCHDOG_ERROR);
      return false;
    }
    catch (Zend_Gdata_App_HttpException $e) {
      drupal_set_message(t('YouTube uploads currently unavailable'), 'error');
      watchdog('video_upload', t('Authentication error for YouTube Account: %error', array('%error' => $e->getMessage())), WATCHDOG_ERROR);
      return false;
    }
  }
  else {
    return false;
  }

  // pass developer key
  $developer_key = variable_get('video_upload_youtube_developer_key', false);
  if (!$developer_key) {
    watchdog('video_upload', t('No developer key set'), WATCHDOG_ERROR);
    drupal_set_message(t('YouTube Uploads not currently available'), 'error');
    return false;
  }
  $http_client->setHeaders('X-GData-Key', 'key=' . $developer_key);

  return $http_client;
}

/**
 * @return object Zend YouTube object
 */
function _video_upload_gdata_youtube($http_client = null) {
  _video_upload_gdata_initialize('youtube');
  $yt = new Zend_Gdata_YouTube($http_client);
  return $yt;
}

/**
 * @return object Zend YouTube Video Entry object
 */
function _video_upload_gdata_video_entry() {
  _video_upload_gdata_initialize('youtube');
  $ytv = new Zend_Gdata_YouTube_VideoEntry();
  return $ytv;
}

/**
 * Get a YouTube Token Array
 * @param yt object     YouTube object
 * @param video object  A Video Entry object
 * @return array        Token Array
 */
function _video_upload_gdata_get_token_array($yt, $video) {
  $token_array = false;

  try {
    $token_array = $yt->getFormUploadToken($video, VIDEO_UPLOAD_GDATA_TOKEN_UPLOAD_URL);
  }
  catch (Zend_Gdata_App_HttpException $http_ex) {
    // here, we'll try one more time
    sleep(1);
    try {
      $token_array = $yt->getFormUploadToken($video, VIDEO_UPLOAD_GDATA_TOKEN_UPLOAD_URL);
    }
    catch (Zend_Gdata_App_HttpException $http_ex) {
      drupal_set_message(t('Video uploads currently unavailable. If this problem persists, contact the system administrator.'), 'error');
      watchdog('video_upload', t('YouTube Connection failed with @error', array('@error' => $http_ex->getMessage())), WATCHDOG_ERROR);
      return false;
    }
  }
  return $token_array;
}

/**
 * Construct a media group
 * @param yt object     YouTube Object
 * @param video object  A Video Entry Object
 * @param node object   Node Object
 * @param field array   Field Definition
 */
function _video_upload_gdata_construct_media_group(&$yt, &$video, $node, $field) {
  $mediaGroup = $yt->newMediaGroup();

  // Set the title
  $yt_title = _video_upload_set_default_title($node, $field);
  $mediaGroup->title = $yt->newMediaTitle()->setText($yt_title);

  // Description
  $yt_description = _video_upload_set_default_description($node, $field);
  $mediaGroup->description = $yt->newMediaDescription()->setText($yt_description);

  // Video Category
  // @fixme there is a descrepency between the available categories
  //   listed in the category scheme, and what YouTube actually
  //   accepts. For now, until this can be resolved, "Entertainment"
  //   is sent for everything.
  $_yt_category = 'Entertainment'; //_video_upload_get_video_category($node, $field);
  $yt_category = $yt->newMediaCategory()->setText($_yt_category)->setScheme(VIDEO_UPLOAD_GDATA_CATEGORIES_SCHEME);

  // developer tags
  $_yt_dev_tags = _video_upload_set_developer_tags($node, $field);
  foreach ($_yt_dev_tags as $dev_tag) {
    $yt_dev_tags[] = $yt->newMediaCategory()->setText($dev_tag)->setScheme(VIDEO_UPLOAD_GDATA_DEVELOPER_TAG_SCHEME);
  }

  // construct media group category array
  $mediaGroup->category = array_merge(array($yt_category), $yt_dev_tags);

  // public tags
  // @todo this should integrate with taxonomy at some point set
  //   keywords, please note that they cannot contain white-space
  $yt_keywords = _video_upload_get_video_keywords($node, $field);
  $mediaGroup->keywords = $yt->newMediaKeywords()->setText($yt_keywords);
    
  $video->mediaGroup = $mediaGroup;
}

/**
 * Modeled upon hook_requirements(), called from
 * video_upload_requirements()
 */
function _video_upload_gdata_requirements($phase) {
  _video_upload_gdata_set_include_path();
  $requirements = array();
  $t = get_t();

  if ($phase == 'runtime') {
    // Gdata download url
    define('VIDEO_UPLOAD_ZEND_GDATA_URL', 'http://framework.zend.com/download/gdata');

    // php version required by Gdata libraries
    define('VIDEO_UPLOAD_ZEND_GDATA_MINIMUM_PHP_VERSION', '5.1.4');

    // some boilerplate install text
    $install_details = $t('Information on installing the required library can be found <a href="!url">here</a>.', array('!url' => url('http://code.google.com/support/bin/answer.py?answer=76585')));

    if (PHP_VERSION < VIDEO_UPLOAD_ZEND_GDATA_MINIMUM_PHP_VERSION ) {
      $requirements['zend_loader'] = array(
        'title' => $t('Zend GData Library: PHP Version'),
        'value' => $t('Too low'),
        'description' => $t('The Zend Client library requires a PHP version of !zversion or higher, and this machine is running PHP version !phpversion', array('!zversion' => VIDEO_UPLOAD_ZEND_GDATA_MINIMUM_PHP_VERSION, '!phpversion' => PHP_VERSION)),
        'severity' => REQUIREMENT_ERROR,
      );
    }
    elseif (!@include_once('Zend/Loader.php')) {
      $requirements['zend_loader'] = array(
        'title' => $t('Zend Loader'),
        'value' => $t('Not found'),
        'severity' => REQUIREMENT_ERROR,
        'description' => $t('The Zend Client library loader is required by the Video Upload module, and has not been found. This is a strong indication that the required Zend Gdata libraries are not installed. These can be downloaded  <a href="!url">here</a>.<br /><br />!install', array('!url' => url(VIDEO_UPLOAD_ZEND_GDATA_URL), '!install' => $install_details)),
      );
    }
    elseif (!@include_once('Zend/Gdata.php')) {
      $requirements['zend_gdata'] = array(
        'title' => $t('Zend Gdata Library'),
        'value' => $t('Not Found'),
        'severity' => REQUIREMENT_ERROR,
        'description' => $t('The Zend Client library loader was found, but the GData library required by the Video Upload module was not. This can be downloaded  <a href="!url">here</a>.<br /><br />!install', array('!url' => url(VIDEO_UPLOAD_ZEND_GDATA_URL), '!install' => $install_details)),
      );
    }
  }
  return $requirements;
}

/**
 * Set include path for Zend GData client libraries, which should be
 * installed locally in the module directory.
 */
function _video_upload_gdata_set_include_path() {
  // include path must be modified
  static $path;
  if (!$path) {
    $path = get_include_path();
    set_include_path($path . PATH_SEPARATOR . drupal_get_path('module', 'video_upload'));
  }
}


/**
 * Check the status of a video object
 * @param $video object
 * @return object
 */
function _video_upload_gdata_get_video_status($video) {
  $status = new stdClass();
  try {
    $control = $video->getControl();
  }
  catch (Zend_Gdata_App_Exception $e) {
    return;
  }

  if ($control instanceof Zend_Gdata_App_Extension_Control) { 
    if ($control->getDraft() != null && $control->getDraft()->getText() == 'yes') {
      $state = $video->getVideoState();
      if ($state instanceof Zend_Gdata_YouTube_Extension_State) {
	switch ($state->getName()) {
	case 'rejected' :
	  $status->status = FALSE;
	  $status->message = $state->getText();
	  return $status;
	case 'processing' :
	  // can't determine final state if processing
	default:
	  return;
	}
      }
      else {
	// @fixme not sure what this means either
      }
    }
  }
  else {
    try {
      // @todo find a way to check the state other than
      //       grabbing a title.
      $state = $video->getVideoTitle();
    }
    catch (Zend_Gdata_App_Exception $e) {
      // @todo a useful error to watchdog
    }
    if ($state) {
      $status->status = TRUE;
    }
  }
  return $status;
}

/**
 * Get specified atom feed
 * @param string uri for the feed
 * @return array of Zend Gdata video objects
 */
function _video_upload_gdata_get_feed($uri, $yt) {
  try {
    $feed =  $yt->getVideoFeed($uri);
  }
  catch (Zend_Gdata_App_HttpException $e) {
    watchdog('video_upload', t('Video Upload: error getting video feed: @error', array('@error' => $e->getMessage())), WATCHDOG_ERROR);
    return false;
  }
  return $feed;
}

/**
 * Delete a video from YouTube
 */
function _video_upload_gdata_delete_video($yt, $video) {
  try {
    $result = $yt->delete($video);
    watchdog('video_upload', t('Video Upload: Video %id has been deleted from YouTube', array('%id' => $video->getVideoId())));
    // @todo return some useful feedback
  }
  catch (Zend_Gdata_App_HttpException $e) {
    watchdog('video_upload', t('Video Upload: error %error while attempting to delete video id @id', array('%error' => $e->getMessage(), '@id' => $video->getVideoId())), WATCHDOG_ERROR);
  }
}

/**
 * Update a video
 */
function _video_upload_gdata_update_video($yt, $video) {
  $url = $video->getEditLink()->getHref();
  try {
    $yt->updateEntry($video, $url);
    return true;
  }
  catch (Zend_Gdata_App_HttpException $e) {
    watchdog('video_upload', t('Video Upload: error %error while attempting to update video id @id', array('%error' => $e->getMessage(), '@id' => $video->getVideoId())), WATCHDOG_ERROR);
    return false;
  }
}


/**
 * Determine if a video is a Zend GData object instance
 */
function _video_upload_is_zend_object($video) {
  return $video instanceof Zend_Gdata_YouTube_VideoEntry;
}