<?php

namespace AppBundle\Controller\Admin;

use FeedIo\Feed;
use FeedIo\Reader\ReadErrorException;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Request;

class FeedController extends CRUDController
{
    /**
     * @param Request               $request
     * @param \AppBundle\Model\Feed $object
     *
     * @return null|\Symfony\Component\HttpFoundation\Response
     */
    public function preShow(Request $request, $object)
    {
        $feeder = '';
        $feedIo = $this->container->get(    'feedio');

        try {
            // now fetch its (fresh) content
            $feeder = $feedIo->read($object->getRssUrl(), new Feed())->getFeed();
        } catch (ReadErrorException $exception) {
            $logger = $this->container->get('monolog.logger.app.command');
            $logger->warning(
                '[#0001]: Can\'t handle response from external RSS URL. URL:{url}, Exception: {Message}',
                [
                    'message' => $exception->getMessage(),
                    'url'     => $object->getRssUrl(),
                ]
            );
        }

        return $this->renderWithExtraParams(
            'AppBundle:Admin/CRUD:show_feeder.html.twig',
            [
                'action'   => 'show',
                'object'   => $object,
                'feeder'   => $feeder,
                'elements' => $this->admin->getShow(),
            ],
            null
        );
    }
}
