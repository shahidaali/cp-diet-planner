<?php
// Include Tab General Settings
$_tab_name = "Body type";
$_tab_slug = 'bodytype';
include ("_general__top.php");

// Tab Other Options
Redux::setSection( $opt_name, array(
    'title'            => __( 'Options', 'cp-diet-planner' ),
    'id'               => 'cp_dp_options_' . $_tab_slug,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => "",
    'fields'           => cp_dp_option_fields( $_tab_slug, 3 )
) );
