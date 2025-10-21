<?php
/**
 *
 * @package Log Connections
 * @copyright (c) 2022 devspace
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace devspace\logconnections\acp;

class logconnections_module
{
	public $u_action;

	public function main($id, $mode)
	{
		global $phpbb_container;

		$this->tpl_name   = 'log_connections';
		$this->page_title = $phpbb_container->get('language')->lang('LOG_CONNECTIONS');

		// Get an instance of the admin controller
		$admin_controller = $phpbb_container->get('devspace.logconnections.admin.controller');

		$admin_controller->display_options();
	}
}
