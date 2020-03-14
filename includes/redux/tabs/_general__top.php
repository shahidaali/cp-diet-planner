<?php
Redux::setSection( $opt_name, array(
    'title'            => __( $_tab_name, 'cp-diet-planner' ),
    'id'               => 'cp_dp_' . $_tab_slug,
    'desc'             => __( $_tab_name . ' Options.', 'cp-diet-planner' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-home'
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Tab Settings', 'cp-diet-planner' ),
    'id'               => 'cp_dp_tab_' . $_tab_slug,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => "",
    'fields'           => array(
        array(
            'id'       => 'heading_section' . $_tab_slug,
            'type'     => 'section',
            'title'    => __( 'Headings', 'cp-diet-planner' ),
            'subtitle' => '',
            'indent'   => true,
        ),
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
        array(
            'id'       => 'nav_section' . $_tab_slug,
            'type'     => 'section',
            'title'    => __( 'Nav', 'cp-diet-planner' ),
            'subtitle' => '',
            'indent'   => true,
        ),
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
        array(
            'id'       => 'content_section' . $_tab_slug,
            'type'     => 'section',
            'title'    => __( 'Content', 'cp-diet-planner' ),
            'subtitle' => '',
            'indent'   => true,
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
        array(
            'id'       => 'buttons_section' . $_tab_slug,
            'type'     => 'section',
            'title'    => __( 'Buttons', 'cp-diet-planner' ),
            'subtitle' => '',
            'indent'   => true,
        ),
        array(
            'id'       => 'next_button_text_' . $_tab_slug,
            'type'     => 'text',
            'title'    => __( 'Next Button Text', 'cp-diet-planner' ),
            'subtitle' => '',
            'desc'     => "",
            'default'  => 'Continue',
        ),
    )
) );