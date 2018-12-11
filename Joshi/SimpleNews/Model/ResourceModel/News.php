<?php
namespace Joshi\SimpleNews\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class News extends AbstractDb {
	protected function _construct() {
		$this->_init('tutorial_simplenews', 'id');
	}
}
