<?php
namespace Joshi\SimpleNews\Controller\Adminhtml\News;

use Joshi\SimpleNews\Controller\Adminhtml\News;

class NewAction extends News {
	public function execute() {
		$this->_forward('edit');
	}
}