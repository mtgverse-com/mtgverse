<?php
/**
*
* @package phpBB Extension - Header Banner
* @copyright (c) 2015 HiFiKabin
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace hifikabin\headerbanner\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template)
	{
		$this->config = $config;
		$this->template = $template;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header'			=> 'add_page_header_link',
			'core.page_header_after'	=> 'header_banner',
		);
	}

	public function add_page_header_link($event)
	{
		$this->template->assign_vars(array(
			'HEADERBANNER'						=> $this->config['headerbanner'],
			'HEADERBANNER_DESTINATION'			=> $this->config['headerbanner_destination'],
			'HEADERBANNER_DESTINATION_NAME'		=> $this->config['headerbanner_destination_name'],
			'HEADERBANNER_URL'					=> $this->config['headerbanner_url'],
			'HEADERBANNER_OPEN'					=> $this->config['headerbanner_open'],
			'HEADERBANNER_RESPONSIVE'			=> $this->config['headerbanner_responsive'],
			'HEADERBANNER_LOGO'					=> $this->config['headerbanner_logo'],
			'HEADERBANNER_RESPONSIVE_SIZE'		=> $this->config['headerbanner_responsive_size'],
			'HEADERBANNER_SELECT'				=> $this->config['headerbanner_select'],
			'HEADERBANNER_MOBILE'				=> $this->config['headerbanner_mobile'],
			'HEADERBANNER_BACKGROUND'			=> $this->config['headerbanner_background'],
			'HEADERBANNER_CORNER'				=> $this->config['headerbanner_corner'],
			'HEADERBANNER_SIZE'					=> $this->config['headerbanner_size'],
			'HEADERBANNER_SEARCH'				=> $this->config['headerbanner_search'],
		));
	}

	public function header_banner($event)
	{
		$this->template->assign_vars(array(
			'S_IN_SEARCH' => ($this->config['headerbanner_select']) ? true : false,	
		));
	}
}
