<?php
/**
*
* @package phpBB Extension - Header Banner
* @copyright (c) 2015 HiFiKabin
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace hifikabin\headerbanner\migrations;

class headerbanner_update_1 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\hifikabin\headerbanner\migrations\headerbanner_data');
	}

	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('headerbanner_search', '6')),
			array('config.add', array('headerbanner_corner', '0')),
			array('config.add', array('headerbanner_size', '1500')),
		);
	}
}
