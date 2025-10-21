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

class m5_acp_modules extends migration
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
		return ['\devspace\privacypolicy\migrations\v_3_3_0\m4_acp_cat_modules'];
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
			// Add the ACP modules
			['module.add', ['acp', 'ACP_CAT_DOT_MODS', 'PRIVACY_POLICY']],

			['module.add', [
				'acp', 'PRIVACY_POLICY', [
					'module_basename' => '\devspace\privacypolicy\acp\privacypolicy_module',
					'modes' => ['manage', 'edit'],
				],
			]],

			// Add the ACP User modules
			['module.add', [
				'acp', 'ACP_USER_UTILS', [
					'module_basename' => '\devspace\privacypolicy\acp\acp_privacydata_module',
					'modes' => ['data', 'list'],
				],
			]],
		];

	}
}
