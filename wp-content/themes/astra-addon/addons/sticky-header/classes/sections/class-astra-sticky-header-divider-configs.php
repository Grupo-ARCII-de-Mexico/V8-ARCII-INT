<?php
/**
 * Sticky Header - Divider Options for our theme.
 *
 * @package     Astra Addon
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       3.0.0
 */

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config base class does not exist.
if ( ! class_exists( 'Astra_Customizer_Config_Base' ) ) {
	return;
}

if ( ! class_exists( 'Astra_Sticky_Header_Divider_Configs' ) ) {

	/**
	 * Register Sticky Header Above Header Colors Customizer Configurations.
	 */
	class Astra_Sticky_Header_Divider_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Sticky Header Colors Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 3.0.0
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$divider_config = array();

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_divider; $index++ ) {

				$_section = 'section-hb-divider-' . $index;

				$_configs = array(

					/**
					 * Option: Sticky Header divider Heading.
					 */
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[sticky-header-divider-' . $index . '-heading]',
						'type'     => 'control',
						'control'  => 'ast-heading',
						'section'  => $_section,
						'title'    => __( 'Sticky Header Option', 'astra-addon' ),
						'settings' => array(),
						'priority' => 110,
						'context'  => Astra_Addon_Builder_Helper::$design_tab,
					),
					/**
					 * Option: divider Color.
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[sticky-header-divider-' . $index . '-color]',
						'default'   => '',
						'type'      => 'control',
						'section'   => $_section,
						'priority'  => 120,
						'transport' => 'postMessage',
						'control'   => 'ast-color',
						'title'     => __( 'Color', 'astra-addon' ),
						'context'   => Astra_Addon_Builder_Helper::$design_tab,
					),
				);

				$divider_config[] = $_configs;
			}

			$divider_config = call_user_func_array( 'array_merge', $divider_config + array( array() ) );
			$configurations = array_merge( $configurations, $divider_config );

			return $configurations;
		}
	}
}

new Astra_Sticky_Header_Divider_Configs();