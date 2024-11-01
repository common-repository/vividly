=== Vividly ===
Contributors: fiskeben
Tags: contrast, accessibility
Donate link: https://www.gittip.com/20124732931c/
Tested up to: 3.9
License: MIT

Enables toggling an extra stylesheet with high contrast CSS for visually impaired users.

== Description ==
This plugin adds a simple way to let your readers enable or disable a high contrast stylesheet for the visually impaired.

Once a reader enables the high contrast stylesheet the setting will be stored in a cookie which means the setting will not only stay one when navigating to other pages but it will also be on when the reader returns.

== Installation ==
Once the plugin is installed, add your high contrast stylesheet to the root of your theme directory and name it `vividly.css`.

To toggle the high contrast stylesheet, add a link or button and call the `Vividly.toggle()` method in its `onclick` handler.