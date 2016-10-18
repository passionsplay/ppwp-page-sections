<?php namespace PassionsPlay\PageSections;
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

