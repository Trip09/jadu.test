<?php

namespace AppBundle\Model;

interface FeedInterface
{
    /**
     * @inheritdoc
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self;

    /**
     * @return string
     */
    public function getRssUrl(): string;

    /**
     * @param string $rssUrl
     *
     * @return $this
     */
    public function setRssUrl(string $rssUrl): self;
}