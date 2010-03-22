$Id: README.txt,v 1.1.2.1 2008/04/30 21:47:48 jhedstrom Exp $

The Video Upload module, while in alpha state, consists of a CCK field
type that allows for the end user to upload video directly to YouTube,
using a single account for the site.

The video never hits the Drupal host, saving on storage and bandwidth
bottlenecks, and the end-user doesn't need a YouTube account, since
all video is stored under the site's account. Video can be organized
on YouTube with customized developer tags, currently with limited
token support.

The module uses the Zend GData client library for communication with
YouTube. This can be downloaded here:

  http://framework.zend.com/download/gdata/

See Video Upload's INSTALL.txt for details on installing this library.


Video Upload module courtesy of 

OpenSourcery  - http://opensourcery.com
  Jonathan Hedstrom <jhedstrom@opensourcery.com>

One Economy - http://one-economy.com
