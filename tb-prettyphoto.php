<?php
/*
Plugin Name: Theme Blvd prettyPhoto
Description: This plugin incorporates a slightly modified, more responsive, retina-ready version of prettyPhoto.
Version: 1.0.0
Author: Theme Blvd
Author URI: http://themeblvd.com
License: GPL2

    Copyright 2013  Theme Blvd

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html

*/

define( 'TB_PRETTYPHOTO_PLUGIN_VERSION', '1.0.0' );
define( 'TB_PRETTYPHOTO_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'TB_PRETTYPHOTO_PLUGIN_URI', plugins_url( '' , __FILE__ ) );

/**
 * Setup plugin.
 */
class Theme_Blvd_prettyPhoto {

    /**
     * Only instance of object.
     */
    private static $instance = null;

    /**
     * Creates or returns an instance of this class.
     *
     * @since 1.0.0
     *
     * @return  Theme_Blvd_prettyPhoto A single instance of this class.
     */
    public static function get_instance() {
        if( self::$instance == null ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Initiate plugin.
     *
     * @since 1.0.0
     */
    private function __construct() {

        // Remove Magnific Popup in Theme Blvd themes
        add_filter( 'themeblvd_global_config', array( $this, 'remove_magnific' ) );
        add_filter( 'themeblvd_core_options', array( $this, 'remove_magnific_options' ) );

        // Add prettyPhoto CSS/JS
        add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );

        // Fitler prettyPhoto into Theme Blvd lightbox link properties
        add_filter( 'themeblvd_lightbox_props', array( $this, 'lightbox_props' ) );

    }

    /**
     * If this is a Theme Blvd theme, remove Manific Popup assets
     *
     * @since 1.0.0
     */
    public function remove_magnific( $config ) {
        $config['assets']['magnific_popup'] = false;
        return $config;
    }

    /**
     * Remove Magnific Popup's specific theme options to avoid
     * confusion, as these do not apply to prettyPhoto.
     *
     * @since 1.0.0
     */
    public function remove_magnific_options( $options ) {
        unset( $options['content']['sections']['lightbox'] );
        return $options;
    }

    /**
     * Include CSS and javascript files
     *
     * @since 1.0.0
     */
    public function assets() {

        // CSS
        wp_enqueue_style( 'prettyphoto', TB_PRETTYPHOTO_PLUGIN_URI.'/assets/prettyphoto/css/prettyPhoto.css', array(), '3.1.5' );
        wp_enqueue_style( 'tb-prettyphoto', TB_PRETTYPHOTO_PLUGIN_URI.'/assets/css/tb-prettyphoto.css', array('prettyphoto'), '3.1.5' );

        // Scripts
        wp_enqueue_script( 'prettyphoto', TB_PRETTYPHOTO_PLUGIN_URI.'/assets/js/prettyphoto.min.js', array('jquery'), '3.1.5' );
        wp_enqueue_script( 'tb-prettyphoto', TB_PRETTYPHOTO_PLUGIN_URI.'/assets/js/tb-prettyphoto.min.js', array('jquery', 'prettyphoto'), TB_PRETTYPHOTO_PLUGIN_VERSION );

    }

    /**
     * Fitler prettyPhoto into Theme Blvd lightbox link properties
     *
     * @since 1.0.0
     */
    public function lightbox_props( $props ) {

        // Go, go prettyPhoto
        $props['rel'] = 'themeblvd_lightbox';

        // Remove title tag's link. Displays weird in prettyPhoto.
        if ( ! apply_filters( 'themeblvd_prettyphoto_caption', false ) ) {
            $props['title'] = '';
        }

        return $props;

    }

}

/**
 * Initiate plugin.
 *
 * @since 1.0.0
 */
function themeblvd_prettyphoto_init() {
    Theme_Blvd_prettyPhoto::get_instance();
}
add_action( 'plugins_loaded', 'themeblvd_prettyphoto_init' );