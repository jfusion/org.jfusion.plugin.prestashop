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
 
use JFusion\User\Userinfo;

use ToolsCore;

/**
 * JFusion Auth Class for prestashop
 * For detailed descriptions on these functions please check \JFusion\Plugin\Auth
 *
 * @category   Plugins
 * @package    JFusion\Plugins
 * @subpackage prestashop
 * @author     JFusion Team <webmaster@jfusion.org>
 * @copyright  2008 JFusion. All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link       http://www.jfusion.org
 */
class Auth extends \JFusion\Plugin\Auth
{
	/**
	 * @var $helper Helper
	 */
	var $helper;

    /**
     * @param Userinfo $userinfo
     *
     * @return string
     */
    function generateEncryptedPassword(Userinfo $userinfo) {
	    $this->helper->loadFramework();
	    return ToolsCore::encrypt($userinfo->password_clear);
    }
}