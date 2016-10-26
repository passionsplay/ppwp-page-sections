<?php namespace PassionsPlay\PageSections;
/**
 * Controller for page_section custom post type.
 *
 * @package PPWP_Page_Sections
 */

class PPWPPageSection {

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

