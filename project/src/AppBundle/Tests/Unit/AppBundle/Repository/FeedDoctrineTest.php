<?php

namespace Tests\AppBundle\Repository;

use AppBundle\Repository\FeedDoctrine;
use Components\Repository\DefaultDoctrine;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use PHPUnit\Framework\TestCase;

class FeedDoctrineTest extends TestCase
{
    public function testExtends()
    {
        $em    = $this->createMock(EntityManagerInterface::class);
        $class = $this->createMock(ClassMetadata::class);

        $feedRepository = new FeedDoctrine($em, $class);

        $this->assertInstanceOf(DefaultDoctrine::class, $feedRepository);
    }

}
