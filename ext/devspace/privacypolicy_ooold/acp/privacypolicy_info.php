<?php
/**
 *
 * @package Privacy Policy Extension
 * @copyright (c) 2022 devspace
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace devspace\privacypolicy\acp;

class privacypolicy_info
{
	public function module()
	{
		return [
			'filename'	=> '\devspace\privacypolicy\acp\privacypolicy_module',
			'title' 	=> 'PRIVACY_POLICY',
			'modes' 	=> [
				'manage'	=> ['title' => 'PRIVACY_POLICY_MANAGE', 'auth' => 'ext_devspace/privacypolicy && acl_a_privacy_manage', 'cat' => ['PRIVACY_POLICY']],
				'edit' 		=> ['title' => 'PRIVACY_POLICY_EDIT', 'auth' => 'ext_devspace/privacypolicy && acl_a_privacy_manage', 'cat' => ['PRIVACY_POLICY']],
			],
		];
	}
}
