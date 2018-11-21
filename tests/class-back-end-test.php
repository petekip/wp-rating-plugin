<?php
/**
 * WP Plugin Rating · Show plugin rating in WordPress administration pages.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   eliasis-framework\wp-plugin-rating
 * @copyright 2017 - 2018 (c) Josantonius - WP Plugin Rating
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/eliasis-framework/wp-plugin-rating.git
 * @since     1.0.1
 */

namespace Eliasis\Components\WP_Plugin_Rating;

use Eliasis\Complement\Type\Component;
use Eliasis\Framework\App;
use Josantonius\Hook\Hook;
use Josantonius\WP_Register\WP_Register;

/**
 * Tests class for WP_Plugin_Rating Eliasis component.
 */
final class Back_End_Test extends \WP_UnitTestCase {

	/**
	 * App instance.
	 *
	 * @var object
	 */
	protected $app;

	/**
	 * Root path.
	 *
	 * @var string
	 */
	protected $root;

	/**
	 * Component instance.
	 *
	 * @var object
	 */
	protected $component;

	/**
	 * Set up.
	 */
	public function setUp() {

		$this->app  = new App();
		$this->root = realpath( $_SERVER['DOCUMENT_ROOT'] );

		$app = $this->app;
		$app::run( $this->root );

		$component = new Component();

		$this->component = $component::WP_Plugin_Rating()->getControllerInstance( 'Main' );

		set_current_screen( 'admin.php' );
	}

	/**
	 * Check if it is an instance of.
	 */
	public function test_is_instance_of() {
		$this->assertInstanceOf( 'Eliasis\Framework\App', $this->app );
		$this->assertInstanceOf(
			'Eliasis\Components\WP_Plugin_Rating\Controller\Main',
			$this->component
		);
	}

	/**
	 * Actions should be loaded on the back end.
	 */
	public function test_actions_should_be_loaded_on_the_back_end() {

		$this->assertTrue(
			has_action( 'wp_menu_after_add_menu_page' )
		);

		$this->assertTrue(
			has_action( 'wp_menu_after_add_submenu_page' )
		);
	}

	/**
	 * Actions should add page's hook_suffix after add menu/submenu.
	 */
	public function test_actions_should_add_new_actions() {

		do_action( 'wp_menu_after_add_menu_page', 'test_menu_page' );
		do_action( 'wp_menu_after_add_submenu_page', 'test_submenu_page' );

		$this->assertTrue(
			has_action( 'test_menu_page' )
		);

		$this->assertTrue(
			has_action( 'test_submenu_page' )
		);
	}

	/**
	 * A new hook should be added when accessing the menu page.
	 */
	public function test_new_hook_should_be_added_when_access_menu_page() {

		do_action( 'wp_menu_after_add_menu_page', 'test_menu_page' );

		do_action( 'test_menu_page' );

		$this->assertTrue(
			Hook::isAction( 'get_plugin_rating' )
		);
	}

	/**
	 * A new hook should be added when accessing the submenu page.
	 */
	public function test_new_hook_should_be_added_when_access_submenu_page() {

		do_action( 'wp_menu_after_add_submenu_page', 'test_submenu_page' );

		do_action( 'test_submenu_page' );

		$this->assertTrue(
			Hook::isAction( 'get_plugin_rating' )
		);
	}

	/**
	 * Styles should be added when accessing the menu page.
	 */
	public function test_styles_should_be_added_when_access_menu_page() {

		do_action( 'wp_menu_after_add_menu_page', 'test_menu_page' );

		do_action( 'test_menu_page' );

		$this->assertTrue(
			WP_Register::is_added( 'style', 'WP_Plugin_Rating' )
		);
	}

	/**
	 * Styles should be added when accessing the submenu page.
	 */
	public function test_styles_should_be_added_when_access_submenu_page() {

		do_action( 'wp_menu_after_add_submenu_page', 'test_submenu_page' );

		do_action( 'test_submenu_page' );

		$this->assertTrue(
			WP_Register::is_added( 'style', 'WP_Plugin_Rating' )
		);
	}

	/**
	 * It should show five stars if the plugin does not exist.
	 */
	public function test_should_show_five_stars_if_the_plugin_does_not_exist() {

		do_action( 'wp_menu_after_add_menu_page', 'test_menu_page' );

		do_action( 'test_menu_page' );

		ob_start();

		Hook::doAction( 'get_plugin_rating', 'a-unknown-plugin' );

		$rating = ob_get_contents();

		ob_end_clean();

		$stars = substr_count(
			$rating,
			'<span class="dashicons dashicons-star-filled">'
		);

		$this->assertSame( 5, $stars );

		$this->assertContains(
			'https://wordpress.org/support/plugin/a-unknown-plugin/reviews/#new-post/',
			$rating
		);
	}
}
