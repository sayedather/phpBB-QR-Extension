<?php
/**
*
* QR Code extension for the phpBB Forum Software package.
*
* @copyright (c) 2016 Ather
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace ather\qr\acp;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package module_install
*/
class qr_info
{
	function module()
	{
		return array(
			'filename'	=> '\ather\qr\acp\qr_module',
			'title'		=> 'QR_ACP',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'	=> array('title' => 'QR_CONFIG', 'auth'	=> 'ext_ather/qr', 'cat'	=> array('QR_CODE')),
			),
		);
	}
}
