<?php
namespace Joshi\SimpleNews\Controller\Adminhtml\News;

use Joshi\SimpleNews\Controller\Adminhtml\News;

/** This is the edit action for editing news page */
class Edit extends News {
	public function execute() {
		$newsId = $this->getRequest()->getParam('id');
		$model = $this->_newsFactory->create();

		if ($newsId) {
			$model->load($newsId); //just load the id to get the object

			if (!$model->getId()) {
				$this->messageManager->addError(__('This news no longer exists.'));
				$this->_redirect('*/*/');

				return;
			}
		}

		$data = $this->_session->getNewsData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		$this->_coreRegistry->register('simplenews_news', $model);

		$resultPage = $this->_resultPageFactory->create();
		$resultPage->setActiveMenu('Joshi_SimpleNews::main_menu');
		$resultPage->getConfig()->getTitle()->prepend(__('Simple News'));

		return $resultPage;
	}
}
