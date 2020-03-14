<?php
// Include Tab General Settings
$_tab_name = "Water";
$_tab_slug = 'water';
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
            'id'       => 'imperial_field_options_' . $_tab_slug,
            'type'     => 'multi_text',
            'title'    => __( 'Field Options', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
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
            'id'       => 'metric_field_options_' . $_tab_slug,
            'type'     => 'multi_text',
            'title'    => __( 'Field Options', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
        ),
    )
) );
