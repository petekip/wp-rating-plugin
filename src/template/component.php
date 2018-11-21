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
use Eliasis\Framework\View;

$slug = trim( Component::WP_Plugin_Rating()->getOption( 'folder' ), '/' );

$data = View::getOption();
?>

<div id="jst-stars">
	<a id="plugin-rating" href="<?php echo esc_url( $data['plugin-url-review'] ); ?>/" title="Rate plugin" target="_blank">
		<div class="rating">
			<?php foreach ( $data['stars'] as $star ) : ?>
			<span class="dashicons dashicons-star-<?php echo esc_html( $star ); ?>"></span>
			<?php endforeach; ?>
		</div>
	</a>
</div>
