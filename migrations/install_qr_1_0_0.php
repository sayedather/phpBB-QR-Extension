<?php
/**
*
* QR Code extension for the phpBB Forum Software package.
*
* @copyright (c) 2016 Ather
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace ather\qr\migrations;

class install_qr_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['qr_version']) && version_compare($this->config['qr_version'], '1.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('qr_status', 1)),
			array('config.add', array('qr_type', 1)),
	
			array('config.add', array('qr_version', '1.0.0')),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'QR_ACP'
			)),
			array('module.add', array(
				'acp',
				'QR_ACP',
				array(
					'module_basename'	=> '\ather\qr\acp\qr_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}