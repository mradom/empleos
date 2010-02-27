CCK Multimage is an addition to the Imagefield module for the Content Creation Kit.

Dependencies:
- CCK
- Imagefield
- Imagecache

Written by Silvio Gutierrez www.silviogutierrez.com

Important Note
--------------
Right now, this module ONLY works for full node displays, and not teasers. You can enable teaser display too, but usability is not guaranteed.
By default, you don't need to add any CSS or positioning for the multimage to work, since it will be displayed as a normal imagefield.

Configuration
-------------
Multimage is a content formatter. Using it is very simple.

1. Create an imagefield:

- Create a new content type or edit an existing type (admin/content/types).
- Add a new field to this content type of type 'image'.
- This new imagefield MUST BE MULTIPLE VALUE to work with slideshow.
- Save your new imagefield.

2 (option a). Enable slideshow as CCK display (most common):

- Go to the 'Display fields' tab of your node type which contains the multiple value imagefield.
- Under the 'Teaser' or 'Full' drop down select for your imagefield, choose the formatter 'Slideshow'. Remember 'Teaser' is not fully supported yet.

3. Configure your slideshow display options.

- Go to admin/content/cck-slideshows
- A list of all imagefields is displayed there, click 'edit slideshow formatter' on the imagefield you are using in your node type.
- Choose the imagecache preset you wish to use for the display of your slideshow. You MUST select a preset. This module does not yet work with full sized images.

4. View
- Create a sample node with the field attached, and upload a few small sample pictures. Still buggy with relatively large pictures.
- Go to the node you just created, and click on the picture to transition to the next slide.


Fixed Issues
- Multimage will no longer apply to single images. It simply won't transition. The CSS divs will still print in case you want to style it.
- Anonymous users can no longer access the Multimage configuration. Thanks to webavant for this fix.

To Do List

----------
- Add auto transition.
- Add optional "next picture" link instead of having to click the picture.
- Clean up code comments.

Credits
- Thanks to: Nathan Haug: http://quicksketch.org, for writing the original Slideshow module this module is based on, and thus a majority of the code in this module. We are currently discussing merging the two projects.