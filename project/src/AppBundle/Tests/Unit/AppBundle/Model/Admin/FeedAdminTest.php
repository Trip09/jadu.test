<?php

namespace Tests\AppBundle\Model\Admin;

use AppBundle\Model\Admin\FeedAdmin;
use PHPUnit\Framework\TestCase;
use Sonata\AdminBundle\Admin\AbstractAdmin;

class FeedAdminTest extends TestCase
{
    public function testExtends()
    {
        $feedRepository = new FeedAdmin('test', 'test', 'test');

        $this->assertInstanceOf(AbstractAdmin::class, $feedRepository);
    }
}
