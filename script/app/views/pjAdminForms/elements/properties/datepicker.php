<input type="hidden" name="field_id" value="<?php echo $tpl['field_arr']['id'];?>" />
<p>
	<label><?php __('lblLabel', false, true);?>:</label>
	<span class="block">
		<input name="label" class="pj-form-field" value="<?php echo $tpl['field_arr']['label'] != '' ? pjSanitize::clean($tpl['field_arr']['label']) : null; ?>"/>
	</span>
</p>
<p>
	<label><?php __('lblSize', false, true);?>(%):</label>
	<span class="block">
		<input name="size" class="pj-form-field" value="<?php echo $tpl['field_arr']['size'] != '' ? $tpl['field_arr']['size'] : null; ?>"/>
	</span>
</p>
<p>
	<label><?php __('lblRequired', false, true);?>:</label>
	<span class="block">
		<select name="required" class="pj-form-field w150 field-required">
			<?php
			foreach(__('_yesno', true, false) as $k => $v)
			{
				?>
				<option value="<?php echo $k;?>" <?php echo $k == $tpl['field_arr']['required'] ? 'selected="selected"' : null;?>><?php echo $v;?></option>
				<?php
			} 
			?>
		</select>
	</span>
</p>
<p class="required-message-container" style="display:<?php echo $tpl['field_arr']['required'] == 'T' ? 'block' : 'none';?>;">
	<label><?php __('lblRequiredErrorMessage', false, true);?>:</label>
	<span class="block">
		<input name="error_required" class="pj-form-field" value="<?php echo $tpl['field_arr']['error_required'] != '' ? pjSanitize::clean($tpl['field_arr']['error_required']) : null; ?>"/>
	</span>
</p>