<?php

/**
 *
 * @package Privacy Policy Extension
 * @copyright (c) 2022 devspace
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace devspace\privacypolicy;

use phpbb\extension\base;

class ext extends base
{
	/** @var Extension name */
	protected $ext_name = 'privacypolicy';

	/** @var max phpBB version */
	protected $max_version = '4.0.0@dev';

	/** @var min phpBB version */
	protected $min_version = '3.3.0';

	/** @var PHP version */
	protected $php_version = '7.1.3';

	/** @var phpBB check version */
	protected $phpbb_version = '3.3.0';

	/**
	 * Enable extension if requirements are met
	 *
	 * @return bool True if can be enabled, False if not, or an error message in phpBB 3.3.
	 * @access public
	 */
	public function is_enableable()
	{
		// Check for PHP version
		if (phpbb_version_compare(PHP_VERSION, $this->php_version, '<'))
		{
			if (phpbb_version_compare(PHPBB_VERSION, $this->phpbb_version, '>='))
			{
				$language = $this->container->get('language');
				$language->add_lang('ext_enable_error', 'devspace/' . $this->ext_name);

				return $language->lang('EXT_PHP_ERROR', $this->php_version, PHP_VERSION);
			}
			else
			{
				return false;
			}
		}

		// Check for phpBB version
		if (!(phpbb_version_compare(PHPBB_VERSION, $this->min_version, '>=') && phpbb_version_compare(PHPBB_VERSION, $this->max_version, '<')))
		{
			if (phpbb_version_compare(PHPBB_VERSION, $this->phpbb_version, '>='))
			{
				$config   = $this->container->get('config');
				$language = $this->container->get('language');
				$language->add_lang('ext_enable_error', 'devspace/' . $this->ext_name);

				return $language->lang('EXT_ENABLE_ERROR', $this->min_version, $this->max_version, $config['version']);
			}
			else
			{
				return false;
			}
		}

		// Check that Auto Groups is installed
		$ext_manager = $this->container->get('ext.manager');
		if (!$ext_manager->is_enabled('phpbb/autogroups'))
		{
			$language = $this->container->get('language');
			$language->add_lang('ext_enable_error', 'devspace/' . $this->ext_name);

			return $language->lang('EXT_AUTOGROUPS_ERROR');
		}

		return true;
	}

	/**
	 * This method is required for Auto Groups
	 */
	public function purge_step($old_state)
	{
		switch ($old_state)
		{
			case '':
				try
					{
					// Try to remove this extension from auto groups db tables
					$autogroups = $this->container->get('phpbb.autogroups.manager');
					$autogroups->purge_autogroups_type('devspace.privacypolicy.autogroups.type.ppaccept');
				}
				catch (\InvalidArgumentException $e)
				{
					// Continue
				}

				return 'autogroups';
				break;

			default:
				return parent::purge_step($old_state);
				break;
		}
	}
}
