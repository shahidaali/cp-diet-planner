<?php

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

?>
<div class="wrap" id="cp-diet-planner-plan-editor">

<h1 class="wp-heading-inline"><?php
	if ( $plan->initial() ) {
		echo esc_html( __( 'Add New View', 'cp-diet-planner' ) );
	} else {
		echo esc_html( __( 'Edit View', 'cp-diet-planner' ) );
	}
?></h1>

<?php
	if ( ! $plan->initial() and current_user_can( 'cp_diet_planner_edit_plans' ) ) {
		echo CP_Diet_Planner_Utility::get_link(
			menu_page_url( 'cp-diet-planner-new', false ),
			__( 'Add New', 'cp-diet-planner' ),
			array( 'class' => 'page-title-action' )
		);
	}
?>

<hr class="wp-header-end">

<?php
	do_action( 'cp_diet_planner_admin_warnings',
		$plan->initial() ? 'cp-diet-planner-new' : 'cp-diet-planner',
		CP_Diet_Planner_Utility::current_action(),
		$plan
	);

	do_action( 'cp_diet_planner_admin_notices',
		$plan->initial() ? 'cp-diet-planner-new' : 'cp-diet-planner',
		CP_Diet_Planner_Utility::current_action(),
		$plan
	);
?>

<?php
if ( $plan ) :

	if ( current_user_can( 'cp_diet_planner_edit_plan', $plan_id ) ) {
		$disabled = '';
	} else {
		$disabled = ' disabled="disabled"';
	}
?>

<form method="post" action="<?php echo esc_url( add_query_arg( array( 'post' => $plan_id ), menu_page_url( 'cp-diet-planner', false ) ) ); ?>" id="cp-diet-planner-admin-form-element"<?php do_action( 'cp-diet-planner_post_edit_form_tag' ); ?>>
<?php
	if ( current_user_can( 'cp_diet_planner_edit_plan', $plan_id ) ) {
		wp_nonce_field( 'cp-diet-planner-save-plan_' . $plan_id );
	}
?>
<input type="hidden" id="post_ID" name="post_ID" value="<?php echo (int) $plan_id; ?>" />
<input type="hidden" id="cp-diet-planner-locale" name="cp-diet-planner-locale" value="<?php echo esc_attr( $plan->locale() ); ?>" />
<input type="hidden" id="hiddenaction" name="action" value="save" />
<input type="hidden" id="active-tab" name="active-tab" value="<?php echo isset( $_GET['active-tab'] ) ? (int) $_GET['active-tab'] : '0'; ?>" />

<div id="poststuff">
<div id="post-body" class="metabox-holder columns-2">
<div id="post-body-content">
<div id="titlediv">
<div id="titlewrap">
	<label class="screen-reader-text" id="title-prompt-text" for="title"><?php echo esc_html( __( 'Enter title here', 'cp-diet-planner' ) ); ?></label>
<?php
	$plantitle_atts = array(
		'type' => 'text',
		'name' => 'post_title',
		'size' => 30,
		'value' => $plan->initial() ? '' : $plan->title(),
		'id' => 'title',
		'spellcheck' => 'true',
		'autocomplete' => 'off',
		'disabled' =>
			current_user_can( 'cp_diet_planner_edit_plan', $plan_id ) ? '' : 'disabled',
	);

	echo sprintf( '<input %s />', CP_Diet_Planner_Utility::format_atts( $plantitle_atts ) );
?>
</div><!-- #titlewrap -->

<div class="inside">
<?php
	if ( ! $plan->initial() ) :
	?>
	<p class="description">
	<label for="cp-diet-planner-shortcode"><?php echo esc_html( __( "Copy this shortcode and paste it into your post, page, or text widget content:", 'cp-diet-planner' ) ); ?></label>
	<span class="shortcode wp-ui-highlight"><input type="text" id="cp-diet-planner-shortcode" onfocus="this.select();" readonly="readonly" class="large-text code" value="<?php echo esc_attr( $plan->get_shortcode() ); ?>" /></span>
	</p>
	<?php
	endif;
?>
</div>
</div><!-- #titlediv -->
</div><!-- #post-body-content -->

<div id="postbox-container-1" class="postbox-container">
<?php if ( current_user_can( 'cp_diet_planner_edit_plan', $plan_id ) ) : ?>
<div id="submitdiv" class="postbox">
<h3><?php echo esc_html( __( 'Status', 'cp-diet-planner' ) ); ?></h3>
<div class="inside">
<div class="submitbox" id="submitpost">

<div id="minor-publishing-actions">

<div class="hidden">
	<input type="submit" class="button-primary" name="cp-diet-planner-save" value="<?php echo esc_attr( __( 'Save', 'cp-diet-planner' ) ); ?>" />
</div>

<?php
	if ( ! $plan->initial() ) :
		$copy_nonce = wp_create_nonce( 'cp-diet-planner-copy-plan_' . $plan_id );
?>
	<input type="submit" name="cp-diet-planner-copy" class="copy button" value="<?php echo esc_attr( __( 'Duplicate', 'cp-diet-planner' ) ); ?>" <?php echo "onclick=\"this.form._wpnonce.value = '$copy_nonce'; this.form.action.value = 'copy'; return true;\""; ?> />
<?php endif; ?>
</div><!-- #minor-publishing-actions -->

<div id="misc-publishing-actions">
<?php do_action( 'cp-diet-planner_admin_misc_pub_section', $plan_id ); ?>
</div><!-- #misc-publishing-actions -->

<div id="major-publishing-actions">

<?php
if ( ! $plan->initial() ) :
	$delete_nonce = wp_create_nonce( 'cp-diet-planner-delete-plan_' . $plan_id );
	?>
	<div id="delete-action">
		<input type="submit" name="cp-diet-planner-delete" class="delete submitdelete" value="<?php echo esc_attr( __( 'Delete', 'cp-diet-planner' ) ); ?>" <?php echo "onclick=\"if (confirm('" . esc_js( __( "You are about to delete this contact form.\n  'Cancel' to stop, 'OK' to delete.", 'cp-diet-planner' ) ) . "')) {this.form._wpnonce.value = '$delete_nonce'; this.form.action.value = 'delete'; return true;} return false;\""; ?> />
	</div><!-- #delete-action -->
<?php endif; ?>

<div id="publishing-action">
	<span class="spinner"></span>
	<?php CP_Diet_Planner_Admin_Utility::admin_save_button( $plan_id ); ?>
</div>
<div class="clear"></div>
</div><!-- #major-publishing-actions -->
</div><!-- #submitpost -->
</div>
</div><!-- #submitdiv -->
<?php endif; ?>

<div id="informationdiv" class="postbox">
<h3><?php echo esc_html( __( "Do you need help?", 'cp-diet-planner' ) ); ?></h3>
<div class="inside">
	<p><?php echo esc_html( __( "Here are some available options to help solve your problems.", 'cp-diet-planner' ) ); ?></p>
	<ol>
		<li><?php echo sprintf(
			/* translators: 1: FAQ, 2: Docs ("FAQ & Docs") */
			__( '%1$s &#38; %2$s', 'cp-diet-planner' ),
			CP_Diet_Planner_Utility::get_link(
				__( 'https://contactform7.com/faq/', 'cp-diet-planner' ),
				__( 'FAQ', 'cp-diet-planner' )
			),
			CP_Diet_Planner_Utility::get_link(
				__( 'https://contactform7.com/docs/', 'cp-diet-planner' ),
				__( 'Docs', 'cp-diet-planner' )
			)
		); ?></li>
		<li><?php echo CP_Diet_Planner_Utility::get_link(
			__( 'https://wordpress.org/support/plugin/cp-diet-planner/', 'cp-diet-planner' ),
			__( 'Support Forums', 'cp-diet-planner' )
		); ?></li>
		<li><?php echo CP_Diet_Planner_Utility::get_link(
			__( 'https://contactform7.com/custom-development/', 'cp-diet-planner' ),
			__( 'Professional Services', 'cp-diet-planner' )
		); ?></li>
	</ol>
</div>
</div><!-- #informationdiv -->

</div><!-- #postbox-container-1 -->

<div id="postbox-container-2" class="postbox-container">
	<div id="cp__dp__app">
		<div class="cp__dp_cols cp__dp_cols_2 clearfix">
			<div class="cp__dp_col cp__dp_col_1">
				<!-- Display Title -->
				<!-- <cp-diet-planner-display-title
					panel-title="<?php echo esc_html( __( 'Title', 'cp-diet-planner' ) ); ?>"
					display-title="<?php echo esc_html( __( 'Content', 'cp-diet-planner' ) ); ?>"
				></cp-diet-planner-display-title> -->

				<div class="cp__dp_step" id="step__gender">
					<div class="cp__dp_step_header">
						<h2><?php _e('Gender', 'cp-diet-planner'); ?></h2>
					</div>
					<div class="cp__dp_step_body">
						
					</div>
				</div>
			</div>
			
		</div>
	</div><!-- #plan-editor -->

	<?php if ( current_user_can( 'cp_diet_planner_edit_plan', $plan_id ) ) : ?>
		<p class="submit"><?php CP_Diet_Planner_Admin_Utility::admin_save_button( $plan_id ); ?></p>
	<?php endif; ?>

</div><!-- #postbox-container-2 -->

</div><!-- #post-body -->
<br class="clear" />
</div><!-- #poststuff -->
</form>

<?php endif; ?>

</div><!-- .wrap -->
<?php
do_action( 'cp_diet_planner_admin_footer', $plan );
