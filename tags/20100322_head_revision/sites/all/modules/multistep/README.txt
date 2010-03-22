$Id: README.txt,v 1.1.2.1 2008/12/17 17:54:34 vkareh Exp $

-- SUMMARY --

Multistep adds multiple-step functionality to content type editing forms. It
does so by assigning a step number to each fieldgroup within the content type
and hiding all the groups that do not belong to the current step. The user can
then use different submitting buttons that will redirect to the previous,
next, or current step.

The module also provides a block for each content type with a menu of the
different groups within that form. This provides an easy way to jump to
different steps throughout the form without having to go one by one.

For a full description visit the project page:
  http://drupal.org/project/multistep
Bug reports, feature suggestions and latest developments:
  http://drupal.org/project/issues/multistep


-- REQUIREMENTS --

This module depends on CCK and Fieldgroup, which can be found here:
  http://drupal.org/project/cck


-- INSTALLATION --

Install as usual, see http://drupal.org/node/70151 for further information.


-- TO USE --

To use this module, go into the content type editing form in Administer >>
Content management >> Content types and select the content type you want to
enable the multistep for.
  
There will be a collapsed Multistep Form section below, mark it as Enabled and
enter the amount of steps that you want this form to span.
  
Now, whenever you add or edit a group, you will be able to select which step
that group belongs to. The group will only be shown when in that step, or in
all of them if All is selected as an option.


-- CUSTOMIZATION --

Nothing here...yet.


-- TROUBLESHOOTING --

Nothing here either.


-- FAQ --

Nope...nothing here.


-- CONTACT --

Author:
* Victor Kareh (vkareh) - http://vkareh.net
