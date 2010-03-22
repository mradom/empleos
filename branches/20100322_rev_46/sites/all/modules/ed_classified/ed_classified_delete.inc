<?php
  // $Id: ed_classified.module,v 1.1.2.19 2007/03/09 01:19:00 inactivist Exp 
  /**
   * Node deletion facilities.
   * Michael Curry, Exodus Development, Inc.
   * exodusdev@gmail.com
   * for more information, please visit http://exodusdev.com
   * Copyright (c) 2006, 2007 Exodus Development, Inc.  All Rights Reserved. 
   * Licensed under the terms of the GNU Public License (GPL) version 2.  Please see LICENSE.txt for
   * license terms.  Posession and use of this code signifies acceptance of license
   * terms.
   */


/**
 * Reimplement the node_delete code, because the code in node_delete
 * performs an access check for node deletion rights
 * This can be made more efficient, if needed.
 */

function _ed_classified_delete($nid) {
  $node = node_load($nid);
  // sanity check: only delete if:
  // Node found, nid != 0, node is unpublished (stats == 0) and it is truly a classified ad.
  if ($node && $node->nid != 0 && 0 == $node->status && _ed_classified_node_is_classified($node)) {
    db_query('DELETE FROM {node} WHERE nid = %d', $node->nid);
    db_query('DELETE FROM {node_revisions} WHERE nid = %d', $node->nid);

    // Call the node-specific callback (if any):
    node_invoke($node, 'delete');
    node_invoke_nodeapi($node, 'delete');

    // Remove this node from the search index if needed.
    if (function_exists('search_wipe')) {
      search_wipe($node->nid, 'node');
    }
  }
}
