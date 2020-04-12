<?php

return array_merge(require(__DIR__ . '/installed_modules.php'), [
    'core' => [
        'class' => nullref\core\Module::class,
    ],
    'cms' => [
        'class' => nullref\cms\Module::class,
    ],
    'admin' => [
        'class' => app\modules\admin\Module::class,
        'components' => [
            'menuBuilder' => \app\modules\admin\components\AdminMenuBuilder::class,
        ],
    ],
    'hospital' => [
        'class' => \app\modules\hospital\Module::class,
    ],
    'hr' => [
        'class' => \app\modules\hr\Module::class,
    ],
]);
