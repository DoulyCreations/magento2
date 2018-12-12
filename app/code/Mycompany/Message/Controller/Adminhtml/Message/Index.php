<?php

namespace Mycompany\Message\Controller\Adminhtml\Message;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
	/**
	 * @var PageFactory
	 */
	protected $resultPageFactory;
	
	public function __construct(Context $context, PageFactory $resultPageFactory)
	{
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}
	
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Mycompany_Message::manage');
	}
	
	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();

		$resultPage->setActiveMenu('Mycompany_Message::manage')
			->addBreadcrumb(__('Message'), __('Message'));
		
		return $resultPage;
	}
}