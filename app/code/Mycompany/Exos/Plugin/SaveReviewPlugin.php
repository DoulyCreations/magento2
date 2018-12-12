<?php

namespace Mycompany\Exos\Plugin;

use \Magento\Review\Model\Review;

class SaveReviewPlugin
{
    public function aroundSave(
        \Magento\Review\Model\Review $subject,
        \Closure $proceed
    )
    {
        /*
         * Si le message ne contient pas le mot clé 'super', faire en sorte que le review soit approuvé
         * Si le message contient le mot clé 'super', faire en sorte que le review soit refusé
         */
        
        if(stripos($subject->getDetail(), 'super') !== false) {
            // refusé
            $subject->setStatusId(Review::STATUS_NOT_APPROVED);
        } else {
            // approuvé
            $subject->setStatusId(Review::STATUS_APPROVED);
        }
        
        $proceed();
    }
}
