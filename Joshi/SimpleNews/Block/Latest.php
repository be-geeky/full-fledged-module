<?php
namespace Joshi\SimpleNews\Block;

use Joshi\SimpleNews\Helper\Data;
use Joshi\SimpleNews\Model\NewsFactory;
use Magento\Framework\View\Element\Template;

class Latest extends Template {
	protected $_dataHelper;
	protected $_newsFactory;

	public function __construct(Template\Context $context, Data $dataHelper, NewsFactory $newsFactory) {
		$this->_dataHelper = $dataHelper;
		$this->_newsFactory = $newsFactory;
		parent::__construct($context);
	}

	//Get five latest news
	public function getLatestNews() {
		$collection = $this->_newsFactory->create()->getCollection();
		$collection->addFieldToFilter('status', ['eq' => 1]);
		$collection->getSelect()->order('id DESC')->limit(5);

		return $collection;
	}
}
