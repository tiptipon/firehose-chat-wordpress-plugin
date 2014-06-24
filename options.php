<div class="wrap">
<h2>Firehose Chat</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('firehose_chat'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Firehose Product ID:</th>
<td><input type="text" name="firehose_product_id" value="<?php echo get_option('firehose_product_id'); ?>" /></td>
</tr>

</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
