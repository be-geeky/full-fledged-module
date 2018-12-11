<?php
namespace Joshi\SimpleNews\Controller\Adminhtml\News;

use Joshi\SimpleNews\Controller\Adminhtml\News;

class Index extends News {
	public function execute() {
		if ($this->getRequest()->getQuery('ajax')) {
			$this->_forward('grid');
			return;
		}

		$resultPage = $this->_resultPageFactory->create();
		$resultPage->setActiveMenu('Joshi_SimpleNews::main_menu');
		$resultPage->getConfig()->getTitle()->prepend(__('Joshi Simple News'));

		return $resultPage;
	}
}