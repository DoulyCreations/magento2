<?php

namespace Mycompany\Exos\Controller\Contact\Index;

class Index extends \Magento\Contact\Controller\Index\Index
{
    public function execute()
    {
        var_dump('coucou');
        return parent::execute();
    }
}
