<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Morevirtuemart
 * @author     Peter Hankiewicz <peterh@endpoint.com>
 * @copyright  2016 Peter Hankiewicz
 * @license    GNU General Public License v2 lub późniejsza; zobacz LICENSE.txt
 */

defined('_JEXEC') or die;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting( E_ALL | E_STRICT );

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Morevirtuemart', JPATH_COMPONENT);
JLoader::register('MorevirtuemartController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = JControllerLegacy::getInstance('Morevirtuemart');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
