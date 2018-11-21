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

use Eliasis\Complement\Type\Component;
use Eliasis\Framework\App;

$url = App::COMPONENTS_URL() . Component::WP_Plugin_Rating()->getOption( 'folder' );

return [
	'url' => [
		'css'        => $url . 'public/css/',
		'wp-plugins' => 'https://wordpress.org/support/plugin/',
	],
];
