<?php
// Include Tab General Settings
$_tab_name = "Graph";
$_tab_slug = 'graph';
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
            'id'       => 'graph_' . $_tab_slug,
            'type'     => 'media',
            'title'    => __( 'Graph Image', 'cp-diet-planner' ),
            'desc'     => '',
            'subtitle' => '',
        ),
        array(
            'id'       => 'button_text_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Button Text', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'OK, Got it',
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
            'id'       => 'option_male_section_' . $_tab_slug,
            'type'     => 'section',
            'title'    => __( 'Male Option', 'cp-diet-planner' ),
            'subtitle' => '',
            'indent'   => true,
        ),
        array(
            'id'       => 'option_male_image_' . $_tab_slug,
            'type'     => 'media',
            'title'    => __( 'Male Option Image', 'cp-diet-planner' ),
            'desc'     => '',
            'subtitle' => '',
        ),
        array(
            'id'       => 'option_man_title_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Male Option Title', 'cp-diet-planner' ),
            'subtitle' => "",
            'desc'     => ""
        ),
        array(
            'id'       => 'option_female_section_' . $_tab_slug,
            'type'     => 'section',
            'title'    => __( 'Female Option', 'cp-diet-planner' ),
            'subtitle' => '',
            'indent'   => true,
        ),
        array(
            'id'       => 'option_female_image_' . $_tab_slug,
            'type'     => 'media',
            'title'    => __( 'Female Option Image', 'cp-diet-planner' ),
            'desc'     => '',
            'subtitle' => '',
        ),
        array(
            'id'       => 'option_female_title_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Female Option Title', 'cp-diet-planner' ),
            'subtitle' => "",
            'desc'     => ""
        ),
    )
) );