<?php
/**
 * Register theme assets
 *
 * Note: Do NOT edit this file to add assets. Do that in the `inc/assets-config.php` file.
 *
 * @package CassidyWP\StarterBlockTheme\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\StarterBlockTheme;

/**
 * Register theme assets
 */
if ( ! function_exists( 'CassidyWP\StarterBlockTheme\register_theme_assets' ) ) :
	/**
	 * Register theme assets
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function register_theme_assets(): void {
		// Retrieve assets properties.
		$theme_styles  = get_theme_assets_config( 'styles' );
		$theme_scripts = get_theme_assets_config( 'scripts' );

		// Register theme stylesheets.
		foreach ( $theme_styles as $style => $properties ) {
			add_style_registration( $properties );
		}

		// Register theme scripts.
		foreach ( $theme_scripts as $script => $properties ) {
			add_script_registration( $properties );
		}
	}
endif;

add_action( 'wp_enqueue_scripts', 'CassidyWP\StarterBlockTheme\register_theme_assets' );

/**
 * Register editor UI assets
 */
if ( ! function_exists( 'CassidyWP\StarterBlockTheme\register_editor_ui_assets' ) ) :
	/**
	 * Register editor UI assets
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function register_editor_ui_assets(): void {
		// Retrieve assets properties.
		$editor_ui_styles  = get_theme_assets_config( 'editor_ui_styles' );
		$editor_ui_scripts = get_theme_assets_config( 'editor_ui_scripts' );

		// Register Editor UI stylesheets.
		foreach ( $editor_ui_styles as $editor_ui_style => $properties ) {
			add_style_registration( $properties );
		}

		// Register Editor UI scripts.
		foreach ( $editor_ui_scripts as $editor_ui_script => $properties ) {
			add_script_registration( $properties );
		}
	}
endif;

add_action( 'enqueue_block_editor_assets', 'CassidyWP\StarterBlockTheme\register_editor_ui_assets' );

/**
 * Register theme block pattern categories
 */
if ( ! function_exists( 'CassidyWP\StarterBlockTheme\register_theme_block_pattern_categories' ) ) :
	/**
	 * Register theme block pattern categories
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function register_theme_block_pattern_categories(): void {
		$block_pattern_categories = get_block_pattern_categories_config();

		foreach ( $block_pattern_categories as $name => $properties ) {
			register_block_pattern_category( $name, $properties );
		}
	}
endif;

add_action( 'init', 'CassidyWP\StarterBlockTheme\register_theme_block_pattern_categories' );

/**
 * Registers stylesheet
 *
 * @since 1.0.0
 * @param array $properties A list of stylesheet properties.
 * @return void
 */
function add_style_registration( array $properties ): void {
	wp_register_style(
		$properties['handle'],
		$properties['src'],
		$properties['deps'],
		$properties['ver'],
		$properties['media'],
	);
}

/**
 * Registers script
 *
 * @since 1.0.0
 * @param array $properties A list of script properties.
 * @return void
 */
function add_script_registration( array $properties ): void {
	wp_register_script(
		$properties['handle'],
		$properties['src'],
		$properties['deps'],
		$properties['ver'],
		$properties['args'],
	);
}
