<?php
namespace Joshi\SimpleNews\Model\ResourceModel\News;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {
	protected function _construct() {
		$this->_init('Joshi\SimpleNews\Model\News', 'Joshi\SimpleNews\Model\ResourceModel\News');
	}
}
