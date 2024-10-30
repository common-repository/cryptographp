=== Cryptographp ===
Contributors: leocacheux
Tags: comments, spam, captcha
Requires at least: 2.0.0
Tested up to: 2.2
Stable tag: trunk

Add a captcha to protect comments from being spammed using Cryptographp library.

== Description ==

This plugin allows you to add a captcha before anyone could post a comment. The captcha can be easily configured in the options of the Wordpress admin section.

This plugin use on the [Cryptographp](http://www.cryptographp.com/ "Cryptographp") library.

== Installation ==

1. Unzip the archive in the `/wp-content/plugins/` directory.
2. Activate the plugin through the `Plugins` menu in WordPress.
3. Place `<?php display_cryptographp(); ?>` in file `comments.php` of your templates. You MUST display it while the plugin is activated, or users won't be able to post any comment.
4. You can configure the captcha with the `Options > Cryptographp` page of your admin.

== Changelog ==

* 1.2 : Don't block trackbacks/pingbacks anymore
* 1.1 : The captcha is disabled for logged in users by default. This can be changed in the options menu.
* 1.0 : Initial version