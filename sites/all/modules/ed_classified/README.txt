$Id: README.txt,v 1.1.4.1 2007/02/20 05:47:26 inactivist Exp $

Simple Text-based classified ads module for Drupal.

Author: Michael Curry, Exodus Development, Inc.
exodusdev@gmail.com
http://exodusdev.com

This module creates a simple textual classified ad node type (ed_classified), and the 
following features: 

 - Automatic expiration (on expiration, node is moved to unpublished state.)
 - Automatic purge of expired ads (on purge, unpublished ads are deleted.)
 - Simple taxonomy-based browsing similar to that provided by image.module galleries.
   (Yes, I lifted some of that code from image.module, and modified it for my use.)
 - Several useful blocks (latest ads, most popular, and stats).  
 - Per-user classified ads lists (under the user's profile, at /user/n/ed_classified).
 - Admin: list of all classified ads, sortable by expiration date and other columns,
   at admin/content/node/ed_classified.

NOTE: This version supports MySQL databases only at present - no support for postgres.

=== Installation (Drupal 5) ===

The usual: Copy/unpack the module files to your modules directory in a directory named 
'ed_classified'.  So, if your site's modules are at /var/www/sites/default/modules, you
 should unpack these files to /var/www/sites/default/modules/ed_classified.

Go to admin/module and enable the module.  This will create the necessary tables.

=== Configuration (Drupal 5) ===

Go to admin/settings/ed_classified, and choose your options.  You should decide on an 
expiration and purge policy, as well as a max body length (in characters).

IMPORTANT: Add terms to the taxonomy that has been created during the installation.  
The taxonomy name is called 'Classified Ads' by default, and you should add some terms before
you allow any classified ads to be created.  

For example, you might want to create a simple taxonomy structure like:  

 - Buy
 - Sell
 - Trade

etc.  Be sure to set desired options for the taxonomy - like single/multiple select, 
hierarchy options, etc.  The taxonomy should have been configured to work with the
ed_classified content type.  I've used various taxonomy schemes, and I will be providing
handbook entries that describe how to use taxonomies to manage classified ads.

Note: do not delete this taxonomy vocabulary - it's 'owned' by the ed_classified module, and is 
required for proper functioning.

Now, visit admin/user/access and set the desired access permissions.  For example, allow
authenticated users access to 'create classified ads' and 'edit own classified ads', etc.

Visit admin/build/block and enable the classified ads blocks you want to display.  Please
note that the popular ads block requires access log features enabled (if you haven't 
enabled access logging in admin/logs/settings (enable 'Count content views' and 
'Enable access log' settings.)

Authorized users may now add classified ads.
