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

class m7_initial_config extends migration
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
			['config.add', ['cookie_block_links', 0]],
			['config.add', ['cookie_box_bdr_colour', '#FFFF8A']],
			['config.add', ['cookie_box_bdr_width', 1]],
			['config.add', ['cookie_box_bg_colour', '#00608F']],
			['config.add', ['cookie_box_href_colour', '#FFFFFF']],
			['config.add', ['cookie_box_txt_colour', '#DBDB00']],
			['config.add', ['cookie_box_top', 100]],
			['config.add', ['cookie_custom_page', 0]],
			['config.add', ['cookie_custom_page_corners', 1]],
			['config.add', ['cookie_custom_page_radius', 7]],
			['config.add', ['cookie_expire', 0]],
			['config.add', ['cookie_last_ip', '']],
			['config.add', ['cookie_on_index', 1]],
			['config.add', ['cookie_page_bg_colour', '#FFFFFF']],
			['config.add', ['cookie_page_txt_colour', '#000000']],
			['config.add', ['cookie_policy_enable', 0]],
			['config.add', ['cookie_require_access', 0]],
			['config.add', ['cookie_quota_exceeded', 0]],
			['config.add', ['cookie_show_policy', 0]],
			['config.add', ['privacy_policy_anonymise', 0]],
			['config.add', ['privacy_policy_anonymise_ip', '127.0.0.100']],
			['config.add', ['privacy_policy_enable', 0]],
			['config.add', ['privacy_policy_force', 0]],
			['config.add', ['privacy_policy_hide_core', 0]],
			['config.add', ['privacy_policy_list_lines', 25]],
			['config.add', ['privacy_policy_remove', 0]],
			['config.add', ['privacy_policy_reset', 0]],
		];
	}
}
