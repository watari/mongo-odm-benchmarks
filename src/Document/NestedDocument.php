<?php
declare(strict_types = 1);


namespace App\Document;

use App\Helper\CollectionHelper;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class NestedDocument
 * @package App\Document
 *
 * @MongoDB\EmbeddedDocument()
 */
class NestedDocument
{
    /**
     * @MongoDB\Field(type="int")
     *
     * @var int
     */
    protected $id;

    /**
     * @MongoDB\EmbedMany(targetDocument=NestedDocumentL10n::class)
     *
     * @var Collection
     */
    protected $localized;

    /**
     * @MongoDB\Field(type="string")
     *
     * @var string
     */
    protected $langId;

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
    protected $title;

    /**
     * @MongoDB\Field(type="string")
     *
     * @var string
     */
    protected $description;

    public function __construct()
    {
        $this->localized = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getLangId(): ?string
    {
        return $this->langId;
    }

    /**
     * @param string $langId
     *
     * @return void
     */
    public function setLangId(string $langId): void
    {
        $this->langId = $langId;
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return NestedDocumentL10n[]
     */
    public function getLocalized(): array
    {
        return $this->localized->toArray();
    }

    /**
     * @param NestedDocumentL10n[] $localized
     *
     * @return void
     */
    public function setLocalized(array $localized): void
    {
        CollectionHelper::setElementsForCollection($this->localized, $localized);
    }
}
