<?php
// $Id: share_class.inc,v 1.1.2.2 2008/12/01 23:49:57 greenskin Exp $

class share {
  var $share_id;
  var $module = 'share';
  var $label;
  var $node_types = array();
  var $category_terms = array();
  var $where = 'link';
  var $view = 1;
  var $status = 1;
  var $tabs = array();

  function visible($teaser, $page = TRUE) {
    switch ($this->view) {
      case 0:
        if ($teaser && !$page) {
          return TRUE;
        }
        break;
      case 1:
        if (!$teaser && $page) {
          return TRUE;
        }
        break;
      case 2:
        if ($teaser || $page) {
          return TRUE;
        }
        break;
    }
    return FALSE;
  }

  function defaults() {
    $this->module = 'share';
    $this->label = t('Share popup');
    $this->name = t('Share');
    $this->effects = 1;
    $this->load_tabs();
  }

  function load($share_id) {
    $data = db_fetch_object(db_query("SELECT * FROM {share} AS s LEFT JOIN {share_share} AS s_share ON s.share_id = s_share.share_id WHERE s.share_id = %d", $share_id));

    foreach ($data as $key => $value) {
      switch ($key) {
        case 'node_types':
        case 'category_terms':
          $this->$key = unserialize($value);
          break;
        default:
          $this->$key = $value;
          break;
      }
    }
    $this->load_tabs();
  }

  function load_tabs() {
    $weights = array();
    $tabs = array();
    foreach (module_implements('share_info') as $module) {
      $tab = module_invoke($module, 'share_info');

      $tabs[$tab['id']] = (object)$tab;
      $tabs[$tab['id']]->module = $module;
      if ($this->share_id) {
        $tabs[$tab['id']]->enabled = 0;
      }
      $weights[$tab['id']] = $tab['weight'];
    }

    $result = db_query("SELECT * FROM {share_tabs} WHERE share_id = %d AND enabled = %d ORDER BY weight, title", $this->share_id, 1);
    while ($data = db_fetch_object($result)) {
      $tab = drupal_clone($data);
      $tab = (array)$tab;
      $tab_data = (object)module_invoke($data->module, 'share_tab', 'load', $this);
      $tab = $tab + (array)$tab_data;
      $tabs[$tab['id']] = (object)$tab;
      $weights[$tab['id']] = $tab['weight'];
    }

    array_multisort($weights, $tabs);
    $this->tabs = $tabs;
  }

  function render($node, $op = FALSE) {
    $output = '';
    switch ($op) {
      case 'link':
        $output .= l($this->name, 'share/'. $this->share_id .'/'. $node->nid, array('id' => 'share-'. $this->share_id .'-'. $node->nid, 'class' => 'share-link'));
        break;
      case 'popup':
        $output .= $this->render_popup($node);
        break;
      default:
        $output .= $this->render($node, 'link');
        $output .= $this->render($node, 'popup');
        break;
    }
    return $output;
  }

  function render_popup($node) {
    $tabs = array();
    $content = array();
    foreach ($this->tabs as $tab) {
      if (!$tab->enabled) {
        continue;
      }

      if ($result = $this->render_tab($tab, $node)) {
        $tabs[] = array(
          'id' => str_replace('_', '-', check_plain($tab->id)),
          'name' => $tab->title
        );

        $content[] = array(
          'id' => str_replace('_', '-', check_plain($tab->id)),
          'content' => $result
        );
      }
    }

    $data['tabs'] = theme('share_popup_tabs', $tabs, $node->nid);
    $data['content'] = theme('share_popup_content', $content, $node->nid);
    return theme('share_popup', $data);
  }

  function render_tab($tab, $node) {
    return module_invoke($tab->module, 'share_tab', 'process', $tab, $node);
  }
}
