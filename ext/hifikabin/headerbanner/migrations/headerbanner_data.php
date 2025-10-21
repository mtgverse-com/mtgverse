<?php
/**
*
* @package phpBB Extension - Header Banner
* @copyright (c) 2015 HiFiKabin
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace hifikabin\headerbanner\migrations;

class headerbanner_data extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('headerbanner_select', '')),
			array('config.add', array('headerbanner', '')),


			// Add ACP modules
			array('module.add', array('acp', 'ACP_BOARD_CONFIGURATION', array(
				'module_basename'	=> '\hifikabin\headerbanner\acp\headerbanner_module',
				'module_langname'	=> 'ACP_HEADERBANNER',
				'module_mode'		=> 'settings',
				'module_auth'		=> 'ext_hifikabin/headerbanner && acl_a_board',
			))),
		);
	}
}
