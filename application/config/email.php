<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$config['protocol']		= 'smtp'; 
$config['smtp_host']	= 'mail.kcfurnindo.com'; 
$config['smtp_port']	= '25'; 
$config['smtp_timeout'] = '300';
$config['smtp_user']	= 'no-reply@kcfurnindo.com'; 
$config['smtp_pass']	= 'jambolj4ck'; 
$config['charset']		= 'utf-8'; 
$config['newline']		= '\r\n'; 
$config['mailtype'] 	= 'html';

/* File ini hanya untuk Lokal, tidak perlu di Upload ke Hosting */
/* Location: ./system/application/config/email.php */