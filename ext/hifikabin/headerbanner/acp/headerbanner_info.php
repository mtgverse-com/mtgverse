<?php
/**
*
* @package phpBB Extension - Header Banner
* @copyright (c) 2015 HiFiKabin
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace hifikabin\headerbanner\acp;

class headerbanner_info
{
	function module()
	{
		return array(
			'filename'			=> '\hifikabin\headerbanner\acp\headerbanner_module',
			'title'				=> 'ACP_HEADERBANNER',
			'modes'				=> array(
				'settings'		=> array(
					'title'		=> 'ACP_HEADERBANNER_SETTINGS',
					'auth'		=> 'ext_hifikabin/headerbanner && acl_a_board',
					'cat'		=> array('ACP_HEADERBANNER')
				),
			),
		);
	}
}
