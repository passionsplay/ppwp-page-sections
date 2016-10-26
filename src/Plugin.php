<?php namespace PassionsPlay\PageSections;

use PassionsPlay\PageSections\ContentTypes\PageSection;
use PassionsPlay\PageSections\Shortcodes\PageSection as PageSectionShortcodes;
/**
 * The main plugin class responsible for integration with WordPress.
 *
 * Is in charge of setting up plugin variables like version numbers,
 * as well as registering functions with WordPress action hooks.
 *
 * @package PPWP_Page_Sections
 */

/**
 * Integrates plugin with WordPress.
 */
class Plugin {

	/**
	 * Holds the single instance of this class.
	 *
	 * @var object
	 */
	protected static $instance;

	/**
	 * The version of this plugin.
	 *
	 * @var string $version
	 */
	protected $version = '0.0.1';

	/**
	 * The path to the root directory of this plugin.
	 *
	 * @var string $path
	 */
	protected $path;

	/**
	 * Setup the class.
	 */
	public function __construct() {
		$this->path = dirname( __DIR__ );
	}

	/**
	 * Initializes the plugin and registers functionality withWordPress.
	 */
	public static function init() {
		$plugin = self::get_instance();
		add_action( 'admin_init', array( $plugin, 'plugin_dependencies' ) );
		add_action( 'init', array( $plugin, 'register_content_types' ) );
		add_action( 'init', array( $plugin, 'register_shortcodes' ) );
	}

	/**
	 * Verify plugin dependencies and deactivate if not met.
	 */
	public function plugin_dependencies() {
		if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'cmb2/init.php' ) ) {
			add_action( 'admin_notices', array($this, 'plugin_dependency_notice' ) );
			deactivate_plugins($this->get_path() . '/ppwp-page-sections.php');
			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
		}
	}

	/**
	 * The notice message when dependencies are not met.
	 */
	public function plugin_dependency_notice() {
		?><div class="error"><p>The Passions Play Page Section plugin could not be activated because it requires <a href="https://wordpress.org/plugins/cmb2/">CMB2</a>. Please install CMB2 and try activating again.</p></div><?php
	}

	/**
	 * Register Custom Content Types with WordPress.
	 */
	public function register_content_types() {
		new PageSection;
	}

	/**
	 * Register Custom Content Types with WordPress.
	 */
	public function register_shortcodes() {
		$page_section_shortcodes = new PageSectionShortcodes;
		add_shortcode('page_section', array($page_section_shortcodes, 'page_section'));
	}

	/**
	 * Returns the version of this plugin.
	 */
	public static function get_version() {
		$plugin = self::get_instance();
		return $plugin->version;
	}

	/**
	 * Returns the path of this plugin.
	 */
	public static function get_path() {
		$plugin = self::get_instance();
		return $plugin->path;
	}

	/**
	 * Returns the single instance of this plugin class.
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
}

