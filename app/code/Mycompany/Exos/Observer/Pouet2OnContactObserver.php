<?php

namespace Mycompany\Exos\Observer;

use Magento\Framework\Event\ObserverInterface;

class Pouet2OnContactObserver implements ObserverInterface
{
    
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // TODO : Voir pourquoi ça ne fonctionne pas.
        var_dump('pouet2');
    }
}
