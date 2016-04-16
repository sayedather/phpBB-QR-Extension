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

class qr_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
		
		$this->config = $config;
		$this->request = $request;

		$user->add_lang('acp/common');
		$user->add_lang_ext('ather/qr', 'acp/info_acp_qr');
		$this->tpl_name = 'acp_qr';
		$this->page_title = $user->lang['QR_TITLE'];
		add_form_key('acp_qr');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('acp_qr'))
			{
				trigger_error('FORM_INVALID');
			}

			$config->set('qr_status', $request->variable('qr_status', 0));
			$config->set('qr_type', $request->variable('qr_type', 0));
			
			trigger_error($user->lang['QR_SAVED'] . adm_back_link($this->u_action));
		}
		
		$template->assign_vars(array(
			'QR_STATUS'		=> (!empty($this->config['qr_status'])) ? true : false,
			'QR_TYPE'		=> (!empty($this->config['qr_type'])) ? true : false,
			'U_ACTION'		=> $this->u_action,
		));
	}
}
