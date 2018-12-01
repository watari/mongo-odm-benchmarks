<?php
declare(strict_types = 1);


namespace App\Document;

use App\Helper\CollectionHelper;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class Document
 * @package App\Document
 *
 * @MongoDB\Document(collection="test_document")
 */
class Document
{

    /**
     * @MongoDB\Id()
     *
     * @var mixed
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     *
     * @var string
     */
    protected $name;

    /**
     * @MongoDB\Field(type="string")
     *
     * @var string
     */
    protected $comment;

    /**
     * @MongoDB\Field(type="int")
     *
     * @var int
     */
    protected $amount;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocument::class)
     *
     * @var Collection
     */
    protected $comments;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocument::class)
     *
     * @var Collection
     */
    protected $reviews;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocument::class)
     *
     * @var Collection
     */
    protected $posts;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocument::class)
     *
     * @var Collection
     */
    protected $descriptions;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocument::class)
     *
     * @var Collection
     */
    protected $summaries;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocument::class)
     *
     * @var Collection
     */
    protected $reasons;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocument::class)
     *
     * @var Collection
     */
    protected $remarks;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocument::class)
     *
     * @var Collection
     */
    protected $collections;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocument::class)
     *
     * @var Collection
     */
    protected $books;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocument::class)
     *
     * @var Collection
     */
    protected $songs;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->posts = new ArrayCollection();
        $this->descriptions = new ArrayCollection();
        $this->summaries = new ArrayCollection();
        $this->reasons = new ArrayCollection();
        $this->remarks = new ArrayCollection();
        $this->collections = new ArrayCollection();
        $this->books = new ArrayCollection();
        $this->songs = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return void
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     *
     * @return void
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return int
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return void
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return NestedDocument[]
     */
    public function getComments(): array
    {
        return $this->comments->toArray();
    }

    /**
     * @param NestedDocument[] $comments
     *
     * @return void
     */
    public function setComments(array $comments): void
    {
        CollectionHelper::setElementsForCollection($this->comments, $comments);
    }

    /**
     * @return NestedDocument[]
     */
    public function getReviews(): array
    {
        return $this->reviews->toArray();
    }

    /**
     * @param NestedDocument[] $reviews
     *
     * @return void
     */
    public function setReviews(array $reviews): void
    {
        CollectionHelper::setElementsForCollection($this->reviews, $reviews);
    }

    /**
     * @return NestedDocument[]
     */
    public function getPosts(): array
    {
        return $this->posts->toArray();
    }

    /**
     * @param NestedDocument[] $posts
     *
     * @return void
     */
    public function setPosts(array $posts): void
    {
        CollectionHelper::setElementsForCollection($this->posts, $posts);
    }

    /**
     * @return NestedDocument[]
     */
    public function getDescriptions(): array
    {
        return $this->descriptions->toArray();
    }

    /**
     * @param NestedDocument[] $descriptions
     *
     * @return void
     */
    public function setDescriptions(array $descriptions): void
    {
        CollectionHelper::setElementsForCollection($this->descriptions, $descriptions);
    }

    /**
     * @return NestedDocument[]
     */
    public function getSummaries(): array
    {
        return $this->summaries->toArray();
    }

    /**
     * @param NestedDocument[] $summaries
     *
     * @return void
     */
    public function setSummaries(array $summaries): void
    {
        CollectionHelper::setElementsForCollection($this->summaries, $summaries);
    }

    /**
     * @return NestedDocument[]
     */
    public function getReasons(): array
    {
        return $this->reasons->toArray();
    }

    /**
     * @param NestedDocument[] $reasons
     *
     * @return void
     */
    public function setReasons(array $reasons): void
    {
        CollectionHelper::setElementsForCollection($this->reasons, $reasons);
    }

    /**
     * @return NestedDocument[]
     */
    public function getRemarks(): array
    {
        return $this->remarks->toArray();
    }

    /**
     * @param NestedDocument[] $remarks
     *
     * @return void
     */
    public function setRemarks(array $remarks): void
    {
        CollectionHelper::setElementsForCollection($this->remarks, $remarks);
    }

    /**
     * @return NestedDocument[]
     */
    public function getCollections(): array
    {
        return $this->collections->toArray();
    }

    /**
     * @param NestedDocument[] $collections
     *
     * @return void
     */
    public function setCollections(array $collections): void
    {
        CollectionHelper::setElementsForCollection($this->collections, $collections);
    }

    /**
     * @return NestedDocument[]
     */
    public function getBooks(): array
    {
        return $this->books->toArray();
    }

    /**
     * @param NestedDocument[] $books
     *
     * @return void
     */
    public function setBooks(array $books): void
    {
        CollectionHelper::setElementsForCollection($this->books, $books);
    }

    /**
     * @return NestedDocument[]
     */
    public function getSongs(): array
    {
        return $this->songs->toArray();
    }

    /**
     * @param NestedDocument[] $songs
     *
     * @return void
     */
    public function setSongs(array $songs): void
    {
        CollectionHelper::setElementsForCollection($this->songs, $songs);
    }

}
