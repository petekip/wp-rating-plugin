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

use Eliasis\Complement\Type\Plugin;
use Eliasis\Complement\Type\Component;
use Eliasis\Framework\Controller;

/**
 * Main controller.
 */
class Main extends Controller {

	/**
	 * Get plugin Rating.
	 *
	 * @param string $slug    → WordPress plugin slug.
	 * @param array  $ratings → default ratings if plugin not exists.
	 */
	public function get_plugin_rating( $slug, $ratings = null ) {

		$ratings = $ratings ?: [
			1 => 0,
			2 => 0,
			3 => 0,
			4 => 0,
			5 => 1,
		];

		$plugins_url = Component::WP_Plugin_Rating()->getOption(
			'url',
			'wp-plugins'
		);

		$url = $plugins_url . $slug . '/reviews/#new-post';

		$data['plugin-url-review'] = $url;

		if ( Plugin::exists( 'WP_Plugin_Info' ) ) {
			$info    = Plugin::WP_Plugin_Info()->getControllerInstance( 'Main' );
			$rating  = $info->get( 'ratings', $slug );
			$ratings = ( $rating ) ? $rating : $ratings;
		}

		$total = 0;

		$voters = array_sum( $ratings );

		foreach ( $ratings as $stars => $votes ) {
			$total += $stars * $votes;
		}

		$rating = $total ? $total / $voters : 0;

		$data['stars'] = $this->prepare_stars( $rating );

		$this->render( $data );
	}

	/**
	 * Prepare states for each star.
	 *
	 * @param float|int $rating → plugin rating.
	 *
	 * @return array $rating → state for the five stars
	 */
	protected function prepare_stars( $rating ) {

		$stars     = [];
		$full_star = (int) floor( $rating );
		$half_star = ( ( $rating - $full_star ) > 0 ) ? true : false;

		for ( $i = 0; $i < $full_star; $i++ ) {
			$stars[] = 'filled';
		}

		if ( $half_star ) {
			$stars[] = 'half';
		}

		for ( $i = 0; $i < ( 5 - $full_star ); $i++ ) {
			$stars[] = 'empty';
		}

		return array_reverse( $stars );
	}

	/**
	 * Renderizate admin page.
	 *
	 * @param array $data → data to render in the view.
	 */
	protected function render( $data ) {

		$template = Component::WP_Plugin_Rating()->getOption( 'path', 'template' );

		$this->view->renderizate( $template, 'component', $data );
	}
}
