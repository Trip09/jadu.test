<?php

namespace AppBundle\Repository;

use Components\Repository\DefaultDoctrine;

class FeedDoctrine extends DefaultDoctrine
{
    /**
     * @inheritdoc
     */
    protected function getAlias()
    {
        return 'feed';
    }
}
