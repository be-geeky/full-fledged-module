<?php
namespace Joshi\SimpleNews\Controller\Adminhtml;

use Joshi\SimpleNews\Model\NewsFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

abstract class News extends Action {
	protected $_coreRegistry;

	protected $_resultPageFactory;

	protected $_newsFactory;

	public function __construct(
		Context $context,
		Registry $coreRegistry,
		PageFactory $resultPageFactory,
		NewsFactory $newsFactory
	) {
		$this->_coreRegistry = $coreRegistry;
		$this->_resultPageFactory = $resultPageFactory;
		$this->_newsFactory = $newsFactory;
		parent::__construct($context);
	}

	protected function _isAllowed() {
		return $this->_authorization->isAllowed('Joshi_SimpleNews::manage_news');
	}
}