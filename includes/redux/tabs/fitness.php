<?php
// Include Tab General Settings
$_tab_name = "Fitness";
$_tab_slug = 'fitness';
include ("_general__top.php");

// Tab Other Options
Redux::setSection( $opt_name, array(
    'title'            => __( 'Options', 'cp-diet-planner' ),
    'id'               => 'cp_dp_options_' . $_tab_slug,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => "",
    'fields'           => array(
        array(
            'id'       => 'field_options_' . $_tab_slug,
            'type'     => 'multi_text',
            'title'    => __( 'Field Options', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
        ),
    )
) );
