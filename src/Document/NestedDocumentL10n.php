<?php
declare(strict_types = 1);


namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class NestedDocumentL10n
 * @package App\Document
 *
 * @MongoDB\EmbeddedDocument()
 */
class NestedDocumentL10n
{

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
}
