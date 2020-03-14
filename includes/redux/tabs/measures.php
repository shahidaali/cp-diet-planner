<?php
// Include Tab General Settings
$_tab_name = "Measures";
$_tab_slug = 'measures';
include ("_general__top.php");

// Tab Other Options
Redux::setSection( $opt_name, array(
    'title'            => __( 'Options', 'cp-diet-planner' ),
    'id'               => 'cp_dp_options_' . $_tab_slug,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => "",
    'fields'           => array(
        // Imperial Section
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
            'id'       => 'imperial_age_label_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Age Label', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Age',
        ),
        array(
            'id'       => 'imperial_ft_label_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Ft Label', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Ft',
        ),
        array(
            'id'       => 'imperial_inch_label_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Inch Label', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Inch',
        ),
        array(
            'id'       => 'imperial_weight_label_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Weight Label', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Current weight (lb)',
        ),
        array(
            'id'       => 'imperial_age_options_from_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Age Options From', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value start e.g 18 ",
            'validate' => 'numeric',
            'default'  => '18',
        ),
        array(
            'id'       => 'imperial_age_options_to_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Age Options To', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value to e.g 80 ",
            'validate' => 'numeric',
            'default'  => '80',
        ),
         array(
            'id'       => 'imperial_weight_options_from_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Weight Options From', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value start e.g 90 ",
            'validate' => 'numeric',
            'default'  => '90',
        ),
        array(
            'id'       => 'imperial_weight_options_to_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Weight Options To', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value to e.g 400 ",
            'validate' => 'numeric',
            'default'  => '400',
        ),

        // Metric Section
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
            'id'       => 'metric_age_label_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Age Label', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Age',
        ),
        array(
            'id'       => 'metric_height_label_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Height Label', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Height (cm)',
        ),
        array(
            'id'       => 'metric_weight_label_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Weight Label', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Current weight (lb)',
        ),
        array(
            'id'       => 'metric_age_options_from_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Age Options From', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value start e.g 18 ",
            'validate' => 'numeric',
            'default'  => '18',
        ),
        array(
            'id'       => 'metric_age_options_to_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Age Options To', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value to e.g 80 ",
            'validate' => 'numeric',
            'default'  => '80',
        ),
        array(
            'id'       => 'metric_height_options_from_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Height Options From', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value start e.g 130 ",
            'validate' => 'numeric',
            'default'  => '130',
        ),
        array(
            'id'       => 'metric_height_options_to_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Height Options To', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value to e.g 199 ",
            'validate' => 'numeric',
            'default'  => '199',
        ),
         array(
            'id'       => 'metric_weight_options_from_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Weight Options From', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value start e.g 90 ",
            'validate' => 'numeric',
            'default'  => '90',
        ),
        array(
            'id'       => 'metric_weight_options_to_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Weight Options To', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "Enter value to e.g 400 ",
            'validate' => 'numeric',
            'default'  => '400',
        ),
    )
) );
