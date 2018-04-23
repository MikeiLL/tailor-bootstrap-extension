<?php

if ( ! function_exists( 'tailor_shortcode_flipcard_element' ) ) {

    /**
     * Defines the shortcode rendering function for the flipcard
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_flipcard_element( $atts, $content = null, $tag ) {


        /**
         * Filter the default shortcode attributes.
         *
         * @since 1.6.6
         *
         * @param array
         */
        $default_atts = apply_filters( 'tailor_shortcode_default_atts_' . $tag, array() );
        $atts = shortcode_atts( $default_atts, $atts, $tag );
        $html_atts = array(
            'id'            =>  empty( $atts['id'] ) ? null : $atts['id'],
            'class'         =>  explode( ' ', "tailor-element tailor-card {$atts['class']}" ),
            'data'          =>  array(),
        );

        if ( isset($atts['image']) && is_numeric( $atts['image'] ) ) {
            $html_atts['class'][] = 'has-header-image';
        }

        /**
         * Filter the HTML attributes for the element.
         *
         * @since 1.7.0
         *
         * @param array $html_attributes
         * @param array $atts
         * @param string $tag
         */
        $html_atts = apply_filters( 'tailor_shortcode_html_attributes', $html_atts, $atts, $tag );
        $html_atts['class'] = implode( ' ', (array) $html_atts['class'] );
        $html_atts = tailor_get_attributes( $html_atts );

        ob_start();
        mz_pr( $atts );
        $outer_html = "<div {$html_atts}>%s</div>";

        //$inner_html = '<header class="tailor-card__header">' . $title . '</header>';

        tailor_partial( 'content', 'flipcard', array(
            'atts' => $atts,
            'html_atts' => $html_atts,
            'test_key' => 'i am here'
        ));


        $content = ob_get_clean();
        $inner_html = '<div class="tailor-flipcard__content">%s</div>';

        $html = sprintf( $outer_html, sprintf( $inner_html, $content ) );


        /**
         * Filter the HTML for the element.
         *
         * @since 1.7.0
         *
         * @param string $html
         * @param string $outer_html
         * @param string $inner_html
         * @param string $html_atts
         * @param array $atts
         * @param string $content
         * @param string $tag
         */
        $html = apply_filters( 'tailor_shortcode_html', $html, $outer_html, $inner_html, $html_atts, $atts, $content, $tag );

        return $html;
    }

    add_shortcode( 'tailor_flipcard', 'tailor_shortcode_flipcard_element' );
}
