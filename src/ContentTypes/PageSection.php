<?php namespace PassionsPlay\PageSections\ContentTypes;
/**
 * Defines the page_section custom post type.
 *
 * @package PPWP_Page_Sections
 */

/**
 * Defines the page_section custom post type.
 */
class PageSection {

	public function __construct() {
		$this->register();
	}

	/**
	 * Registers the custom post type.
	 */
	public static function register()	{

		// Custom Post Type: page_section
		$labels = array(
			'name'               => __( 'Page Sections', 'ppwp-page-sections' ),
			'singular_name'      => __( 'Page Section', 'ppwp-page-sections' ),
			'menu_name'          => __( 'Page Sections', 'ppwp-page-sections' ),
			'parent_item_colon'  => __( 'Parent Page Section:', 'ppwp-page-sections' ),
			'all_items'          => __( 'All Page Sections', 'ppwp-page-sections' ),
			'view_item'          => __( 'View Page Section', 'ppwp-page-sections' ),
			'add_new_item'       => __( 'Add New Page Section', 'ppwp-page-sections' ),
			'add_new'            => __( 'Add New', 'ppwp-page-sections' ),
			'edit_item'          => __( 'Edit Page Section', 'ppwp-page-sections' ),
			'update_item'        => __( 'Update Page Section', 'ppwp-page-sections' ),
			'search_items'       => __( 'Search Page Section', 'ppwp-page-sections' ),
			'not_found'          => __( 'Not found', 'ppwp-page-sections' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'ppwp-page-sections' ),
		);
		$args = array(
			'label'              => $labels,
			'description'        => __( 'Create and organize page sections.', 'ppwp-page-sections' ),
			'labels'             => $labels,
			'supports'           => array( 'title', 'editor', ),
			'public'             => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => false,
			'show_in_admin_bar'  => true,
			'can_export'         => true,
			'publicly_queryable' => false,
		);
		register_post_type( 'page_section', $args );
	}
}

