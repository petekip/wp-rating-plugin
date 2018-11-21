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

/**
 * Tests class for WP_Plugin_Rating Eliasis component.
 */
final class Front_End_Test extends \WP_UnitTestCase {

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
	 * Set up.
	 */
	public function setUp() {

		parent::setUp();

		$this->app  = new App();
		$this->root = $_SERVER['DOCUMENT_ROOT'];

		$app = $this->app;
		$app::run( $this->root );
	}

	/**
	 * Check if it is an instance of.
	 */
	public function test_is_instance_of() {
		$this->assertInstanceOf( 'Eliasis\Framework\App', $this->app );
	}
}
