<?php
// $Id: token_user.inc,v 1.2 2007/11/12 23:08:52 smk Exp $

/**
 * Implementation of hook_token_values()
 */
function user_token_values($type, $object = NULL, $options = array()) {
  $values = array();
  switch ($type) {
    case 'user':
      if (isset($object)) {
        $account = $object;
      }
      else {
        global $user;
        $account = user_load(array('uid' => $user->uid));
      }

      $values['user']           = $account->uid ? check_plain($account->name) : variable_get('anonymous', 'Anonymous');
      $values['user-raw']           = $account->uid ? $account->name : variable_get('anonymous', 'Anonymous');
      $values['uid']            = $account->uid;
      $values['mail']           = $account->uid ? $account->mail : '';
      $values['reg-date']       = $account->uid ? format_date($account->created, 'short') : '';
      $values['reg-since']      = $account->uid ? format_interval($account->created) : '';
      $values['log-date']       = $account->uid ? format_date($account->access, 'short') : '';
      $values['log-since']      = $account->uid ? format_interval($account->access) : '';
      $values['date-in-tz']     = $account->uid ? format_date(time(), 'short', '', $account->timezone) : '';
      $values['account-url']    = $account->uid ? url("user/$account->uid") : '';
      $values['account-edit']   = $account->uid ? url("user/$account->uid/edit") : '';

      if (module_exists('profile')) {
        $result = db_query('SELECT f.name, f.title, f.type, v.value FROM {profile_fields} f INNER JOIN {profile_values} v ON f.fid = v.fid WHERE uid = %d', $account->uid);
        while ($field = db_fetch_object($result)) {
          if (_profile_field_serialize($field->type)) {
            $field->value = unserialize($field->value);
          }
          $values[$field->name] = _user_profile_format_field($field);
        }
      }

      if (module_exists('nodeprofile')) {
        $field_types = _content_field_types();
        foreach (nodeprofile_get_types() as $nodeprofile_type) {
          // Try to load the first nodeprofile node for this type
          $node = node_load(array('uid' => $account->uid, 'type' => $nodeprofile_type->type));
          if ($node) {
            content_view($node);
            $content_info = content_types($nodeprofile_type->type);
            foreach ($content_info['fields'] as $field) {
              $items = $node->$field['field_name'];
              if (!empty($items)) {
                $function = $field_types[$field['type']]['module'] . '_token_values';
                if (function_exists($function)) {
                  $sub_list = $function('field', $items);
                  foreach($sub_list as $token => $value) {
                    $values[$field['type_name'] .'-'. $field['field_name'] .'-'. $token] = $value;
                  }
                }
              }
            }
          }
        }
      }

      break;
  }
  return $values;
}

/**
 * Implementation of hook_token_list()
 */
function user_token_list($type = 'all') {
  if ($type == 'user' || $type == 'all') {
    $tokens['user']['user']           = t("User's name");
    $tokens['user']['user-raw']           = t("User's unfiltered name. WARNING - raw user input.");

    $tokens['user']['uid']            = t("User's ID");
    $tokens['user']['mail']           = t("User's email address");
 
    $tokens['user']['reg-date']       = t("User's registration date");
    $tokens['user']['reg-since']      = t("Days since the user registered");
    $tokens['user']['log-date']       = t("User's last login date");
    $tokens['user']['log-since']      = t("Days since the user's last login");
    $tokens['user']['date-in-tz']     = t("The current date in the user's timezone");
    $tokens['user']['account-url']    = t("The URL of the user's profile page.");
    $tokens['user']['account-edit']   = t("The URL the user's account editing page.");

    if (module_exists('profile')) {
      $result = db_query('SELECT name, title FROM {profile_fields}');
      while ($field = db_fetch_object($result)) {
        $tokens['profile'][$field->name] = $field->title;
      }
    }

    if (module_exists('nodeprofile')) {
      $field_types = _content_field_types();
      foreach (nodeprofile_get_types() as $nodeprofile_type) {
        $content_info = content_types($nodeprofile_type->type);
        foreach ($content_info['fields'] as $field) {
          $sub_list = array();
          $function = $field_types[$field['type']]['module'] . '_token_list';
          if (function_exists($function)) {
            $sub_list = $function('field');
            foreach ($sub_list as $category => $token_list) {
              foreach ($token_list as $token => $description) {
                $tokens['Nodeprofile '. $category][$field['type_name'] .'-'. $field['field_name'] .'-'. $token] = $description;
              }
            }
          }
        }
      }
    }

    return $tokens;
  }
}

function _user_profile_format_field($field) {
  if ($field->value) {
    switch ($field->type) {
      case 'checkbox':
        return check_plain($field->title);
      case 'date':
        $format = substr(variable_get('date_format_short', 'm/d/Y - H:i'), 0, 5);
        // Note: Avoid PHP's date() because it does not handle dates before
        // 1970 on Windows. This would make the date field useless for e.g.
        // birthdays.
        $replace = array('d' => sprintf('%02d', $field->value['day']),
                         'j' => $field->value['day'],
                         'm' => sprintf('%02d', $field->value['month']),
                         'M' => map_month($field->value['month']),
                         'Y' => $field->value['year'],
                         'H:i' => NULL,
                         'g:ia' => NULL);
        return strtr($format, $replace);
      case 'list':
        $values = split("[,\n\r]", $field->value);
        $fields = array();
        foreach ($values as $value) {
          if ($value = trim($value)) {
            $fields[] = check_plain($value);
          }
        }
        return implode(', ', $fields);
      default:
        return check_plain($field->value);
    }
  }
}