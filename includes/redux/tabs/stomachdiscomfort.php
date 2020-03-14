<?php
// Include Tab General Settings
$_tab_name = "Stomach Discomfort";
$_tab_slug = 'stomachdiscomfort';
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

$__section_fiels = [];
for($i  = 1; $i <= 2; $i++) {
    $__section_fiels[] = array(
        'id'       => 'option_section_' . $i . '_' . $_tab_slug,
        'type'     => 'section',
        'title'    => __( 'Option '. $i .' Settings ', 'cp-diet-planner' ),
        'subtitle' => '',
        'indent'   => true,
    );
    $__section_fiels[] = array(
        'id'       => 'option_icon_' . $i . '_' . $_tab_slug,
        'type'     => 'media',
        'title'    => __( 'Option Icon ' . $i, 'cp-diet-planner' ),
        'desc'     => '',
        'subtitle' => '',
    );
    $__section_fiels[] = array(
        'id'       => 'option_title_' . $i . '_' . $_tab_slug,
        'type'     => 'text',
        'title'    => __( 'Option Title ' . $i, 'cp-diet-planner' ),
        'desc'     => '',
        'subtitle' => '',
    );
    $__section_fiels[] = array(
        'id'       => 'option_text_' . $i . '_' . $_tab_slug,
        'type'     => 'text',
        'title'    => __( 'Option Text ' . $i, 'cp-diet-planner' ),
        'desc'     => '',
        'subtitle' => '',
    );
}
Redux::setSection( $opt_name, array(
    'title'            => __( 'Options', 'cp-diet-planner' ),
    'id'               => 'cp_dp_options_' . $_tab_slug,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => "",
    'fields'           => $__section_fiels
) );
