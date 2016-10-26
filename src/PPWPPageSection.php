<?php namespace PassionsPlay\PageSections;
/**
 * Controller for page_section custom post type.
 *
 * @package PPWP_Page_Sections
 */

/**
 * Organizes rendering functionality related to page_section custom post type.
 */
class PPWPPageSection {

	/**
	 * The page_section WP_Post object
	 *
	 * @var WP_Post
	 */
	protected $page_section;

	/**
	 * The container element id.
	 *
	 * @var string The id for the container element.
	 */
	protected $el_id;

	/**
	 * Array of css classnames created from a space separated string.
	 *
	 * @var array
	 */
	protected $el_classes;

	/**
	 * Setup a page_section post.
	 *
	 * @param WP_Post $page_section
	 */
	public function __construct(\WP_Post $page_section) {
		$this->page_section = $page_section;
		$this->set_el_id();
		$this->set_el_classes();
	}

	/**
	 * Sets the container element id.
	 */
	public function set_el_id() {
		$this->el_id = get_post_meta($this->page_section->ID, '_page_section_el_id', true);
	}

	/**
	 * Sets the container element styling classes.
	 */
	public function set_el_classes() {
		$class_string = get_post_meta($this->page_section->ID, '_page_section_el_classes', true);
		$this->el_classes = ($class_string) ? explode(' ', $class_string) : array();
	}

	/**
	 * Returns the container element's id.
	 *
	 * @return string
	 */
	public function get_el_id() {
		return $this->el_id;
	}

	/**
	 * Returns the CSS class names for the container element.
	 *
	 * @return string
	 */
	public function get_el_classes() {
		return implode(' ', $this->el_classes);
	}

	/**
	 * Returns the content for this page_section filtered with 'the_content'.
	 *
	 * @return string
	 */
	public function get_content() {
		return apply_filters('the_content', $this->page_section->post_content);
	}

	/**
	 * Returns a page_section WP_Post object for the passed slug.
	 *
	 * @param string $slug The slug of the page_section post.
	 * @return WP_Post|false The page_section post with the passed slug or false if not found.
	 */
	public static function get_from_slug($slug) {
		$args = array(
			'name'          => $slug,
			'post_type'     => 'page_section',
			'post_status'   => 'publish',
			'numberposts'   => 1,
			'no_rows_found' => true,
		);
		$page_section = get_posts($args);
		if(!empty($page_section)){
			return $page_section[0];
		}
		return false;
	}
}

