<?php

namespace Mycompany\Exos\Plugin;

use \Magento\Framework\Message\ManagerInterface;
use \Magento\Customer\Model\Session;
use Magento\Framework\Controller\ResultFactory;

class CustomerAccountLogoutPlugin
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
        \Magento\Customer\Controller\Account\Logout $subject,
        \Closure $proceed
    )
    {
        /*
         * Une déconnexion sur Magento entraine une redirection sur une page intermédiaire 
         * qui redirige le client sur la page d'accueil dans 5 secondes, 
         * faire en sorte de passer cette dernière étape et de 
         * rediriger automatiquement vers la page d'accueil.
         */
        
        $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('');
        
        $proceed();

        return $resultRedirect;
    }
}
