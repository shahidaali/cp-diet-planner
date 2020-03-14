<?php
// Include Tab General Settings
$_tab_name = "Target Weight";
$_tab_slug = 'targetweight';
include ("_general__top.php");

// Tab Other Options
Redux::setSection( $opt_name, array(
    'title'            => __( 'General', 'cp-diet-planner' ),
    'id'               => 'cp_dp_genral_' . $_tab_slug,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => "",
    'fields'           => array(
        array(
            'id'       => 'button_text_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Button Text', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Continue',
        ),
        array(
            'id'       => 'content_before_' . $_tab_slug,
            'type'     => 'textarea',
            'title'    => __( 'Content Header', 'cp-diet-planner' ),
            'subtitle' => __('Content after headings.'),
            'desc'     => ""
        ),
        array(
            'id'       => 'content_after_' . $_tab_slug,
            'type'     => 'textarea',
            'title'    => __( 'Content Footer', 'cp-diet-planner' ),
            'subtitle' => __('Content at bottom of section.'),
            'desc'     => ""
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Options', 'cp-diet-planner' ),
    'id'               => 'cp_dp_options_' . $_tab_slug,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => "",
    'fields'           => array(
        array(
            'id'       => 'imperial_section_' . $_tab_slug,
            'type'     => 'section',
            'title'    => __( 'Imperial Settings', 'cp-diet-planner' ),
            'subtitle' => '',
            'indent'   => true,
        ),
        array(
            'id'       => 'imperial_title_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Imperial Title', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Imperial',
        ),
        array(
            'id'       => 'imperial_label_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Imperial Field Label', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Desired weight (lb)',
        ),
        array(
            'id'       => 'imperial_options_from_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Imperial Options From', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value start e.g 90 ",
            'validate' => 'numeric',
            'default'  => '90',
        ),
        array(
            'id'       => 'imperial_options_to_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Imperial Options To', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value start e.g 400 ",
            'validate' => 'numeric',
            'default'  => '400',
        ),
        array(
            'id'       => 'metric_section_' . $_tab_slug,
            'type'     => 'section',
            'title'    => __( 'Metric Settings', 'cp-diet-planner' ),
            'subtitle' => '',
            'indent'   => true,
        ),
        array(
            'id'       => 'metric_title_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Metric Title', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Metric',
        ),
        array(
            'id'       => 'metric_label_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Metric Field Label', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Desired weight (kg)',
        ),
        array(
            'id'       => 'metric_options_from_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Metric Options From', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value start e.g 90 ",
            'validate' => 'numeric',
            'default'  => '90',
        ),
        array(
            'id'       => 'metric_options_to_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Metric Options To', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value start e.g 400 ",
            'validate' => 'numeric',
            'default'  => '400',
        ),
    )
) );
