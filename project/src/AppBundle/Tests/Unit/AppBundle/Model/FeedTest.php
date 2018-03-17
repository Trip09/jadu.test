<?php

namespace Tests\AppBundle\Model;

use AppBundle\Model\Feed;
use AppBundle\Model\FeedInterface;
use Components\Model\Entity;
use PHPUnit\Framework\TestCase;

class FeedTest extends TestCase
{
    const NAME = 'test';

    public function testFeedInterface()
    {
        $feed = new Feed();

        $this->assertInstanceOf(FeedInterface::class, $feed);
    }

    public function testEntityInterface()
    {
        $feed = new Feed();

        $this->assertInstanceOf(Entity::class, $feed);
    }

    public function testName()
    {
        $feed = new Feed();
        $feed->setName(self::NAME);

        $this->assertEquals(self::NAME, $feed->getName());
    }

    public function testRssUrl()
    {
        $feed = new Feed();
        $feed->setRssUrl(self::NAME);

        $this->assertEquals(self::NAME, $feed->getRssUrl());
    }

    public function testClassName()
    {
        $feed = new Feed();
        $feed->setName(self::NAME);

        $this->assertEquals(self::NAME, $feed->__toString());
    }

    public function testClassNameNA()
    {
        $feed = new Feed();

        $this->assertEquals('N/A', $feed->__toString());
    }
}
