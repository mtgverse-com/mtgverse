<?php
/**
 *
 * @package Privacy Policy Extension
 * @copyright (c) 2022 devspace
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace devspace\privacypolicy\ucp;

class privacydata_info
{
	public function module()
	{
		return [
			'filename' => '\devspace\privacypolicy\ucp\privacydata_module',
			'title' => 'UCP_PRIVACY',
			'modes' => [
				'main' => ['title' => 'PRIVACY_DETAILS', 'auth' => 'ext_devspace/privacypolicy && acl_u_privacy_view', 'cat' => ['UCP_PRIVACY']],
			],
		];
	}
}
