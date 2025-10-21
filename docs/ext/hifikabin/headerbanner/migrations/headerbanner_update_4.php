<?php
/**
*
* @package phpBB Extension - Header Banner
* @copyright (c) 2015 HiFiKabin
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace hifikabin\headerbanner\migrations;

class headerbanner_update_4 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\hifikabin\headerbanner\migrations\headerbanner_update_3');
	}

	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('headerbanner_logo', '0')),
			);
	}
}
