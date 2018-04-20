<?php

/**
 * Custom content partial.
 */
global $post;
defined( 'ABSPATH' ) or die(); ?>

<article id="project-<?php esc_attr_e( $post->ID ); ?>" class="<?php esc_attr_e( implode( ' ', get_post_class( 'entry project' ) ) ); ?>">
    <?php echo do_shortcode( $item_content ); ?>
    <h3>I am a thing.</h3>
</article>
