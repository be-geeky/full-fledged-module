<?php
namespace Joshi\SimpleNews\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class News extends Container {
	protected function _construct() {
		$this->_controller = 'adminhtml_news'; //controller name
		$this->_blockGroup = 'Joshi_SimpleNews'; //Module name
		$this->_headerText = __('Manage News');
		$this->_addButtonLabel = __('Add News');
		parent::_construct();
	}
}