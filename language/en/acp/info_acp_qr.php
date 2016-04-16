<?php
/**
*
* QR Code extension for the phpBB Forum Software package.
*
* @copyright (c) 2016 Ather
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	// ACP
	'QR_ACP'		=> 'QR Code Extension',
	'QR_EXPLAIN'	=> 'Allows You to view QRCodes in viewtopic.php',
    'QR_TITLE'		=> 'QR Code Extension Settings',	
	'QR_CONFIG'		=> 'Settings',
	'QR_SELECT'		=> 'Share On',
	'QR_SAVED'		=> 'Changes Saved.',
	'QR_STATUS'		=> 'Enable QR Extension',
	

	// Share Type
	'QR_TYPE'			=> 'QR Code Type',
	'QR_TYPE_EXPLAIN'	=> 'You can choose to show the <strong>topic</strong> link or every single <strong>post</strong> from the topic.',
));
