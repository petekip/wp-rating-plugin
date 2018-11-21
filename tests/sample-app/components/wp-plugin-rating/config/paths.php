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

$root_path = Component::WP_Plugin_Rating()->getOption( 'path', 'root' );

return [
	'path' => [
		'template' => $root_path . 'src/template/',
	],
];
