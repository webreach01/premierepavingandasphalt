var pjQ = pjQ || {},
	ContactForm_<?php echo $_GET['fid']; ?>;
(function () {
	"use strict";
	var loadRemote = function(url, type, callback) {
		var _element, _type, _attr, scr, s, element;
		
		switch (type) {
		case 'css':
			_element = "link";
			_type = "text/css";
			_attr = "href";
			break;
		case 'js':
			_element = "script";
			_type = "text/javascript";
			_attr = "src";
			break;
		}
		
		scr = document.getElementsByTagName(_element);
		s = scr[scr.length - 1];
		element = document.createElement(_element);
		element.type = _type;
		if (type == "css") {
			element.rel = "stylesheet";
		}
		if (element.readyState) {
			element.onreadystatechange = function () {
				if (element.readyState == "loaded" || element.readyState == "complete") {
					element.onreadystatechange = null;
					callback();
				}
			};
		} else {
			element.onload = function () {
				callback();
			};
		}
		element[_attr] = url;
		s.parentNode.insertBefore(element, s.nextSibling);
	},
	loadScript = function (url, callback) {
		loadRemote(url, "js", callback);
	},
	loadCss = function (url, callback) {
		loadRemote(url, "css", callback);
	};
	<?php $error_msg = str_replace(array('"', "'"), array('\"', "\'"), __('front_err', true, false));?>
	var CFObj = {
		server: "<?php echo PJ_INSTALL_URL; ?>",
		folder: "<?php echo PJ_INSTALL_URL; ?>",
		fid: <?php echo $_GET['fid']; ?>,

		form: "pjCF_form_<?php echo $_GET['fid'];?>",
		week_start: <?php echo $tpl['option_arr']['o_week_start']; ?>,
		jq_date_format: "<?php echo pjUtil::jqDateFormat($tpl['arr']['date_format']);?>",
		date_format: "<?php echo $tpl['arr']['date_format']; ?>",
		confirm_option: "<?php echo $tpl['arr']['confirm_options']; ?>",
		thankyou_page: "<?php echo $tpl['arr']['thankyou_page']; ?>",
		confirm_message: "<?php echo pjSanitize::clean($tpl['arr']['confirm_message']); ?>",
		banned_words: "<?php echo trim(str_replace( array("\r\n"), "|", $tpl['arr']['block_words'])); ?>",
		error_message: <?php echo pjAppController::jsonEncode($error_msg); ?>,
		is_reject: <?php echo $tpl['arr']['reject_links'] == 'T' ? 'true' : 'false'; ?>,

		<?php include PJ_VIEWS_PATH . 'pjFront/elements/rules.php';  ?>,
		<?php include PJ_VIEWS_PATH . 'pjFront/elements/messages.php';  ?>
	};
	
	loadScript("<?php echo PJ_INSTALL_URL . PJ_LIBS_PATH; ?>pjQ/pjQuery.js", function () {
		loadScript("<?php echo PJ_INSTALL_URL . PJ_LIBS_PATH; ?>pjQ/pjQuery.validate.min.js", function () {
			loadScript("<?php echo PJ_INSTALL_URL . PJ_LIBS_PATH; ?>pjQ/pjQuery.additional-methods.min.js", function () {
				loadScript("<?php echo PJ_INSTALL_URL . PJ_LIBS_PATH; ?>pjQ/pjQuery.bootstrap.min.js", function () {
					loadScript("<?php echo PJ_INSTALL_URL . PJ_LIBS_PATH; ?>pjQ/pjQuery-ui-1.9.2.custom.min.js", function () {
						loadScript("<?php echo PJ_INSTALL_URL . PJ_LIBS_PATH; ?>pjQ/pjQuery.form.min.js", function () {	
							loadScript("<?php echo PJ_INSTALL_URL . PJ_JS_PATH; ?>pjLoad.js", function () {
								ContactForm_<?php echo $_GET['fid']; ?> = new ContactForm(CFObj);
							});
						});
					});
				});
			});
		});
	});
})();