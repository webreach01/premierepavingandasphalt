<div class="row">
	<div class="col-sm-6 col-xs-12">
		<input type="text" name="captcha" maxlength="6" class="form-control pjCF-form-field required" />
	</div>
	<div class="col-sm-6 col-xs-12">
		<img id="pjCF_captcha_img" src="<?php echo PJ_INSTALL_URL; ?>index.php?controller=pjFront&amp;action=pjActionCaptcha&amp;id=<?php echo $tpl['arr']['id']?>&amp;rand=<?php echo rand(1, 999999); ?>" alt="Captcha" />
	</div>
</div>