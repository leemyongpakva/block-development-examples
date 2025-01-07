<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 * @package BlockDevelopmentExamples\InteractivityAPIBlock833d15
 */

// Generate unique id for aria-controls.
$unique_id = wp_unique_id( 'p-' );

// Enqueue the view file.
if ( function_exists( 'gutenberg_enqueue_module' ) ) {
	gutenberg_enqueue_module( 'interactivity_api_block_833d15__view' );
}
?>

<div
	<?php echo wp_kses_data( get_block_wrapper_attributes() ); ?>
	data-wp-interactive='{ "namespace": "interactivity-api-block-833d15__store" }'
	data-wp-context='{ "isOpen": false }'
	data-wp-watch="callbacks.logIsOpen"
>
	<button
		data-wp-on--click="actions.toggle"
		data-wp-bind--aria-expanded="context.isOpen"
		aria-controls="<?php echo esc_attr( $unique_id ); ?>"
	>
		<?php esc_html_e( 'Toggle', 'block-development-examples' ); ?>
	</button>

	<p
		id="<?php echo esc_attr( $unique_id ); ?>"
		data-wp-bind--hidden="!context.isOpen"
	>
		<?php
			esc_html_e( 'Example Interactivity API Block – hello from an interactive block!', 'block-development-examples' );
		?>
	</p>
</div>
