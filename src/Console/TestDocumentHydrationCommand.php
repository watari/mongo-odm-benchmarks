<?php
declare(strict_types = 1);


namespace App\Console;

use App\Document\NestedDocument;
use App\Document\Document;
//use App\Helper\XhprofHelper;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestDocumentHydrationCommand extends Command
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    public function __construct(DocumentManager $documentManager, ?string $name = null)
    {
        $this->repository = $documentManager->getRepository(Document::class);
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName('app:test-document-hydration');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Document[] $items */
        $items = iterator_to_array($this->repository->createQueryBuilder()->limit(10)->getQuery()->execute());
//        XhprofHelper::start();
        $start = microtime(true);
        foreach ($items as $item) {
            $this->callAllGetters($item->getSongs());
            $this->callAllGetters($item->getBooks());
            $this->callAllGetters($item->getCollections());
            $this->callAllGetters($item->getComments());
            $this->callAllGetters($item->getDescriptions());
            $this->callAllGetters($item->getPosts());
            $this->callAllGetters($item->getReasons());
            $this->callAllGetters($item->getRemarks());
            $this->callAllGetters($item->getReviews());
            $this->callAllGetters($item->getSummaries());
        }
        $output->writeln("Total hydration time: " . (microtime(true) - $start));
//        XhprofHelper::stop(true);
    }

    /**
     * @param NestedDocument[] $items
     */
    protected function callAllGetters(array $items): void
    {
        foreach ($items as $item) {
            $item->getLocalized();
        }
    }
}
