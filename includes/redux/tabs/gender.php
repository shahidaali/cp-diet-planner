<?php
// Include Tab General Settings
$_tab_name = "Gender";
$_tab_slug = 'gender';
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
            'id'       => 'male_image_' . $_tab_slug,
            'type'     => 'media',
            'title'    => __( 'Male Image', 'cp-diet-planner' ),
            'desc'     => '',
            'subtitle' => '',
        ),
        array(
            'id'       => 'female_image_' . $_tab_slug,
            'type'     => 'media',
            'title'    => __( 'Female Image', 'cp-diet-planner' ),
            'desc'     => '',
            'subtitle' => '',
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
