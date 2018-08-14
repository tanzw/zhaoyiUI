<?php

// includes/plugins/items-wp-schema-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wp_schema_pro' );
/**
 * Items for Plugin: Schema Pro (Premium, by Brainstorm Force)
 *
 * @since  1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_wp_schema_pro() {

	/** For: Elements */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpschemapro',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Schema Pro', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=aiosrs_pro_admin_menu_page&action=aiosrs-schema' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Schema Pro', 'toolbar-extras' )
			)
		)
	);

		/**
		 * Add each individual Schema type as an item.
		 *   Schemas are saved as a post type therefore a query necessary.
		 * @since 1.3.2
		 */
		$args = array(
			'post_type'      => 'aiosrs-schema',
			'posts_per_page' => -1,
		);

		$schemas = get_posts( $args );

		/** Proceed only if there are any Schemas */
		if ( $schemas ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wpschemapro-edit-schema',
					'parent' => 'wpschemapro'
				)
			);

			foreach ( $schemas as $schema ) {

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'wpschemapro-edit-schema-' . $schema->ID,
						'parent' => 'group-wpschemapro-edit-schema',
						'title'  => $schema->post_title,
						'href'   => esc_url( admin_url( 'post.php?post=' . $schema->ID . '&action=edit' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Schema', 'toolbar-extras' ) . ': ' . $schema->post_title
						)
					)
				);

			}  // end foreach

		}  // end if

		/** Group: Schemas (post type) */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-wpschemapro-schemas',
				'parent' => 'wpschemapro'
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpschemapro-schemas-all',
				'parent' => 'group-wpschemapro-schemas',
				'title'  => esc_attr__( 'All Schemas', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=aiosrs_pro_admin_menu_page&action=aiosrs-schema' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Schemas', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpschemapro-schemas-new',
				'parent' => 'group-wpschemapro-schemas',
				'title'  => esc_attr__( 'New Schema', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=aiosrs-schema' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Schema', 'toolbar-extras' )
				)
			)
		);

		/** Group: Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-wpschemapro-settings',
				'parent' => 'wpschemapro'
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpschemapro-settings-general',
				'parent' => 'group-wpschemapro-settings',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=aiosrs_pro_admin_menu_page&action=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpschemapro-social-profiles',
				'parent' => 'group-wpschemapro-settings',
				'title'  => esc_attr__( 'Social Profiles', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=aiosrs_pro_admin_menu_page&action=settings&section=social-profiles' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Social Profiles', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpschemapro-other-schemas',
				'parent' => 'group-wpschemapro-settings',
				'title'  => esc_attr__( 'Other Schemas', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=aiosrs_pro_admin_menu_page&action=settings&section=global-schemas' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Other Schemas', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpschemapro-settings-advanced',
				'parent' => 'group-wpschemapro-settings',
				'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=aiosrs_pro_admin_menu_page&action=settings&section=advanced-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' )
				)
			)
		);

		/** Setup Wizard */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpschemapro-setup-wizard',
				'parent' => 'wpschemapro',
				'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=aiosrs-pro-setup-wizard' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Schema Pro */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wpschemapro-resources',
					'parent' => 'wpschemapro',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'wpschemapro-support',
				'group-wpschemapro-resources',
				'https://wpschema.com/support/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'wpschemapro-docs',
				'group-wpschemapro-resources',
				'https://wpschema.com/docs/'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'wpschemapro-schema-types',
				'group-wpschemapro-resources',
				'https://wpschema.com/schema-types/',
				esc_attr__( 'Supported Schema Types', 'toolbar-extras' )
			);

			ddw_tbex_resource_item(
				'translations-pro',
				'wpschemapro-translate',
				'group-wpschemapro-resources',
				'https://translate.brainstormforce.com/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpschemapro-site',
				'group-wpschemapro-resources',
				'https://wpschema.com/'
			);

		}  // end if

}  // end function