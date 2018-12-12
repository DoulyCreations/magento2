<?php

namespace Mycompany\Message\Block\Adminhtml\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;

class Main extends Generic implements TabInterface
{
	/**
	 * @var DataObjectProcessor
	 */
	protected $dataObjectProcessor;
	
	public function __construct(
    	Context $context,
        Registry $registry,
        FormFactory $formFactory,
    	DataObjectProcessor $dataObjectProcessor,
    	array $data
	)
    {
    	parent::__construct($context, $registry, $formFactory);
    	$this->dataObjectProcessor = $dataObjectProcessor;
    }
    
    /**
     * Prepare form
     *
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $dataModel = $this->_coreRegistry->registry('mycompany_message_message');

        /*
         * Checking if user have permissions to save information
         */
        if ($this->_isAllowedAction('Mycompany_Message::manage')) {
            $isElementDisabled = false;
        } else {
            $isElementDisabled = true;
        }

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('mycompany_message_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Message Information')]);

        if ($dataModel->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Message Title'),
                'title' => __('Message Title'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
        	'content',
        	'textarea',
        	[
        		'name' => 'content',
        		'label' => __('Message Content'),
        		'title' => __('Message Content'),
        		'required' => true,
        		'disabled' => $isElementDisabled
        	]
        );

        $this->_eventManager->dispatch('adminhtml_mycompany_message_message_edit_tab_main_prepare_form', ['form' => $form]);

        $form->setValues($this->dataObjectProcessor->buildOutputDataArray($dataModel, '\Mycompany\Message\Api\Data\MessageInterface'));
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Message Information');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Message Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
