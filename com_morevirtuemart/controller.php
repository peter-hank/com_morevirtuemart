<?php

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

// loading Virtuemart classes and configuration
defined('VMPATH_ROOT') or define('VMPATH_ROOT', JPATH_ROOT);
defined('VMPATH_ADMIN') or define('VMPATH_ADMIN', VMPATH_ROOT.DS.'administrator' . DS . 'components' . DS . 'com_virtuemart');
if (!class_exists( 'VmConfig' )) require(JPATH_ROOT.DS.'administrator' . DS . 'components' . DS . 'com_virtuemart' . DS . 'helpers' . DS . 'config.php');
VmConfig::loadConfig();
if (!class_exists( 'VmController' )) require(VMPATH_ADMIN.DS.'helpers' . DS . 'vmcontroller.php');
if (!class_exists( 'VmModel' )) require(VMPATH_ADMIN.DS.'helpers' . DS . 'vmmodel.php');
require(JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_virtuemart' . DS . 'models' . DS . 'category.php');
require(JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_virtuemart' . DS . 'models' . DS . 'product.php');
require(JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_virtuemart' . DS . 'models' . DS . 'media.php');

// loading an exteneded category model
require(__DIR__ . DS . 'models' . DS . 'category.php');

/**
 * Class MorevirtuemartController
 *
 * @since  1.6
 */
class MorevirtuemartController extends JControllerLegacy
{
	public function __construct() 
	{
		parent::__construct();

		$this->categoryModel = new VirtueMartModelCategoryLocal();
	}

	public function createCategory ()
	{
		$catData = [
      'category_name' => 'Brand new Virtuemart category',
      'category_parent_id' => 0,
      'published' => 0
    ];

    $catId = $this->categoryModel->store($catData);

    var_dump($catId);

    echo 'Created a new category';

    die();
	}
}
