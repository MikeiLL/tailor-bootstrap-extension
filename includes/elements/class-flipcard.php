<?php

/**
 * Tailor custom wrapper element class.
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Flipcard_Element' ) ) {

    /**
     * Tailor custom wrapper element class.
     */
    class Tailor_Flipcard_Element extends Tailor_Element {

        /**
         * Registers element settings, sections and controls.
         *
         * @since 1.0.0
         * @access protected
         */
        protected function register_controls() {

            $priority = 0;

            $this->add_section( 'front', array(
                'title'                 =>  __( 'Front', 'tailor' ),
                'priority'              =>  $priority += 10,
            ) );

            $this->add_section( 'back', array(
                'title'                 =>  __( 'Back', 'tailor' ),
                'priority'              =>  $priority += 10,
            ) );

            $priority = 0;



            // Add as many custom settings as you like..
            $this->add_setting( 'title', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'Card Front title',
            ) );
            $this->add_control( 'title', array(
                'label'                 =>  __( 'Title' ),
                'type'                  =>  'text',
                'section'               =>  'front',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'back_title', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'Card Back title',
            ) );
            $this->add_control( 'back_title', array(
                'label'                 =>  __( 'Title' ),
                'type'                  =>  'text',
                'section'               =>  'back',
                'priority'              =>  $priority += 10,
            ) );

            $this->add_setting( 'front_image', array(
                'default'               =>  '',
            ) );
            $this->add_control( 'Front_image', array(
                'label'                 =>  __( 'Image' ),
                'type'                  =>  'image',
                'section'               =>  'front',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'back_image', array(
                'default'               =>  '',
            ) );
            $this->add_control( 'back_image', array(
                'label'                 =>  __( 'Image' ),
                'type'                  =>  'image',
                'section'               =>  'back',
                'priority'              =>  $priority += 10,
            ) );

            $this->add_setting( 'front_background_color', array(
                'default'               =>  '',
            ) );
            $this->add_control( 'front_background_color', array(
                'label'                 =>  __( 'Background Color' ),
                'type'                  =>  'colorpicker',
                'section'               =>  'front',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'back_background_color', array(
                'default'               =>  '',
            ) );
            $this->add_control( 'back_background_color', array(
                'label'                 =>  __( 'Background Color' ),
                'type'                  =>  'colorpicker',
                'section'               =>  'back',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'front_background_image', array(
                'default'               =>  '',
            ) );
            $this->add_control( 'front_background_image', array(
                'label'                 =>  __( 'Background Image' ),
                'type'                  =>  'image',
                'section'               =>  'front',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'front_text_body', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'I am some words',
            ) );
            $this->add_control( 'front_text_body', array(
                'label'                 =>  __( 'Background Title' ),
                'type'                  =>  'textarea',
                'section'               =>  'front',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'back_background_image', array(
                'default'               =>  '',
            ) );
            $this->add_control( 'back_background_image', array(
                'label'                 =>  __( 'Background Image' ),
                'type'                  =>  'image',
                'section'               =>  'back',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'back_text_body', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'I am some words',
            ) );
            $this->add_control( 'back_text_body', array(
                'label'                 =>  __( 'Background Title' ),
                'type'                  =>  'textarea',
                'section'               =>  'back',
                'priority'              =>  $priority += 10,
            ) );

            $card_back_control_types = array();
            $card_back_control_arguments = array();
            tailor_control_presets( $this, $card_back_control_types, $card_back_control_arguments, $priority );

            $priority = 0;
            $color_control_types = array(
                'color',
                'link_color',
                'link_color_hover',
                'heading_color',
                'background_color',
                'border_color',
            );
            $color_control_arguments = array();
            tailor_control_presets( $this, $color_control_types, $color_control_arguments, $priority );

            $priority = 0;
            $attribute_control_types = array(
                'class',
                'padding',
                'padding_tablet',
                'padding_mobile',
                'margin',
                'margin_tablet',
                'margin_mobile',
                'border_style',
                'border_width',
                'border_width_tablet',
                'border_width_mobile',
                'border_radius',
                'shadow',
                'background_image',
                'background_repeat',
                'background_position',
                'background_size',
                'background_attachment',
            );
            $attribute_control_arguments = array();
            tailor_control_presets( $this, $attribute_control_types, $attribute_control_arguments, $priority );
        }

        /**
         * Returns custom CSS rules for the element.
         *
         * @since 1.0.0
         *
         * @param $atts
         * @return array
         */
        public function generate_css( $atts = array() ) {

            $css_rules = array();
            $excluded_control_types = array(
                'padding',
                'padding_tablet',
                'padding_mobile'
            );
            $css_rules = tailor_css_presets( $css_rules, $atts, $excluded_control_types );

            $selectors = array(
                'padding'                   =>  array( '.tailor-card__content' ),
                'padding_tablet'            =>  array( '.tailor-card__content' ),
                'padding_mobile'            =>  array( '.tailor-card__content' ),
            );
            $css_rules = tailor_generate_attribute_css_rules( $css_rules, $atts, $selectors );

            // Header border color
            if ( ! empty( $atts['border_color'] ) ) {
                $css_rules[] = array(
                    'setting'           =>  'border_color',
                    'selectors'         =>  array( '.tailor-card__header' ),
                    'declarations'      =>  array(
                        'border-color'      =>  esc_attr( $atts['border_color'] ),
                    ),
                );
            }

            // Header image
            if ( ! empty( $atts['image'] ) && is_numeric( $atts['image'] ) ) {
                $background_image_info = wp_get_attachment_image_src( $atts['image'], 'full' );
                $background_image_src = $background_image_info[0];
                $css_rules[] = array(
                    'setting'           =>  'image',
                    'selectors'         =>  array( '.tailor-card__header' ),
                    'declarations'      =>  array(
                        'background'        =>  "url('{$background_image_src}') center center no-repeat",
                        'background-size'   =>  'cover',
                    ),
                );
            }

            return $css_rules;
        }
    }
}
