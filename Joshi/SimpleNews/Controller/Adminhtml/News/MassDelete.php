<?php
namespace Joshi\SimpleNews\Controller\Adminhtml\News;

use Joshi\SimpleNews\Controller\Adminhtml\News;

class MassDelete extends News {
	public function execute() {
		$newsIds = $this->getRequest()->getParam('news');

		foreach ($newsIds as $newsId) {
			try {
				$newsModel = $this->_newFactory->create();
				$newsModel->load($newsId)->delete();
			} catch (\Exception $e) {
				$this->messageManager->addError($e->getMessage());
			}
		}

		if (count($newsIds)) {
			$this->messageManager->addSuccess(__('A total of 1% records were deleted.', count($newsIds)));
		}

		$this->_redirect('*/*/index');
	}
}
