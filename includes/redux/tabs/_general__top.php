<?php
Redux::setSection( $opt_name, array(
    'title'            => __( $_tab_name, 'cp-diet-planner' ),
    'id'               => 'cp_dp_' . $_tab_slug,
    'desc'             => __( $_tab_name . ' Options.', 'cp-diet-planner' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-home'
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Heading', 'cp-diet-planner' ),
    'id'               => 'cp_dp_heading_' . $_tab_slug,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => "",
    'fields'           => array(
        array(
            'id'       => 'title_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Title', 'cp-diet-planner' ),
            'subtitle' => "",
            'desc'     => ""
        ),
        array(
            'id'       => 'description_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Description', 'cp-diet-planner' ),
            'subtitle' => "",
            'desc'     => ""
        ),
        array(
            'id'       => 'sub_title_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Sub Title', 'cp-diet-planner' ),
            'subtitle' => "",
            'desc'     => ""
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Nav', 'cp-diet-planner' ),
    'id'               => 'cp_dp_nav_' . $_tab_slug,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => "",
    'fields'           => array(
        array(
            'id'       => 'nav_icon_' . $_tab_slug,
            'type'     => 'media',
            'title'    => __( 'Nav Icon', 'cp-diet-planner' ),
            'desc'     => '',
            'subtitle' => '',
        ),
        array(
            'id'       => 'nav_title_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Nav Title', 'cp-diet-planner' ),
            'subtitle' => "",
            'desc'     => ""
        ),
    )
) );