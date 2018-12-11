<?php
namespace Joshi\SimpleNews\Controller\Adminhtml\News;

use Joshi\SimpleNews\Controller\Adminhtml\News;

/*
This is the grid action which is used for loading grid by ajax
 */
class Grid extends News {
	public function execute() {
		return $this->_resultPageFactory->create();
	}
}
