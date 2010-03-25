<?php
// $Id: share_sharethis_class.inc,v 1.1.2.2 2008/12/17 15:45:24 greenskin Exp $

class share_sharethis extends share {
  function visible($teaser, $page = TRUE) {
    return parent::visible($teaser, TRUE);
  }

  function defaults() {
    $services = array(
      'reddit',
      'digg',
      'facebook',
      'myspace',
      'delicious',
      'stumbleupon',
      'technorati',
      'google_bmarks',
      'yahoo_bmarks',
      'yahoo_myweb',
      'windows_live',
      'propeller',
      'slashdot',
      'newsvine',
      'n4g',
      'mixx',
      'blinklist',
      'furl',
      'magnolia',
      'mister_wong'
    );

    $this->module = 'share_sharethis';
    $this->label = t('ShareThis popup');
    $this->name = t('ShareThis');
    $this->tabs = array('web', 'post', 'email');
    $this->services = $services;
    $this->icon;
    $this->publisher = 'd4a10265-492e-4646-82f0-bb513c7ca25f';
    $this->button = 1;
    $this->buttonText;
    $this->popup = 0;
    $this->offset = array(
      'top' => '',
      'left' => ''
    );
    $this->onclick;
    $this->code = '';
  }

  function load($share_id) {
    $data = db_fetch_object(db_query("SELECT * FROM {share} AS s LEFT JOIN {share_sharethis} AS s_share ON s.share_id = s_share.share_id WHERE s.share_id = %d", $share_id));
    $data->tabs = variable_get('share_sharethis_tabs', array('web', 'post', 'email'));
    $data->services = variable_get('share_sharethis_services', array('reddit','digg','facebook','myspace','delicious','stumbleupon','technorati','google_bmarks','yahoo_bmarks','yahoo_myweb','windows_live','propeller','slashdot','newsvine','n4g','mixx','blinklist','furl','magnolia','mister_wong'));
    $data->publisher = variable_get('share_sharethis_publisher', 'd4a10265-492e-4646-82f0-bb513c7ca25f');
    $data->code = variable_get('share_sharethis_code', '');

    foreach ($data as $key => $value) {
      switch ($key) {
        case 'node_types':
        case 'category_terms':
          $this->$key = unserialize($value);
          break;
        case 'offsetTop':
          $this->offset['top'] = ($value) ? $value : '';
          break;
        case 'offsetLeft':
          $this->offset['left'] = ($value) ? $value : '';
          break;
        default:
          $this->$key = $value;
          break;
      }
    }
  }

  function render($node) {
    static $sharethis = 0;

    if ($sharethis == 0) {
      if ($this->code) {
        drupal_set_html_head($this->code);
      } else {
        drupal_set_html_head($this->gen_head());
      }
      $sharethis++;
    }

    $output = '<script language="javascript" type="text/javascript">';
    $output.= 'SHARETHIS.addEntry('. $this->page_props($node) .', '. $this->advanced_settings() .')';
    $output.= '</script>';
    return $output;
  }

  function gen_setting($setting) {
    $string = array();
    foreach ($this->$setting as $value) {
      if ($value) {
        $string[] = $value;
      }
    }
    $string = implode(',', $string);
    return $string;
  }

  function gen_head() {
    $settings = array();
    $settings[] = 'tabs='. drupal_urlencode($this->gen_setting('tabs'));
    $settings[] = 'services='. drupal_urlencode($this->gen_setting('services'));
    $settings[] = 'charset=utf-8';
    $settings[] = 'style=default';
    $settings[] = 'publisher='. $this->publisher;

    $settings = implode('&amp;', $settings);

    return '<script type="text/javascript" src="http://w.sharethis.com/widget/?'. $settings .'"></script>';
  }

  function page_props($node) {
    $path = (isset($node->nid)) ? 'node/'. $node->nid : $_GET['q'];
    $path = drupal_get_path_alias($path);
    $props = array(
      'title' => $node->title,
      'url' => url($path, NULL, NULL, TRUE),
      'summary' => $node->teaser,
      'content' => $node->body,
      'updated' => $node->updated,
      'published' => $node->created,
      'author' => $node->author
    );
    foreach ($props as $key => $prop) {
      if (!$prop) {
        unset($props[$key]);
      }
    }
    if ($this->icon) {
      $props['icon'] = $this->icon;
    }

    return drupal_to_js($props);
  }

  function advanced_settings() {
    $advanced = array(
      'button' => TRUE
    );
    if ($this->buttonText) {
      $advanced['buttonText'] = $this->buttonText;
    }
    if ($this->popup) {
      $advanced['popup'] = $this->popup;
    }
    if ($this->onclick) {
      $advanced['onclick'] = $this->onclick;
    }
    if ($this->offset['top']) {
      $advanced['offsetTop'] = $this->offset['top'];
    }
    if ($this->offset['left']) {
      $advanced['offsetLeft'] = $this->offset['left'];
    }
    return drupal_to_js($advanced);
  }
}
