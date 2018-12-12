<?php

namespace Mycompany\Message\Console\Command;

//use Magento\Framework\DB\Logger\LoggerProxy;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
//use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
//use Magento\Framework\App\DeploymentConfig\Writer;
//use Magento\Framework\Config\File\ConfigFilePool;
use Symfony\Component\Console\Input\InputArgument;

class CreateMessageCommand extends Command
{
    private $messageFactory;
    private $messageRepository;
    
    public function __construct(
        \Mycompany\Message\Api\Data\MessageInterfaceFactory $messageFactory,
        \Mycompany\Message\Api\MessageRepositoryInterface $messageRepository
    )
    {
        parent::__construct();
        $this->messageFactory = $messageFactory;
        $this->messageRepository = $messageRepository;
    }
    
    protected function configure()
    {
        $this->setName('mycompany-message:message:create')
            ->setDescription('Create a Message from Command')
            ->setDefinition([
                new InputArgument(
                    'title',
                    InputArgument::REQUIRED,
                    'Message Title'
                ),
                new InputArgument(
                    'content',
                    InputArgument::REQUIRED,
                    'Message Content'
                )
            ]);
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $title = $input->getArgument('title');
        $content = $input->getArgument('content');
        
        $dataMessage = $this->messageFactory->create();
        $dataMessage->setTitle($title);
        $dataMessage->setContent($content);
        $this->messageRepository->save($dataMessage);
        
        $output->writeln('Message created id : '.$dataMessage->getId());
    }
}
