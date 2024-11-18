=== Convert Uploaded Images to WebP ===
Contributors: asim
Donate link: https://workwithasim.com
Tags: webp, image optimization, image conversion, performance, media library
Requires at least: 5.0
Tested up to: 6.4
Requires PHP: 7.4
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automatically converts uploaded images (JPEG, PNG, GIF) to WebP format to optimize site performance and reduce image file sizes.

== Description ==

**Convert Uploaded Images to WebP** automatically converts your uploaded images to WebP format, ensuring faster page loads and optimized performance. Supported formats include JPEG, PNG, and GIF.

### Features:
- Automatically converts JPEG, PNG, and GIF images to WebP.
- Reduces image file sizes for better page speed and performance.
- Option to delete the original image after conversion.
- Uses WordPress's built-in image editor for compatibility.

== Installation ==

1. Download the plugin ZIP file.
2. Upload the ZIP file via the WordPress admin dashboard under `Plugins > Add New > Upload Plugin`.
3. Activate the plugin from the `Plugins` menu.
4. Upload an image to your Media Library to test WebP conversion.

== Frequently Asked Questions ==

= Does this plugin support all image formats? =
Currently, the plugin supports JPEG, PNG, and GIF image uploads.

= What happens to the original image after conversion? =
By default, the original image is deleted. To keep the original file, you can comment out the line `@unlink($file_path);` in the plugin's code.

= Do I need special server requirements? =
Yes, your server should have either the ImageMagick or GD PHP extension enabled, as these are required for image processing.

= Can this plugin handle bulk conversion of existing images? =
No, this plugin only converts images uploaded after activation. 


== License ==

This plugin is licensed under the GPLv2 or later. See https://www.gnu.org/licenses/gpl-2.0.html for details.
