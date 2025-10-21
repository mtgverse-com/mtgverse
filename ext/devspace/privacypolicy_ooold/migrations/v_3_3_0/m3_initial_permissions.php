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

class m3_initial_permissions extends migration
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

	/**
	 * Add or update data in the database
	 *
	 * @return array Array of table data
	 * @access public
	 */
	public function update_data()
	{
		return [
			// Add the permissions
			['permission.add', ['a_privacy_manage', true]],
			['permission.add', ['a_privacy_view', true]],
			['permission.add', ['u_privacy_view', true]],

			// Set permissions
			['permission.permission_set', ['ROLE_ADMIN_FULL', 'a_privacy_manage', 'role', true]],
			['permission.permission_set', ['ROLE_ADMIN_FULL', 'a_privacy_view', 'role', true]],
			['permission.permission_set', ['ROLE_ADMIN_STANDARD', 'a_privacy_view', 'role', true]],
			['permission.permission_set', ['ROLE_USER_FULL', 'u_privacy_view', 'role', true]],
			['permission.permission_set', ['ROLE_USER_STANDARD', 'u_privacy_view', 'role', true]],
			['permission.permission_set', ['REGISTERED', 'u_privacy_view', 'group', true]],
			['permission.permission_set', ['BOTS', 'u_privacy_view', 'group', false]],
		];
	}
}
