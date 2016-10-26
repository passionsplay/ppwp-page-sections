<?php namespace PassionsPlay\PageSections\Shortcodes;

use PassionsPlay\PageSections\PPWPPageSection;
/**
 * Defines the shortcodes relating to page_section custom post type.
 *
 * @package PPWP_Page_Sections
 */

/**
 * Wraps the shortcode render functions.
 */
class PageSection {

	public function page_section($atts) {
		$a = shortcode_atts( array(
			'slug' => '',
		), $atts );
		$page_section_post = PPWPPageSection::get_from_slug($a['slug']);
		ob_start();
		if ( $page_section_post ) :
			$page_section = new PPWPPageSection($page_section_post); ?>
			<section id="<?php echo $page_section->get_el_id(); ?>" class="<?php echo $page_section->get_el_classes(); ?>">
				<?php echo $page_section->get_content(); ?>
			</section>
		<?php endif;
		return ob_get_clean();
	}

}

