<?php
/**
 * WP_CLI_Feature class file
 *
 * @package wp-type-extensions
 */

namespace Alley\WP;

use Alley\WP\Types\Feature;

/**
 * Boot a feature only in WP-CLI.
 */
final class WP_CLI_Feature implements Feature {
	/**
	 * Set up.
	 *
	 * @param Feature $origin Feature instance.
	 */
	public function __construct(
		private readonly Feature $origin,
	) {}

	/**
	 * Boot the feature.
	 */
	public function boot(): void {
		add_action( 'cli_init', [ $this->origin, 'boot' ] );
	}
}