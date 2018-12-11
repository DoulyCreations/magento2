<?php

namespace Mycompany\Message\Controller;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NotFoundException;
use Mycompany\Message\Api\MessageRepositoryInterface;

/**
 * Contact module base controller
 */
abstract class Message extends \Magento\Framework\App\Action\Action
{
    protected $messageRepository;
    protected $searchCriteriaBuilder;

    /**
     * @param Context $context
     * @param ConfigInterface $contactsConfig
     */
    public function __construct(
        Context $context,
        MessageRepositoryInterface $messageRepository,
        \Magento\Framework\Api\Search\SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        parent::__construct($context);
        $this->messageRepository = $messageRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Dispatch request
     *
     * @param RequestInterface $request
     * @return \Magento\Framework\App\ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function dispatch(RequestInterface $request)
    {
        if (!$this->messageRepository->getList($this->searchCriteriaBuilder->create())) {
            throw new NotFoundException(__('No Results...'));
        }
        return parent::dispatch($request);
    }
}

