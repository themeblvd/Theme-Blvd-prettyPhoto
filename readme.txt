=== Theme Blvd prettyPhoto ===
Author URI: http://www.jasonbobich.com
Contributors: themeblvd
Tags: prettyphoto, lightbox, gallery, Theme Blvd, themeblvd, Jason Bobich
Stable Tag: 1.0.0

This plugin incorporates a slightly modified, more responsive, retina-ready version of prettyPhoto.

== Description ==

This plugin incorporates a version of prettyPhoto that we've made some slight modification to, in order for it perform better in responsive environments. We've also modified the default prettyPhoto skin to look a bit nicer on HiDPI devices like the MacBook Pro Retina.

= Theme Blvd Integration =

If you're using a theme with Theme Blvd framework v2.3+, this plugin will replace all default lightbox integration with prettyPhoto.

== Installation ==

1. Upload `theme-blvd-prettyphoto` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

= Usage =

Any time you use WordPress's `[gallery]` shortcode, prettyPhoto will automatically be integrated when linking to the image files like this:

`
[gallery link="file", ids="1,2,3,4,5"]
`

To make use of this plugin for an individual image, you'll need to link to an image file with the "prettyPhoto" rel attribute something like this:

`
<a href="http://yoursite.com/uploads/image.jpg" rel="prettyPhoto">Link to popup</a>
`

You can find more inforamtion on what you can do now that you have prettyPhoto implemented by checking out the jQuery plugin's homepage:

[http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/](http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/)

If you're using a Theme Blvd theme and the Theme Blvd Shortcodes plugin, you can simply use the `[lightbox]` shortcode to link to your prettyPhoto popup.

`
[lightbox link="http://yoursite.com/uploads/image.jpg" thumb="http://yoursite.com/uploads/thumb.jpg" frame="true" icon="image"]
`

== Screenshots ==

1. A frontend screenshot of prettyPhoto being implemented into [Jump Start](http://wpjumpstart.com).

== Changelog ==

= 1.0.0 =

* This is the first release.