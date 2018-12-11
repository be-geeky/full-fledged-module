<?php
namespace Joshi\SimpleNews\Model;

use Magento\Framework\Model\AbstractModel;

class News extends AbstractModel {
	protected function _construct() {
		/** @var resourceModel classname */
		$this->_init('Joshi\SimpleNews\Model\ResourceModel\News');
	}
}