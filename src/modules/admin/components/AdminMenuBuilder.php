<?php

namespace app\modules\admin\components;

use nullref\fulladmin\components\MenuBuilder as BaseBuilder;
use nullref\rbac\repositories\AuthAssignmentRepository;
use nullref\rbac\repositories\interfaces\AuthAssignmentRepositoryInterface;

class AdminMenuBuilder extends BaseBuilder
{
    /**
     * @param array $items
     * @return array
     */
    public function build($items)
    {
        unset($items['cms']['items'][0]);
        unset($items['cms']['items'][2]);
        unset($items['eav']);
        unset($items['user']);

        return $items;
    }
}

