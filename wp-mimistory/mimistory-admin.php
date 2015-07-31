<div class="wrap">
	<h2>Mimistory Settings</h2>
	<form name="udtest_form" method="post" action="options.php">
		<?php settings_fields( 'mimistory-settings' ); ?>
    	<?php do_settings_sections( 'mimistory-settings' ); ?>
		<input type="text" name="mimi_username" value="<?php echo get_option( 'mimi_username' ); ?>" >
		<p class="submit">
			<?php submit_button(); ?>
		</p>
	</form>
</div>