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
        $atts['class'] = isset($atts['class']) ? $atts['class'] : 'tailor-bs4-flipcard';
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
        $html_atts['class'] = isset($html_atts['class']) ? $html_atts['class'] : 'tailor-bs4-flipcard';
        $html_atts = apply_filters( 'tailor_shortcode_html_attributes', $html_atts, $atts, $tag );
        $html_atts['class'] = implode( ' ', (array) $html_atts['class'] );
        $html_atts = tailor_get_attributes( $html_atts );
        ob_start();

        tailor_partial( 'content', 'test', array(
            'atts' => $atts,
            'html_atts' => $html_atts,
            'test_key' => 'i am here'
        ));

        $outer_html = "Outer Here <div {$html_atts}>%s</div>";

        // $inner_html = '<header class="tailor-card__header">' . $atts['heading'] . '</header>';

        $inner_html = 'This is inner <div class="tailor-flipcard__content">%s</div>';

        $content = ob_get_clean();

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
        $html = apply_filters( 'tailor_flipcard', $html, $outer_html, $inner_html, $html_atts, $atts, $content, $tag );

        return $html;
    }

    add_shortcode( 'tailor_flipcard_qwerty', 'tailor_shortcode_flipcard_element' );
}
