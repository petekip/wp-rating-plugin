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

session_start();

require __DIR__ . '/../vendor/autoload.php';

use Eliasis\Complement\Type\Component;
use Josantonius\File\File;

/**
 * Load theme and plugins for testing environment.
 */
function _manually_load_environment() {
	switch_theme( 'twentyseventeen' );
}

define( 'WP_CORE_DIR', '/tmp/wordpress/' );

define( 'WP_TESTS_DIR', '/tmp/wordpress-tests-lib' );

require_once WP_TESTS_DIR . '/includes/functions.php';

tests_add_filter( 'muplugins_loaded', '_manually_load_environment' );

require_once WP_TESTS_DIR . '/includes/bootstrap.php';

/*
 * Clone complement.
 */
$component = 'wp-plugin-rating';

$path = 'sample-app/components';

File::deleteDirRecursively( __DIR__ . '/sample-app/components/' );
File::deleteDirRecursively( __DIR__ . '/sample-app/plugins/' );

File::copyDirRecursively(
	__DIR__ . '/../plugins/',
	__DIR__ . '/sample-app/plugins/'
);

File::copyDirRecursively(
	__DIR__ . '/../config/',
	__DIR__ . "/$path/$component/config/"
);

File::copyDirRecursively(
	__DIR__ . '/../public/',
	__DIR__ . "/$path/$component/public/"
);

File::copyDirRecursively(
	__DIR__ . '/../src/',
	__DIR__ . "/$path/$component/src/"
);

copy(
	__DIR__ . "/../$component.jsond",
	__DIR__ . "/$path/$component/$component.jsond"
);
