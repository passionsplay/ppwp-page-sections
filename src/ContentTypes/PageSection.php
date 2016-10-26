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
		add_action('add_meta_boxes_page_section', array($this, 'metabox'));
		add_action('cmb2_admin_init', array($this, 'metabox'));
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

	public static function metabox() {

		$prefix = '_page_section_';

		// Intiate the metabox.
		$cmb = new_cmb2_box( array(
			'id'           => 'page_section_options',
			'title'        => __( 'Page Section Options', 'ppwp-page-sections' ),
			'object_types' => array( 'page_section' ),
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
		));

		$cmb->add_field( array(
			'name'   => __( 'Container ID', 'ppwp-page-sections' ),
			'desc'   => __( 'The containing elements ID.', 'ppwp-page-sections' ),
			'id'     => $prefix . 'el_id',
			'type'   => 'text',
			'column' => true,
		));

		$cmb->add_field( array(
			'name'   => __( 'Container CSS Classes', 'ppwp-page-sections' ),
			'desc'   => __( 'Space separated list of styling classes for the containing element.', 'ppwp-page-sections' ),
			'id'     => $prefix . 'el_classes',
			'type'   => 'text',
			'column' => true,
		));

	}
}

