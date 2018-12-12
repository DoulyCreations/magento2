<?php

namespace Mycompany\Exos\Plugin;

use \Magento\Framework\Message\ManagerInterface;
use \Magento\Customer\Model\Session;
use Magento\Framework\Controller\ResultFactory;

class CatalogSearchAdvancedIndexPlugin
{
    private $session;
    private $messageManagement;
    private $resultFactory;
    
    public function __construct(
        Session $session,
        ManagerInterface $messageManagement,
        ResultFactory $resultFactory
    )
    {
        $this->session = $session;
        $this->messageManagement = $messageManagement;
        $this->resultFactory = $resultFactory;
    }
    
    public function aroundExecute(
        \Magento\CatalogSearch\Controller\Advanced\Index $subject,
        \Closure $proceed
    )
    {
        // TODO : si on n'est logué => OK
        // dans le cas contraire, on est redirigé vers la page de login avec un message d'erreur.
        
        if(!$this->session->isLoggedIn()) {
            
            $this->messageManagement->addWarning('Vous devez être connecté pour accéder à cette page');
            
            $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('customer/account/login');
            
            return $resultRedirect;
        }
        
        return $proceed();
    }
}
