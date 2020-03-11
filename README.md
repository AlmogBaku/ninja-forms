# Ninja Forms
[Contributors](https://github.com/wpninjas/ninja-forms/graphs/contributors)

Tags: form, forms, contact form, custom form, form builder, form creator, form manager, form creation, contact forms, custom forms, forms builder, forms creator, forms manager, forms creation, form administration,
Requires at least: 5.1
Tested up to: 5.3
Stable tag: 3.4.24
License: GPLv2 or later

With a simple drag and drop interface you can create contact forms, email subscription forms, order forms, payment forms, and any other type of form for your WordPress site.

## Description
Ninja Forms is the ultimate FREE form creation tool for WordPress. Build forms within minutes using a simple yet powerful drag-and-drop form creator. For beginners, quickly and easily design complex forms with absolutely no code. For developers, utilize built-in hooks, filters, and even custom field templates to do whatever you need at any step in the form building or submission using Ninja Forms as a framework.

Here are just a few of the things you will find in Ninja Forms:

* Special, easy to use fields for emails, dates (w/ datepicker), phone numbers, addresses and more
* Modify your own field then save them as favorites to re-use later (even in other forms!)
* Force required fields and correct data formatting with custom input masks
* Give your users a success message or redirect them elsewhere after they complete a form.
* Manage, Edit, and Export form user submissions.
* Export and Import forms and favorite fields.
* Email form data to administrators and/or users every time a form is processed.
* Customize emails and add raw HTML(for photos, videos, and more) with the powerful Summernote HTML editor.
* Several anti-spam options including Google reCaptcha, question/response fields, and honeypot fields
* Form submission via AJAX, allowing a seamless user experience without page refreshes
* Please note that if you are using a version of PHP lower than 5.3, you may experience some problems using AJAX Submissions. These can be minimized by using simple success/error messages without any quotes or special characters.

## Extensions

[We have more integrations](https://ninjaforms.com/extensions/) than any other WordPress form builder, with more added regularly!

* [PayPal Express](http://ninjaforms.com/downloads/paypal-express/) - Accept payments using PayPal Express and Ninja Forms!
* [Front-End Editor](http://ninjaforms.com/downloads/front-end-editor/) - Give your users the ability to create, edit, or delete posts, pages, or any custom post type and allow your users to edit their Ninja Forms submissions all from the front-end. Also included is front-end profile editing, custom registration forms, login and password resetting, all without needing to see the default, WordPress branded login page.
* [File Uploads](http://ninjaforms.com/downloads/file-uploads/) - Allow users to upload files and store those files within a searchable database.
* [Multi-Part Forms](http://ninjaforms.com/downloads/multi-part-forms/) - Break up those long, complex forms into multiple pages.
* [Save User Progress](http://ninjaforms.com/downloads/save-user-progress/) - Let your users save their progress and return later to finish filling out the form.
* [Conditional Logic](http://ninjaforms.com/downloads/conditional-logic/) - Create "smart" forms that show or hide fields based upon user input. Even add a value to a dropdown list when a user selects a specific value from another list.
* [Front-End Posting](http://ninjaforms.com/downloads/front-end-posting/) - Use Ninja Forms to create posts from the front-end. These can be added to any post type, including custom post types, and users can select categories and tags.
* [Layout & Styles](http://ninjaforms.com/downloads/layout-styles/) - Use Ninja Forms to create amzing form layouts and styles right from your WordPress admin.
* [MailChimp](http://ninjaforms.com/downloads/mail-chimp/) - The MailChimp extension allows you to quickly create newsletter signup forms for your MailChimp account using the power and flexibility that Ninja Forms provides.
* [Campaign Monitor](http://ninjaforms.com/downloads/campaign-monitor/) - The Campaign Monitor extension allows you to quickly create newsletter signup forms for your Campaign Monitor account using the power and flexibility that Ninja Forms provides.
* [User Analytics](http://ninjaforms.com/downloads/user-analytics/) - The User Analytics extension will help website owners understand how hot a lead is based on extra data automatically collected about the user.
* [Constant Contact](http://ninjaforms.com/downloads/constant-contact/) - The Constant Contact extension allows you to quickly create newsletter signup forms for your Constant Contact account using the power and flexibility that Ninja Forms provides.
* [Pushover](http://ninjaforms.com/downloads/pushover/) - When email and SMS notifications just do not cut it, send yourself push notifications of form submissions with Pushover. Pushover makes it easy to send real-time notifications to your Android and iOS devices.

If you're a developer and would like to talk about creating some premium extensions for Ninja Forms, send us an email: info@wpninjas.com.

## Contributing

If you're a developer and want to help make Ninja Forms better, we would love to work together! We know contributing to a project can be intimidating; sometimes it’s hard to tell how to get involved. We believe Ninja Forms is a great community to get involved in. In our experience, everyone involved with the project has been amazing and helpful. :)
Here are some [friendly guidelines](https://github.com/wpninjas/ninja-forms/blob/master/.github/CONTRIBUTING.md).  [You can also join our development community here.](http://developer.ninjaforms.com/)

__Please Note:__ GitHub is for bug reports and contributions only - if you have a support question or a request for a customization, please contact [Ninja Forms Support](http://ninjaforms.com/contact/) instead.

## Screenshots

To see up to date screenshots, visit [Ninja Forms.com](http://ninjaforms.com/).

## Installation

This section describes how to install the plugin and get it working.

1. Upload the `ninja-forms` directory to your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Visit the 'Forms' menu item in your admin sidebar

Shortcodes have been re-implemented. They are used like so: `[ninja_forms id=#]` where # is the ID number of the form you want to display.

## Testing and Developmemt

This section describes how to install a docker development environment to develop and test Ninja Forms functionality

1. Clone the repo
2. `cd` into the `ninja-forms` directory
3. run `composer install`
4. run `yarn`

Once you have your packages installed, install your docker environment

1. run `yarn env install`
2. run `yarn env start` to start your environment
   1. You should be able to view your development site at: `http://localhost:8889`
3. run `yarn env stop` to stop your environment

To test your php code with phpunit

1.  run `yarn env test-php`

To test you javascript code

1. run `yarn test:unit`

If you find that your javascript unit testing are failing and the errors mention `obsolete snapshot`, try running 

`yarn test:unit -u`

The `-u` flag clears out old snapshot allowing for the creation of new ones.

## Use

For help and video tutorials, please visit our website: [Ninja Forms Documentation](http://ninjaforms.com/documentation/)

## Requested Features

If you have any feature requests, please feel free to visit [ninjaforms.com](http://ninjaforms.com) and let us know!
