<?php

namespace Mycompany\Message\Controller\Adminhtml\Message;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Mycompany\Message\Api\MessageRepositoryInterface;
use Mycompany\Message\Api\Data\MessageInterfaceFactory as DataMessageFactory;
use Magento\Framework\Api\DataObjectHelper;

class Edit extends Action
{
    /**
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
	
    /**
     * @var MessageRepositoryInterface
     */
    protected $messageRepository;
    
    /**
     * @var DataMessageFactory
     */
    protected $dataMessageFactory;
    
    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;
    
    /**
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
    	MessageRepositoryInterface $messageRepository,
    	DataMessageFactory $dataMessageFactory,
    	DataObjectHelper $dataObjectHelper
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $registry;
        $this->messageRepository = $messageRepository;
        $this->dataMessageFactory = $dataMessageFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mycompany_Message::manage');
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');
        $dataModel = null;
        if ($id) {
            $dataModel = $this->messageRepository->getById($id);
        }
        if(empty($dataModel) || !$dataModel->getId()) {
        	$dataModel = $this->dataMessageFactory->create();
        }

        // 2. Set entered data if was error when we do save
        $data = $this->_session->getFormData(true);
        if (!empty($data)) {
            $this->dataObjectHelper->populateWithArray(
        		$dataMessage,
        		$data,
        		'\Mycompany\Message\Api\Data\MessageInterface'
        	);
        }

        // 3. Register model to use later in blocks
        $this->coreRegistry->register('mycompany_message_message', $dataModel);

        // 4. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        
        $resultPage->setActiveMenu('Mycompany_Message::manage')
            ->addBreadcrumb(__('Message'), __('Message'));
        $resultPage->addBreadcrumb(
            $id ? __('Edit Message') : __('New Message'),
            $id ? __('Edit Message') : __('New Message')
        );
        
        $resultPage->getConfig()->getTitle()->prepend(__('Message'));
        $resultPage->getConfig()->getTitle()
            ->prepend($dataModel->getId() ? $dataModel->getTitle() : __('New Message'));

        return $resultPage;
    }
}
