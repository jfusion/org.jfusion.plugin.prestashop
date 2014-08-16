<?php namespace JFusion\Plugins\prestashop;
/**
 * @category   Plugins
 * @package    JFusion\Plugins
 * @subpackage prestashop
 * @author     JFusion Team <webmaster@jfusion.org>
 * @copyright  2008 JFusion. All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link       http://www.jfusion.org
 */

use JFusion\Factory;
use JFusion\Plugin\Plugin;

/**
 * JFusion Helper Class for prestashop
 * For detailed descriptions on these functions please check Plugin
 *
 * @category   Plugins
 * @package    JFusion\Plugins
 * @subpackage prestashop
 * @author     JFusion Team <webmaster@jfusion.org>
 * @copyright  2008 JFusion. All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link       http://www.jfusion.org
 */
class Helper extends Plugin
{
	/**
	 * Load Framework
	 */
	function loadFramework()
	{
		$params = Factory::getParams($this->getJname());
		$source_path = $params->get('source_path');

		require_once($source_path . 'config/settings.inc.php');
		require_once($source_path . 'config/alias.php');

		$this->loadClass('Context');

//      $this->loadClass('Blowfish'); Think this is now unneeded.
//      $this->loadClass('Rijndael'); Think this is now unneeded.
//      $this->loadClass('Cookie'); Think this is now unneeded.
		$this->loadClass('Tools');
		require_once($source_path . 'tools/profiling/Tools.php');

		$this->loadClass('ObjectModel');
		require_once($source_path . 'tools/profiling/ObjectModel.php');

		require_once($source_path . 'classes/db/Db.php');
		require_once($source_path . 'tools/profiling/Db.php');

		require_once($source_path . 'classes/db/DbPDO.php');

		require_once(__DIR__ . '/classes/db/DbPDO.php');

//		require_once($source_path . '/classes/shop/Shop.php'); Think this is now unneeded.
//		require_once(__DIR__ . '/classes/shop/Shop.php'); Think this is now unneeded.

		$this->loadClass('Language');
		$this->loadClass('Validate');
//      $this->loadClass('Country'); Think this is now unneeded.
//      $this->loadClass('State'); Think this is now unneeded.
//      $this->loadClass('Customer'); Think this is now unneeded.

		$this->loadClass('Configuration');
	}

	/**
	 * @param $class
	 */
	function loadClass($class) {
		$params = Factory::getParams($this->getJname());
		$source_path = $params->get('source_path');

		require_once($source_path . 'classes/' . $class . '.php');
		if (file_exists(__DIR__ . '/classes/' . $class . '.php')) {
			require_once(__DIR__ . '/classes/' . $class . '.php');
		}
	}

	/**
	 * @return mixed
	 */
	function getDefaultLanguage() {
		static $default_language;
		if (!isset($default_language)) {
			$db = Factory::getDatabase($this->getJname());

			$query = $db->getQuery(true)
				->select('value')
				->from('#__configuration')
				->where('name IN (' . $db->quote('PS_LANG_DEFAULT') . ')');

			$db->setQuery($query);
			//getting the default language to load groups
			$default_language = $db->loadResult();
		}
		return $default_language;
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	function getGroupName($id) {
		static $groupname;
		if (!isset($groupname[$id])) {
			$db = Factory::getDatabase($this->getJname());
			$query = $db->getQuery(true)
				->select('name')
				->from('#__group_lang')
				->where('id_lang =' . $db->quote($this->getDefaultLanguage()))
				->where('id_group =' . $db->quote($id));

			$db->setQuery($query);

			$groupname[$id] = $db->loadResult();
		}
		return $groupname[$id];
	}
}