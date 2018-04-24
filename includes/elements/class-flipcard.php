<?php

/**
 * Tailor custom wrapper element class.
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Flipcard_Qwerty_Element' ) ) {

    /**
     * Tailor custom wrapper element class.
     */
    class Tailor_Flipcard_Qwerty_Element extends Tailor_Element {

        /**
         * Registers element settings, sections and controls.
         *
         * @since 1.0.0
         * @access protected
         */
        protected function register_controls()
        {

            $priority = 20;

            $this->add_section('front', array(
                'title' => __('Front', 'tailor'),
                'priority' => $priority = 10,
            ));

            $this->add_section('back', array(
                'title' => __('Back', 'tailor'),
                'priority' => $priority = 20,
            ));

            $this->add_setting('heading', array(
                'sanitize_callback' => 'tailor_sanitize_text',
                'default' => 'Card Front Heading',
            ));
            $this->add_control('heading', array(
                'label' => __('Heading'),
                'type' => 'text',
                'section' => 'front',
                'priority' => $priority += 10,
            ));
            $this->add_setting('back_heading', array(
                'sanitize_callback' => 'tailor_sanitize_text',
                'default' => 'Card Back Heading',
            ));
            $this->add_control('back_heading', array(
                'label' => __('Heading'),
                'type' => 'text',
                'section' => 'back',
                'priority' => $priority += 10,
            ));
            $this->add_setting('front_text_body', array(
                'sanitize_callback' => 'tailor_sanitize_text',
                'default' => 'I am some words on the front.',
            ));
            $this->add_control('front_text_body', array(
                'label' => __('Front Copy'),
                'type' => 'textarea',
                'section' => 'front',
                'priority' => $priority += 10,
            ));
            $this->add_setting('back_text_body', array(
                'sanitize_callback' => 'tailor_sanitize_text',
                'default' => 'I am some words on back.',
            ));
            $this->add_control('back_text_body', array(
                'label' => __('Background Copy'),
                'type' => 'textarea',
                'section' => 'back',
                'priority' => $priority += 10,
            ));
            $this->add_setting('front_image', array(
                'default' => '',
            ));
            $this->add_control('front_image', array(
                'label' => __('Image'),
                'type' => 'image',
                'section' => 'front',
                'priority' => $priority += 10,
            ));
            $this->add_setting('back_image', array(
                'default' => '',
            ));
            $this->add_control('back_image', array(
                'label' => __('Image'),
                'type' => 'image',
                'section' => 'back',
                'priority' => $priority += 10,
            ));
            $this->add_setting('front_color', array(
                'default' => '',
            ));
            $this->add_control('front_color', array(
                'label' => __('Text Color'),
                'type' => 'colorpicker',
                'section' => 'front',
                'priority' => $priority += 10,
            ));
            $this->add_setting('back_color', array(
                'default' => '',
            ));
            $this->add_control('back_color', array(
                'label' => __('Text Color'),
                'type' => 'colorpicker',
                'section' => 'back',
                'priority' => $priority += 10,
            ));
            $this->add_setting('front_background_color', array(
                'default' => '',
            ));
            $this->add_control('front_background_color', array(
                'label' => __('Background Color'),
                'type' => 'colorpicker',
                'section' => 'front',
                'priority' => $priority += 10,
            ));
            $this->add_setting('back_background_color', array(
                'default' => '',
            ));
            $this->add_control('back_background_color', array(
                'label' => __('Background Color'),
                'type' => 'colorpicker',
                'section' => 'back',
                'priority' => $priority += 10,
            ));
            $this->add_setting('front_background_image', array(
                'default' => '',
            ));
            $this->add_control('front_background_image', array(
                'label' => __('Background Image'),
                'type' => 'image',
                'section' => 'front',
                'priority' => $priority += 10,
            ));
            $this->add_setting('back_background_image', array(
                'default' => '',
            ));
            $this->add_control('back_background_image', array(
                'label' => __('Background Image'),
                'type' => 'image',
                'section' => 'back',
                'priority' => $priority += 10,
            ));
            $this->add_setting('back_test_text_here', array(
                'default' => 'test',
            ));
            $this->add_control('back_test_text_here', array(
                'label' => __('Text Test'),
                'type' => 'text',
                'section' => 'front',
                'priority' => $priority += 10,
            ));
            $this->add_setting('back_test_text_two', array(
                'default' => 'test',
            ));
            $this->add_control('back_test_text_two', array(
                'label' => __('Back Text Test'),
                'type' => 'text',
                'section' => 'back',
                'priority' => $priority += 10,
            ));

            $card_front_control_types = array(
                'text',
                'textarea',
                'colorpicker',
                'image'
            );
            $card_front_control_arguments = array();
            tailor_control_presets($this, $card_front_control_types, $card_front_control_arguments, $priority);

            $card_back_control_types = array(
                'text',
                'textarea',
                'colorpicker',
                'image'
            );
            $card_back_control_arguments = array();
            tailor_control_presets($this, $card_back_control_types, $card_back_control_arguments, $priority);

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
