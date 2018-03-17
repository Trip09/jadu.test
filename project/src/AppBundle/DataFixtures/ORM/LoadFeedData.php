<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Model\Feed;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadFeedData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;

    public function getOrder()
    {
        return 1;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $options = [
            'PHP RSS'  => 'http://www.php.net/news.rss',
            'Slashdot' => 'http://slashdot.org/rss/slashdot.rss',
            'BBC'      => 'http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/front_page/rss.xml',
        ];

        foreach ($options as $name => $url) {
            $object = new Feed();
            $object
                ->setName($name)
                ->setRssUrl($url);

            $manager->persist($object);
        }

        $manager->flush();
    }
}
