<?php
/**
 * The file to load all of the block patterns in the plugin.
 *
 * @since 1.0
 *
 * @version 1.0
 *
 * @package Featured Content Block
 */

// Load the block patterns
require_once plugin_dir_path( __FILE__ ) . 'featured-content-column-pattern.php';
require_once plugin_dir_path( __FILE__ ) . 'featured-content-column-reverse-pattern.php';
require_once plugin_dir_path( __FILE__ ) . 'featured-content-block-row-photo-left.php';
require_once plugin_dir_path( __FILE__ ) . 'featured-content-block-reverse-row-photo-left.php';
require_once plugin_dir_path( __FILE__ ) . 'featured-content-block-row-photo-right.php';
require_once plugin_dir_path( __FILE__ ) . 'featured-content-block-reverse-row-photo-right.php';
