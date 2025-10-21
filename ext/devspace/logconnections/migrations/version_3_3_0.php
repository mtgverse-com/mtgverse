<?php
/**
 *
 * @package Log Connections
 * @copyright (c) 2022 devspace
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace devspace\logconnections\migrations;

use phpbb\db\migration\migration;

class version_3_3_0 extends migration
{
	/**
	 * {@inheritdoc
	 */
	public function effectively_installed(): bool
	{
		$sql = 'SELECT module_id
				FROM ' . $this->table_prefix . "modules
				WHERE module_class = 'acp'
					AND module_langname = 'LOG_CONNECTIONS'";
		$result 	= $this->db->sql_query($sql);
		$module_id	= (bool) $this->db->sql_fetchfield('module_id');
		$this->db->sql_freeresult($result);

		return $module_id !== false;
	}

	/**
	 * {@inheritdoc
	 */
	public function update_data()
	{
		return [
			['config.add', ['log_browser', false]],
			['config.add', ['log_connect_failed', true]],
			['config.add', ['log_connect_logout', false]],
			['config.add', ['log_connect_new_user', true]],
			['config.add', ['log_connect_user', true]],

			// Add the ACP module
			['module.add', ['acp', 'ACP_CAT_DOT_MODS', 'LOG_CONNECTIONS']],

			['module.add', [
				'acp', 'LOG_CONNECTIONS', [
					'module_basename' => '\devspace\logconnections\acp\logconnections_module',
					'modes' => ['manage'],
				],
			]],
		];
	}
}
