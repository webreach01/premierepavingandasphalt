<?php
if (!defined("ROOT_PATH"))
{
	header("HTTP/1.1 403 Forbidden");
	exit;
}
class pjFront extends pjAppController
{
	public $defaultCaptcha = 'StivaSoftCaptcha';
	
	public $defaultLocale = 'front_locale_id';
	
	public function __construct()
	{
		$this->setLayout('pjActionFront');
		self::allowCORS();
	}

	public function isXHR()
	{
		return parent::isXHR() || isset($_SERVER['HTTP_ORIGIN']);
	}
	
	static protected function allowCORS()
	{
		$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '*';
		header("Access-Control-Allow-Origin: $origin");
		header("Access-Control-Allow-Credentials: true");
		header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With");
	}
	
	public function afterFilter()
	{		
		
	}
	
	public function beforeFilter()
	{
		$OptionModel = pjOptionModel::factory();
		$this->option_arr = $OptionModel->getPairs($this->getForeignId());
		$this->set('option_arr', $this->option_arr);
		$this->setTime();

		if (!isset($_SESSION[$this->defaultLocale]))
		{
			pjObject::import('Model', 'pjLocale:pjLocale');
			$locale_arr = pjLocaleModel::factory()->where('is_default', 1)->limit(1)->findAll()->getData();
			if (count($locale_arr) === 1)
			{
				$this->setLocaleId($locale_arr[0]['id']);
			}
		}
		if (!in_array($_GET['action'], array('pjActionLoadCss')))
		{
			$this->loadSetFields();
		}
	}
	
	public function beforeRender()
	{
		if (isset($_GET['iframe']))
		{
			$this->setLayout('pjActionIframe');
		}
	}
	public function pjActionCaptcha()
	{
		$this->setAjax(true);
		$arr = pjFormModel::factory()->find($_GET['id'])->getData();
		if($arr['captcha_type'] == 'string'){
			$Captcha = new pjCaptcha('app/web/obj/Anorexia.ttf', $this->defaultCaptcha . $_GET['id'], 6);
			$Captcha->setImage('app/web/img/button.png')->init(isset($_GET['rand']) ? $_GET['rand'] : null);
		}else{
			$Captcha = new Captcha('app/web/obj/verdana.ttf', $this->defaultCaptcha . $_GET['id'], 6);
			$Captcha->setWidth(120);
			$Captcha->setImage('app/web/img/button-captcha.png');
			$Captcha->init(isset($_GET['rand']) ? $_GET['rand'] : null);
		}
	}

	public function pjActionCheckCaptcha()
	{
		$this->setAjax(true);
		if (!isset($_GET['captcha']) || empty($_GET['captcha']) || strtoupper($_GET['captcha']) != $_SESSION[$this->defaultCaptcha . $_GET['id']]){
			echo 'false';
		}else{
			echo 'true';
		}
	}
	public function pjActionSetLocale()
	{
		$this->setLocaleId(@$_GET['locale']);
		pjUtil::redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function pjActionLoadCss()
	{
		$theme = isset($_GET['theme']) ? $_GET['theme'] : $this->option_arr['o_theme'];
		if((int) $theme > 0)
		{
			$theme = 'theme' . $theme;
		}
		$arr = array(
			array('file' => 'front.css', 'path' => PJ_CSS_PATH),
			array('file' => 'front.txt', 'path' => PJ_CSS_PATH),
			array('file' => 'jquery-ui-1.9.2.custom.min.css', 'path' => PJ_INSTALL_PATH . PJ_LIBS_PATH . 'pjQ/css/'),
			array('file' => "$theme.css", 'path' => PJ_CSS_PATH)
		);
		$form = pjFormModel::factory()->find($_GET['fid'])->getData();
		header("Content-Type: text/css; charset=utf-8");
		foreach ($arr as $item)
		{
			ob_start();
			@readfile($item['path'] . $item['file']);
			$string = ob_get_contents();
			ob_end_clean();
			
			if ($string !== FALSE)
			{
				echo str_replace(
					array(
							'../img/', 
							'images/', 
							"pjWrapper",
							'[pjCF_container]',
							'[font_family]',
							'[font_size]',
							'[font_color]',
							'[background_color]',
							'[field_background_color]',
							'[button_background_color]',
							'[button_hover_background_color]',
							'[button_border_color]',
							'[button_hover_border_color]'
					),
					array(
							PJ_INSTALL_URL . PJ_IMG_PATH, 
							PJ_INSTALL_URL . PJ_LIBS_PATH . 'pjQ/css/images/', 
							"pjWrapperContactForm_" . $_GET['fid'],
							'#pjCF_container_' . $_GET['fid'],
							$form['font_family'],
							$form['font_size'],
							strpos($form['font_color'],'#') === false ? $form['font_color'] : str_replace("#", "", $form['font_color']),
							strpos($form['background_color'],'#') === false ? $form['background_color'] : str_replace("#", "", $form['background_color']),
							strpos($form['field_background_color'],'#') === false ? $form['field_background_color'] : str_replace("#", "", $form['field_background_color']),
							strpos($form['button_background_color'],'#') === false ? $form['button_background_color'] : str_replace("#", "", $form['button_background_color']),
							strpos($form['button_hover_background_color'],'#') === false ? $form['button_hover_background_color'] : str_replace("#", "", $form['button_hover_background_color']),
							strpos($form['button_border_color'],'#') === false ? $form['button_border_color'] : str_replace("#", "", $form['button_border_color']),
							strpos($form['button_hover_border_color'],'#') === false ? $form['button_hover_border_color'] : str_replace("#", "", $form['button_hover_border_color'])
					),
					$string) . "\n";
			}
		}
		
		exit;
	}
	public function pjActionLoadJs()
	{
		$this->setLayout('pjActionEmpty');
		$arr = pjFormModel::factory()->find($_GET['fid'])->getData();
		$field_arr = pjFormFieldModel::factory()->where('form_id', $_GET['fid'])->orderBy("order_id ASC")->findAll()->getData();
			
		$this->set('arr', $arr);
		$this->set('field_arr', $field_arr);
	}
	public function pjActionLoad()
	{
		ob_start();
		header("Content-Type: text/javascript; charset=utf-8");
		if(isset($_GET['fid']) && (int) $_GET['fid'] > 0)
		{
			$arr = pjFormModel::factory()->find($_GET['fid'])->getData();
			$field_arr = pjFormFieldModel::factory()->where('form_id', $_GET['fid'])->orderBy("order_id ASC")->findAll()->getData();
				
			$this->set('arr', $arr);
			$this->set('field_arr', $field_arr);
		}
	}
	
	public function pjActionSubmit()
	{
		$this->setAjax(true);
		if(isset($_POST['id']))
		{
			$arr = pjFormModel::factory()->find($_POST['id'])->getData();
			$field_arr = pjFormFieldModel::factory()->where('form_id', $_POST['id'])->orderBy("order_id ASC")->findAll()->getData();
			
			$has_captcha = false;
			foreach($field_arr as $v)
			{
				if($v['type'] == 'captcha')
				{
					$has_captcha = true;
				}
			}
			if($has_captcha == true)
			{
				if (!isset($_POST['captcha']))
				{
					echo '201';
					exit;
				}else{
					if(strtoupper($_POST['captcha']) != $_SESSION[$this->defaultCaptcha . $_POST['id']])
					{
						echo '201';
						exit;
					}
				}
			}
			if($this->pjCheckUrls($field_arr, $_POST, $arr['reject_links']) == false)
			{
				echo '202';
				exit;
			}
			if($this->pjCheckBannedWords($field_arr, $_POST, $arr['block_words']) == false)
			{
				echo '200';
				exit;
			}
			
			$data = array();
			$data['form_id'] = $_POST['id'];
			$data['ip'] = $_SERVER['REMOTE_ADDR'];
			$id = pjSubmissionModel::factory($data)->insert()->getInsertId();
			
			if ($id !== false && (int) $id > 0)
			{
				$message = '';
				$from = 'info@reliablecnj.com';
				$email_arr = array();
				$drp_email_arr = array();
				$new_line = $arr['email_type'] == 'html' ? "<br />\n" : "\n";
				foreach($field_arr as $v){
					$pjSubmissionDetailModel = pjSubmissionDetailModel::factory();
					$data = array();
					$data['form_id'] = $_POST['id'];
					$data['submission_id'] = $id;
					$data['field_id'] = $v['id'];
					$data['type'] = $v['type'];
					
					$field_name = 'pjCF_field_' . $v['id'];
					
					switch ($v['type']) {
						case 'fileupload':
							if(isset($_FILES[$field_name]) && !empty($_FILES[$field_name]['tmp_name'])){
								$data['value'] = $this->pjActionUpload($_FILES[$field_name], $_POST['id'], $v['id'], $id, $v['extensions']);
							}
						break;
						case 'checkbox':
							if(isset($_POST[$field_name]))
							{
								$data['value'] = implode("|", $_POST[$field_name]);
							}else{
								$data['value'] = ':NULL';
							}
						break;
						case 'radio':
							if(isset($_POST[$field_name]))
							{
								$data['value'] = $_POST[$field_name];
							}else{
								$data['value'] = ':NULL';
							}
						break;
						case 'heading':
							$data['value'] = $v['label'];
						break;
						case 'button':
							$data['value'] = ':NULL';
						break;
						case 'captcha':
						break;
						default:
							$data['value'] = $_POST[$field_name];
							if($v['type'] == 'email' && $v['send_confirmation'] == 'T' && $_POST[$field_name] != ''){
								$email_arr[] = $_POST[$field_name];
							}
							if($v['type'] == 'email' && $_POST[$field_name] != ''){
								if($from == '')
								{
									$from = $_POST[$field_name];
								}
							}
							if($v['type'] == 'dropdown' && $_POST[$field_name] != ''){
								$row_arr = explode("|@|", $_POST[$field_name]);
								if(count($row_arr) == 2){
									$drp_email_arr[] = $row_arr[1];
									$data['value'] = $row_arr[0];
								}else{
									$data['value'] = $_POST[$field_name];
								}
							}
						break;
					}
					if($v['type'] != 'captcha' && $v['type'] != 'button')
					{
						if($v['type'] != 'heading'){
							if(isset($data['value']) && $data['value'] != ':NULL')
							{
								$message .= $v['label'] . ': ' . str_replace("|", $new_line, $data['value']) . $new_line;
							}else{
								$message .= $v['label'] . ': ' . $new_line;
							}
						}else{
							$message .= $v['label'] . $new_line;
						}
					}
					$pjSubmissionDetailModel->reset()->setAttributes($data)->insert();
				}
				
				$pjEmail = new pjEmail();
				
				if ($this->option_arr['o_send_email'] == 'smtp')
				{
					$pjEmail
						->setTransport('smtp')
						->setSmtpHost($this->option_arr['o_smtp_host'])
						->setSmtpPort($this->option_arr['o_smtp_port'])
						->setSmtpUser($this->option_arr['o_smtp_user'])
						->setSmtpPass($this->option_arr['o_smtp_pass']);
				}
				
				$file_arr = pjFileModel::factory()->where('form_id', $_POST['id'])->where('submission_id', $id)->findAll()->getData();
				if(!empty($file_arr))
				{
					foreach($file_arr as $f)
					{
						$pjEmail->attach($f['file_path'], $f['file_name'], $f['mime_type']);
					}
				}
				
				if($from == '')
				{
					$from = $this->getFromEmail();
				}

				$user_arr = pjUserFormModel::factory()->select('t1.user_id, t2.email')->join('pjUser', 't1.user_id=t2.id', 'left')->where('t1.form_id', $_POST['id'])->findAll()->getData();

				if($message != ''){
					if($arr['email_type'] == 'html'){
						$pjEmail->setContentType('text/html');
					}else{
						$pjEmail->setContentType('text/plain');
					}
					
					if(!empty($user_arr)){
						foreach($user_arr as $v){
							$pjEmail
								->setFrom($from)
								->setTo($v['email'])
								->setSubject($arr['subject'])
								->send($message);
						}
					}
					if(!empty($drp_email_arr)){
						foreach($drp_email_arr as $v){
							$pjEmail
								->setFrom($this->getFromEmail())
								->setTo($v)
								->setSubject($arr['subject'])
								->send($message);
						}
					}
				}
				if(!empty($email_arr) && $arr['auto_subject'] != '' && $arr['auto_message'] != ''){
					$pjEmail = new pjEmail();
					$pjEmail->setContentType('text/html');
					foreach($email_arr as $email){
						$pjEmail->setFrom($this->getFromEmail())
								->setTo($email)
								->setSubject($arr['auto_subject'])
								->send($arr['auto_message']);
					}
				}
				
				$_SESSION[$this->defaultCaptcha] = NULL;
				unset($_SESSION[$this->defaultCaptcha]);
			}
			echo '100';
		}
		exit;
	}
	
	public function pjActionDownloadFile()
	{
		$id = pjObject::escapeString($_GET['id']);
		$arr = pjFileModel::factory()->find($id)->getData();
		if(!empty($arr))
		{
			if($arr['hash'] == $_GET['hash'])
			{
				pjToolkit::download(@file_get_contents(PJ_INSTALL_PATH . $arr['file_path']), $arr['file_name'], $arr['mime_type']);
			}else{
				__('front_file_not_found');
			}
		}else{
			__('front_file_not_found');
		}
		exit;
	}
	
	private function pjActionUpload($file_arr, $form_id, $field_id, $submission_id, $ext)
	{
		$files = array();
		$field_name_arr = array();
		if(is_array($file_arr['name']))
		{
			foreach ($file_arr as $k => $l) 
			{
				foreach ($l as $i => $v) 
				{
			 		if (!array_key_exists($i, $files))
			 		{
			   			$files[$i] = array();
			 		}
			   		$files[$i][$k] = $v;
			 	}
			}
		}else{
			$files[0] = $file_arr;
		}
		$pjFileModel = pjFileModel::factory();
		foreach ($files as $file) {
			$data = array();
			$data['form_id'] = $form_id;
			$data['field_id'] = $field_id;
			$data['submission_id'] = $submission_id;
			$handle = new pjUpload();
			if(!empty($ext))
			{
				$handle->setAllowedExt(explode("|", $ext));
			}
			if ($handle->load($file)) {
				$hash = md5(uniqid(rand(), true));
				$file_ext = $handle->getExtension();
				$file_path = PJ_UPLOAD_PATH . 'files/' . $form_id . "_" . $field_id . '_' . $hash . '.' . $file_ext;
				if($handle->save($file_path))
				{
					$data['file_path'] = $file_path;
					$data['file_name'] = $file['name'];
					$data['mime_type'] = $file['type'];
					$data['hash'] = $hash;
		
					$pjFileModel->reset()->setAttributes($data)->insert();
						
					$field_name_arr[] = $file['name'];
				}
			}
		}
		return implode("|", $field_name_arr);
	}
	
	private function pjCheckBannedWords($field_arr, $post, $banned_words)
	{
		$result = true;
		if($banned_words != ''){
			$banned_arr = explode("\r\n", $banned_words);
			foreach($banned_arr as $k => $v){
				$banned_arr[$k] = trim($v);
			}
			foreach($field_arr as $v){
				if($v['type'] == 'textbox' || $v['type'] == 'textarea'){
					$field_name = 'pjCF_field_' . $v['id'];
					$string = $post[$field_name];
					$matches = array();
					$matchFound = preg_match_all("/\b(" . implode($banned_arr,"|") . ")\b/i", $string, $matches);
					if ($matchFound) {
						$result = false;
					}
				}
			}
		}
		return $result;
	}
	private function pjCheckUrls($field_arr, $post, $reject)
	{
		$result = true;
		if($reject == 'T'){
			$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			foreach($field_arr as $v){
				if(($v['type'] == 'textbox' && $v['validation'] != 'url') || $v['type'] == 'textarea'){
					$field_name = 'pjCF_field_' . $v['id'];
					$string = $post[$field_name];
					if(preg_match($reg_exUrl, $string, $url)) {
						$result = false;
					}
				}
			}
		}
		return $result;
	}
}
?>