<?php

// No direct access
defined('_JEXEC') or die;

class VirtueMartModelCategoryLocal extends VirtueMartModelCategory {
  public function __construct() 
  {
    parent::__construct();
  }

  public function store(&$data) 
  {
    $table = $this->getTable('categories');

    if ( !array_key_exists ('category_template' , $data ) ){
      $data['category_template'] = $data['category_layout'] = $data['category_product_layout'] = 0 ;
    }
    if(VmConfig::get('categorytemplate') == $data['category_template'] ){
      $data['category_template'] = 0;
    }

    if(VmConfig::get('categorylayout') == $data['category_layout']){
      $data['category_layout'] = 0;
    }

    if(VmConfig::get('productlayout') == $data['category_product_layout']){
      $data['category_product_layout'] = 0;
    }

    $table->bindChecknStore($data);

    if(!empty($data['virtuemart_category_id'])){
      $xdata['category_child_id'] = (int)$data['virtuemart_category_id'];
      $xdata['category_parent_id'] = empty($data['category_parent_id'])? 0:(int)$data['category_parent_id'];
      $xdata['ordering'] = empty($data['ordering'])? 0: (int)$data['ordering'];

        $table = $this->getTable('category_categories');

      $table->bindChecknStore($xdata);

    }

    $this->clearCategoryRelatedCaches();

    return $data['virtuemart_category_id'] ;
  }
}