<?php
/**
 *
 * @package Privacy Policy Extension
 * @copyright (c) 2022 devspace
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace devspace\privacypolicy\ucp;

class privacydata_module
{
	public $u_action;

	public function main($id, $mode)
	{
		global $phpbb_container;

		$this->tpl_name   = 'ucp_privacy_data';
		$this->page_title = $phpbb_container->get('language')->lang('PRIVACY_POLICY');

		// Get an instance of the admin controller
		$ucp_controller = $phpbb_container->get('devspace.privacypolicy.ucp.controller');

		$ucp_controller->privacy_output();
	}
}
