<?php
/**
 * WP Plugin Rating · Show plugin rating in WordPress administration pages.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   eliasis-framework\wp-plugin-rating
 * @copyright 2017 - 2018 (c) Josantonius - WP Plugin Rating
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/eliasis-framework/wp-plugin-rating.git
 * @since     1.0.0
 */

namespace Eliasis\Components\WP_Plugin_Rating\Controller;

use Eliasis\Framework\Controller;
use Eliasis\Complement\Type\Component;
use Josantonius\Hook\Hook;
use Josantonius\WP_Register\WP_Register;

/**
 * Component launcher controller.
 */
class Launcher extends Controller {

	/**
	 * Class initializer method.
	 */
	public function init() {
		if ( Component::WP_Plugin_Rating()->getState() === 'active' ) {
			if ( is_admin() ) {
				$this->admin();
			}
		}
	}

	/**
	 * Admin initializer method.
	 */
	protected function admin() {
		$method = [ $this, 'after_add_menu' ];
		add_action( 'wp_menu_after_add_menu_page', $method, 10, 1 );
		add_action( 'wp_menu_after_add_submenu_page', $method, 10, 1 );
	}

	/**
	 * After add menu, add page load hook.
	 *
	 * @param string $hook → resulting page's hook_suffix after add menu.
	 */
	public function after_add_menu( $hook ) {
		if ( $hook ) {
			add_action( $hook, [ $this, 'add_get_plugin_rating_action' ] );
			add_action( $hook, [ $this, 'add_styles' ] );
		}
	}

	/**
	 * Add get plugin rating action.
	 */
	public function add_get_plugin_rating_action() {
		$main = Component::WP_Plugin_Rating()->getControllerInstance( 'Main' );
		Hook::addAction( 'get_plugin_rating', [ $main, 'get_plugin_rating' ], 8, 1 );
	}

	/**
	 * Load styles.
	 */
	public function add_styles() {
		$css = Component::WP_Plugin_Rating()->getOption( 'assets', 'css' );
		WP_Register::add( 'style', $css['WP_Plugin_Rating'] );
	}
}
