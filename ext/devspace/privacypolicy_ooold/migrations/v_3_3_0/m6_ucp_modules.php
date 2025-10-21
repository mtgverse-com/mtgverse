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

class m6_ucp_modules extends migration
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
		return ['\devspace\privacypolicy\migrations\v_3_3_0\m1_initial_schema'];
	}

	public function effectively_installed()
	{
		$sql = 'SELECT module_id
            FROM ' . $this->table_prefix . "modules
            WHERE module_class = 'ucp'
                AND module_langname = 'UCP_PRIVACY'";
		$result    = $this->db->sql_query($sql);
		$module_id = $this->db->sql_fetchfield('module_id');
		$this->db->sql_freeresult($result);

		return $module_id !== false;
	}

	/**
	 * Add or update data in the database
	 *
	 * @return array Array of table data
	 * @access public
	 */
	public function update_data()
	{
		return [
			['module.add', ['ucp', 0, 'UCP_PRIVACY']],

			['module.add', [
				'ucp', 'UCP_PRIVACY', [
					'module_basename' => '\devspace\privacypolicy\ucp\privacydata_module',
					'modes' => ['main'],
				],
			]],
		];
	}
}
