<?php
/**
*
* QR Code extension for the phpBB Forum Software package.
*
* @copyright (c) 2016 Ather
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace ather\qr\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.common'							=> 'common_setup',
			'core.user_setup'						=> 'load_language_on_setup',
			'core.viewtopic_modify_post_row'		=> 'viewtopic_postrow_qr',
		);
	}

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var string */
	protected $root_path;

	/** @var string */
	protected $php_ext;

	/**
	* Constructor
	* 
	* @param \phpbb\controller\helper	$helper		Controller helper object
	* @param \phpbb\template			$template	Template object
	*/
	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\config\config $config, $php_ext)
	{
		$this->helper = $helper;
		$this->template = $template;
		$this->config = $config;
		$this->php_ext = $php_ext;
	}

	public function common_setup($event)
	{
		$this->template->assign_vars(array(
			'QR_STATUS'		=> $this->config['qr_status'] ? true : false,
			'QR_TYPE'		=> $this->config['qr_type'] ? true : false,
		));
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'ather/qr',
			'lang_set' => 'qr',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function viewtopic_postrow_qr($event)
	{
		if (!$this->config['qr_status'])
		{
			return;
		}
		
		// Get Our data
		$row = $event['row'];
		$postrow = $event['post_row'];		
		$forum_id = (int) $row['forum_id'];
		
		// Generate our URLs
		$topic_url = generate_board_url() . "/viewtopic.$this->php_ext?" . 'f=' . $forum_id . '&t=' . $event['row']['topic_id'];
		$post_url = generate_board_url() . "/viewtopic.$this->php_ext?" . 'p=' . $event['row']['post_id'] . '#p' . $event['row']['post_id'];
		$share_url = !$this->config['qr_type'] ? $post_url : $topic_url;
		

		$postrow = array_merge($postrow, array(
			// Using Google Chart API
			'QR_IMG' =>     "<img src=\"http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl={$share_url}\" alt=\"QR code\" width=\"90\" height=\"90\" />\n",

		));
		$event['post_row'] = $postrow;
	}
}
