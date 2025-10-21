<?php
/**
 *
 * @package Privacy Policy Extension
 * @copyright (c) 2022 devspace
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace devspace\privacypolicy\migrations\v_3_3_0;

use phpbb\db\migration\migration;

class m1_initial_schema extends migration
{
	/**
	 * Assign migration file dependencies for this migration
	 *
	 * @return array Array of migration files
	 * @static
	 * @access public
	 */
	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v320\v320'];
	}

	/**
	 * Add the table schemas to the database:
	 *
	 * @return array Array of table schema
	 * @access public
	 */
	public function update_schema()
	{
		return [
			'add_tables' => [
				$this->table_prefix . 'privacy_lang' => [
					'COLUMNS' => [
						'privacy_id' 					=> ['UINT', null, 'auto_increment'],
						'privacy_lang_name' 			=> ['VCHAR:40', ''],
						'privacy_lang_description'		=> ['VCHAR:40', ''],
						'privacy_lang_id' 				=> ['VCHAR:30', ''],
						'privacy_lang_text' 			=> ['MTEXT', ''],
						'privacy_text_bbcode_uid' 		=> ['VCHAR:8', ''],
						'privacy_text_bbcode_bitfield' 	=> ['VCHAR:255', ''],
						'privacy_text_bbcode_options' 	=> ['UINT:11', 7],
					],
					'PRIMARY_KEY' => 'privacy_id',
				],
			],

			'add_columns' => [
				$this->table_prefix . 'users' => [
					'user_accept_date' => ['UINT:11', 0],
				],

				$this->table_prefix . 'profile_fields' => [
					'field_privacy_show' => ['BOOL', 1],
				],
			],
		];
	}

	/**
	 * Drop the schemas from the database
	 *
	 * @return array Array of table schema
	 * @access public
	 */
	public function revert_schema()
	{
		return [
			'drop_tables' => [
				$this->table_prefix . 'privacy_lang',
			],

			'drop_columns' => [
				$this->table_prefix . 'users' => [
					'user_accept_date',
				],

				$this->table_prefix . 'profile_fields' => [
					'field_privacy_show',
				],
			],
		];
	}
}
