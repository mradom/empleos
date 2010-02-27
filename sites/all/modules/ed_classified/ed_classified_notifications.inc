<?php
  // $Id: ed_classified.module,v 1.1.2.19 2007/03/09 01:19:00 inactivist Exp 
  /**
   * user notifications for imple text-based classified ads module
   * Michael Curry, Exodus Development, Inc.
   * exodusdev@gmail.com
   * for more information, please visit http://exodusdev.com
   * Copyright (c) 2006, 2007 Exodus Development, Inc.  All Rights Reserved. 
   * Licensed under the terms of the GNU Public License (GPL) version 2.  Please see LICENSE.txt for
   * license terms.  Posession and use of this code signifies acceptance of license
   * terms.
   */
  
/**
 * Process notification email handling on cron run.
 * @param $time The timestamp to use for email processing.
 * This allows us to use a consistent timestamp value, 
 * and push in fake values for testing and diagnostic
 * purposes.
 */

function _ed_classified_process_notification_emails($time)
{
  // get a cutoff date for expiring classified ads
  $email_notify_end_date = $time + _ed_classified_days_to_seconds(_ed_classified_variable_get('ad_expiration_email_warning_days', EDI_CLASSIFIED_VAR_DEF_AD_EXPIRATION_EMAIL_WARNING_DAYS));
  //  _ed_classified_notify_ads_expiring_between($time,$email_notify_end_date); // TODO: probably don't need this.
  _ed_classified_notify_advertisers_periodic($time);
}

/**
 * Process "periodic" notifications
 * Create a notification if a user has ads nearing expiration
 */
function _ed_classified_notify_advertisers_periodic($time) {
  /*
   * Process notifications on period defined by admin
   * For example, never more than once in 24 hours.
   * But, don't slam server -- only do (n) messages per cron run? (admin-defined?) (later)
   * When done, record ending timestamp of last completed notification run
   * So: if the time since the last completed notification run is > admin-defined limit
   *   - get list of users needing reminder mails
   *   - process (format and send) a batch of emails
   *   - if done (no more users remaining) record completion time
   */

  $parms = _ed_classified_displayname_parms();
  // TODO: only run this once a day (or period defined by variable 'email_reminder_period_secs'
  if (_ed_classified_periodic_notification_time($time)) {
    // get list of users having published ads nearing expiration
    $target_time = $time + _ed_classified_days_to_seconds(_ed_classified_variable_get('ad_expiration_email_warning_days', EDI_CLASSIFIED_VAR_DEF_AD_EXPIRATION_EMAIL_WARNING_DAYS)); 
    _edi_wd(t('Processing notification emails for ads expiring soon (between now and !date)', array('!date' => format_date($target_time))));
    $result = db_query('SELECT DISTINCT({node}.uid) FROM {edi_classified_nodes} INNER JOIN {node} ON {edi_classified_nodes}.nid = {node}.nid WHERE ({node}.status = 1 AND edi_classified_nodes.expires_on < %d);', $target_time); 
    if ($result) {
      $count = 0;
      while ($uid = db_result($result,$count++)) {
        // todo: need bailout based on # of users emailed, total time spent
        $user = user_load(array('uid' => $uid));
        // todo: need to send mails only to those with user_access('reset classified ad expiration') && user_access('edit own classified ads') permissions
        if ($user) {
          if (!_ed_classified_send_user_reminder_email($user)) {
            _edi_wd(t('Unable to send ad expiration reminder email to user #!uid', array('!uid' => $uid)), WATCHDOG_ERROR);
          }
        }
        else {
          _edi_wd(t('Unable to load user !uid', array('!uid' => $uid)), WATCHDOG_ERROR);
        }

      }
    } 
    //
    // now record the fact that we completed processing notifications, and when
    _ed_classified_record_periodic_notifications(time());
  } // time to notify
}

/**
 * Send an email notification to the specified user
 */

function _ed_classified_send_user_reminder_email(&$user) {
  $parms = array('!sitename' => variable_get('site_name', ''),
                 '!user_ads_url' => url('user/'.$user->uid . '/'. EDI_CLASSIFIED_MODULE_NAME, NULL, NULL, TRUE),
                 '!siteurl' => url('', NULL, NULL, TRUE));
  $subject = t(_ed_classified_variable_get('email_subj', EDI_CLASSIFIED_VAR_DEF_EMAIL_SUBJ), $parms);
  $body = t(_ed_classified_variable_get('email_body', EDI_CLASSIFIED_VAR_DEF_EMAIL_BODY), $parms);
  $from = variable_get("site_mail", ini_get("sendmail_from")); // http://drupal.org/node/77689
  
  return drupal_mail(EDI_CLASSIFIED_MODULE_NAME . '-expiration-notify', $user->mail, $subject, $body, 
                     $from, "Reply-to: $from\nX-Mailer: Drupal\nReturn-path: $from\nErrors-to: $from");
}

/**
 * Record last periodic notification processing time
 */
function _ed_classified_record_periodic_notifications($time) {
  _ed_classified_variable_set('email_reminders_last_sent', $time);
}
/**
 * Return TRUE if we need to send periodic notifications according to time and configuration options
 * Only send notifications if sufficient time has passed since last notification run completed.
 */
function _ed_classified_periodic_notification_time($time) {
  $last_notify_time = _ed_classified_variable_get('email_reminders_last_sent', 0);
  $next_notify_time = $last_notify_time + _ed_classified_variable_get('email_reminder_period_secs', 86400); // only update notifications if haven't been notified in over 24 hours
  return ($time > $next_notify_time);
}

/**
 * Notify owners of ads nearing expiration
 */ 
/// DEAD CODE
/*****
function _ed_classified_notify_ads_expiring_between($start_date, $end_date) {
  // Get list of ads expiring between $start_date, and $end_date
  // Group the list by n.uid so we can process them using a single email.
  //   - get list of users having ads that expire soon
  //   - for each user
  //     get list of ads expiring soon (n.nid == classified.nid)

  // TODO: do we need the lower limit ($start_date) here?  Probably not
  $query="SELECT n.nid, n.title, n.created, n.uid, cn.expires_on FROM {node} n, {edi_classified_nodes} cn where n.type='ed_classified' AND n.status = 1 AND cn.expires_on > %d AND cn.expires_on < %d ;";
  $qr = db_query($query, $start_date, $end_date);
  while ($node = db_fetch_object($qr)) {
    // TODO: include a bailout to prevent hogging CPU (no more than NN seconds?)
    // get user email address for $nid
    $user = user_load(array('uid'=>$node->uid));
    if ($user) {
      $expires = _ed_classified_get_ending_date_html($node->expires_on);
      // echo "$node->title $expires,  USER: $user->uid $user->name $user->mail<br/>";
      // send an email via user_mail(...) api http://api.drupal.org/api/4.7/function/user_mail
      // record date sent
      // "UPDATE {edi_classified_nodes} SET expiration_notify_last_sent = %d
      if (module_exist('ed_notify_api')) {
        // TODO: record notification
      }
    }
  }
}
*/