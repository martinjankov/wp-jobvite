<?php
	$jv_api_key 	= get_option('jv_api_key', '');
	$jv_api_secret 	= get_option('jv_api_secret', '');
	$jv_client_id 	= get_option('jv_client_id', '');
	$jv_staging 	= get_option('jv_staging', '');
	$jv_api_endpoint 	= get_option('jv_api_endpoint', '');
	$jv_stg_api_endpoint 	= get_option('jv_stg_api_endpoint', '');
?>
<div class="wrap">
	<h2>GLG Jobvite Settings</h2>
	<hr>
	<form method="post" action="options.php">	    
		<?php settings_fields( 'jv-settings-group' ); ?>
	    <?php do_settings_sections( 'jv-settings-group' ); ?>
	    <table class="form-table">
	    	<tr valign="top">
	        	<th scope="row">Enable Staging</th>
	        	<td>
	        		<input type="checkbox" name="jv_staging" value="1" <?php checked( 1, $jv_staging ); ?> />
	        	</td>
	        </tr>
	        <tr valign="top">
	        	<th scope="row">Production Api Endpoint</th>
	        	<td>
	        		<input type="text" name="jv_api_endpoint" value="<?php echo $jv_api_endpoint; ?>" size="100" />
	        	</td>
	        </tr>
	        <tr valign="top">
	        	<th scope="row">Staging Api Endpoint</th>
	        	<td>
	        		<input type="text" name="jv_stg_api_endpoint" value="<?php echo $jv_stg_api_endpoint; ?>" size="100" />
	        	</td>
	        </tr>
			<tr valign="top">
	        	<th scope="row">Api Key</th>
	        	<td>
	        		<input type="text" name="jv_api_key" value="<?php echo $jv_api_key; ?>" size="100"/>
	        	</td>
	        </tr>
	        <tr valign="top">
	        	<th scope="row">Api Secret</th>
	        	<td>
	        		<input type="text" name="jv_api_secret" value="<?php echo $jv_api_secret; ?>" size="100"/>
	        	</td>
	        </tr>
	    </table>
	    
	    <?php submit_button(); ?>
	</form>
</div>