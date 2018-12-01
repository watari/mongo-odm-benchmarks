<?php
declare(strict_types = 1);


namespace App\Console;

use App\Document\NestedDocument;
use App\Document\NestedDocumentL10n;
use App\Document\Document;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PopulateCommand extends Command
{

    protected $documentManager;

    public function __construct(DocumentManager $documentManager, ?string $name = null)
    {
        $this->documentManager = $documentManager;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName('app:populate');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        for($i = 0; $i < 100; $i++) {
            $document = new Document();
            $document->setName("Name {$i}");
            $document->setComment("Comment {$i}");
            $document->setAmount($i);
            $document->setBooks($this->createNestedCollection($i));
            $document->setCollections($this->createNestedCollection($i));
            $document->setComments($this->createNestedCollection($i));
            $document->setDescriptions($this->createNestedCollection($i));
            $document->setPosts($this->createNestedCollection($i));
            $document->setReasons($this->createNestedCollection($i));
            $document->setRemarks($this->createNestedCollection($i));
            $document->setReviews($this->createNestedCollection($i));
            $document->setSongs($this->createNestedCollection($i));
            $document->setSummaries($this->createNestedCollection($i));

            $this->documentManager->persist($document);
        }

        $this->documentManager->flush();
    }

    protected function createNestedCollection(int $iteration): array
    {
         $collection = [];

         for($i = 0; $i < 50; $i++) {
             $comment = new NestedDocument();
             $comment->setName("Name {$iteration}");
             $comment->setLangId("Lang ID {$iteration}");
             $comment->setDescription("Description {$iteration}");
             $comment->setId($iteration);
             $comment->setTitle("Title {$iteration}");
             $localized = [];
             for ($j = 0; $j < 10; $j++) {
                 $commentL10n = new NestedDocumentL10n();
                 $commentL10n->setName("Name {$iteration} {$j}");
                 $commentL10n->setLangId("Lang ID {$iteration} {$j}");
                 $commentL10n->setDescription("Description {$iteration} {$j}");
                 $commentL10n->setTitle("Title {$iteration} {$j}");
                 $localized[] = $commentL10n;
             }
             $comment->setLocalized($localized);
             $collection[] = $comment;
         }

         return $collection;
    }
}
