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

/**
 * JFusion Front Class for prestashop
 * For detailed descriptions on these functions please check \JFusion\Plugin\Front
 *
 * @category   Plugins
 * @package    JFusion\Plugins
 * @subpackage prestashop
 * @author     JFusion Team <webmaster@jfusion.org>
 * @copyright  2008 JFusion. All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link       http://www.jfusion.org
 */
class Front extends \JFusion\Plugin\Front
{
	/**
	 * @var $helper Helper
	 */
	var $helper;

    /**
     * @return string
     */
    function getRegistrationURL() {
        return 'authentication.php';
    }

    /**
     * @return string
     */
    function getLostPasswordURL() {
        return 'password.php';
    }

    /**
     * @return string
     */
    function getLostUsernameURL() {
        return '';
    }
}