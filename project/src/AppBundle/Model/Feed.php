<?php

namespace AppBundle\Model;

use Components\Model\Entity;
use Components\Model\JsonTrait;
use Gedmo\Timestampable\Traits\Timestampable;

class Feed implements Entity, FeedInterface
{
    use Timestampable;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $rssUrl = '';

    public function __construct()
    {
        $this->updatedAt = new \DateTime();
        $this->createdAt = new \DateTime();
    }

    /**
     * @inheritdoc
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): FeedInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getRssUrl(): string
    {
        return $this->rssUrl;
    }

    /**
     * @param string $rssUrl
     *
     * @return $this
     */
    public function setRssUrl(string $rssUrl): FeedInterface
    {
        $this->rssUrl = $rssUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name ?: 'N/A';
    }
}
