<?php

namespace Mycompany\Message\Controller\Adminhtml\Message;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;

class NewAction extends Action
{
	public function __construct(
		Context $context,
		\Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
	) 
	{
		parent::__construct($context);
		$this->resultForwardFactory = $resultForwardFactory;
	}
	
	public function execute()
	{
		return $this->resultForwardFactory->create()->forward('edit');
	}
}
