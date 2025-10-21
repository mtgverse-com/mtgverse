<?php
/**
 *
 * @package Log Connections
 * @copyright (c) 2022 devspace
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace devspace\logconnections\acp;

class logconnections_info
{
	public function module()
	{
		return [
			'filename'	=> '\devspace\logconnections\acp\logconnections_module',
			'title' 	=> 'LOG_CONNECTIONS',
			'modes' 	=> [
				'manage' => ['title' => 'MANAGE_DEFAULTS', 'auth' => 'ext_devspace/logconnections && acl_a_user', 'cat' => ['LOG_CONNECTIONS']],
			],
		];
	}
}
