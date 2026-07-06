<?php
return [
    [
        'title' => 'Dashboard',
        'icon' => 'fa fa-home',
        'url' => '/dashboard',
        'roles' => ['admin', 'operator','driver','user']
    ],

    [
        'title' => 'Master Data',
        'icon' => 'fa fa-database',
        'roles' => ['admin', 'operator'],
        'children' => [
            [
                'title' => 'Data Bus',
                'url' => '/buses',
                'roles' => ['admin', 'operator']
            ]
        ]
    ],

    [
        'title' => 'User Management',
        'icon' => 'fa fa-users',
        'url' => '/users',
        'roles' => ['admin','operator']
    ]

];