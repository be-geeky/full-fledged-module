<?php
namespace Joshi\SimpleNews\Block\Adminhtml\News\Edit\Tab;

use Joshi\SimpleNews\Model\System\Config\Status;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Cms\Model\Wysiwyg\Config;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;

class Info extends Generic implements TabInterface {
	protected $_wysiwygConfig;

	protected $_newsStatus;

	public function __construct(
		Context $context,
		Registry $registry,
		FormFactory $formFactory,
		Config $wysiwygConfig,
		Status $newsStatus,
		array $data = []) {
		$this->_wysiwygConfig = $wysiwygConfig;
		$this->_newsStatus = $newsStatus;
		parent::__construct($context, $registry, $formFactory, $data);
	}

	protected function _prepareForm() {
		$model = $this->_coreRegistry->registry('simplenews_news');

		$form = $this->_formFactory->create();
		$form->setHtmlIdPrefix('news_');
		$form->setFieldNameSuffix('news');

		$fieldset = $form->addFieldset('base_fieldset', ['legend' => __('General')]);

		if ($model->getId()) {
			$fieldset->addField('id', 'hidden', ['name' => 'id']);
		}

		$fieldset->addField('title', 'text', ['name' => 'title', 'label' => __('Title'), 'required' => true]);
		$fieldset->addField('status', 'select', ['name' => 'status', 'label' => __('Status'), 'options' => $this->_newsStatus->toOptionArray()]);
		$fieldset->addField('summary', 'textarea', ['name' => 'summary', 'label' => __('Summary'), 'required' => true]);

		$wysiwygConfig = $this->_wysiwygConfig->getConfig();
		$fieldset->addField('description', 'editor', ['name' => 'description', 'label' => __('Description'), 'required' => true, 'config' => $wysiwygConfig]);

		$data = $model->getData();
		$form->setValues($data);
		$this->setForm($form);

		return parent::_prepareForm();

	}

	public function getTabLabel() {
		return __('News Info');
	}

	public function getTabTitle() {
		return __('News Info');
	}

	public function canShowTab() {
		return true;
	}

	public function isHidden() {
		return false;
	}
}
