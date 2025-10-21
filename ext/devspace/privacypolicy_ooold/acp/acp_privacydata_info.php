<?php
/**
 *
 * @package Privacy Policy Extension
 * @copyright (c) 2022 devspace
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace devspace\privacypolicy\acp;

class acp_privacydata_info
{
	public function module()
	{
		return [
			'filename'	=> '\devspace\privacypolicy\acp\acp_privacydata_module',
			'title' 	=> 'PRIVACY_POLICY',
			'modes' 	=> [
				'data' => ['title' => 'PRIVACY_DATA', 'auth' => 'ext_devspace/privacypolicy && acl_a_privacy_view', 'cat' => ['PRIVACY_DATA']],
				'list' => ['title' => 'PRIVACY_LIST', 'auth' => 'ext_devspace/privacypolicy && acl_a_privacy_view', 'cat' => ['PRIVACY_LIST']],
			],
		];
	}
}
