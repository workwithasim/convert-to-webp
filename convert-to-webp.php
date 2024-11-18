
<?php
/**
 * Plugin Name: Convert Uploaded Images to WebP
 * Plugin URI: https://workwithasim.com
 * Description: Automatically converts uploaded images (JPEG, PNG, GIF) to WebP format to optimize site performance.
 * Version: 1.0
 * Author: Asim
 * Author URI: https://workwithasim.com
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class ConvertToWebP {
    public function __construct() {
        add_filter('wp_handle_upload', [$this, 'handle_upload_convert_to_webp']);
    }

    public function handle_upload_convert_to_webp($upload) {
        if (in_array($upload['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
            $file_path = $upload['file'];

            // Check if ImageMagick or GD is available
            if (extension_loaded('imagick') || extension_loaded('gd')) {
                $image_editor = wp_get_image_editor($file_path);
                if (!is_wp_error($image_editor)) {
                    $file_info = pathinfo($file_path);
                    $dirname   = $file_info['dirname'];
                    $filename  = $file_info['filename'];

                    // Create a unique file path for the WebP image
                    $def_filename = wp_unique_filename($dirname, $filename . '.webp');
                    $new_file_path = $dirname . '/' . $def_filename;

                    // Attempt to save the image in WebP format
                    $saved_image = $image_editor->save($new_file_path, 'image/webp');
                    if (!is_wp_error($saved_image) && file_exists($saved_image['path'])) {
                        // Success: replace the uploaded image with the WebP image
                        $upload['file'] = $saved_image['path'];
                        $upload['url']  = str_replace(basename($upload['url']), basename($saved_image['path']), $upload['url']);
                        $upload['type'] = 'image/webp';

                        // Optionally remove the original image
                        @unlink($file_path);
                    }
                }
            }
        }

        return $upload;
    }
}

// Initialize the plugin
new ConvertToWebP();
