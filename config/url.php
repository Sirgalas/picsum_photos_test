<?php
return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        ''=>'site/index',
        'admin'=>'admin/site/index',
        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w-]+>' => '<_c>/<_a>',
        '<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_c>/<_a>',
    ]
];