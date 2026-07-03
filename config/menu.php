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
                'title' => 'Nodes (Graph Points)',
                'url' => '/nodes',
                'roles' => ['admin', 'operator']
            ],
            [
                'title' => 'Edges (Graph Connections)',
                'url' => '/edges',
                'roles' => ['admin', 'operator']
            ],
            // [
            //     'title' => 'Data Bus',
            //     'url' => '/buses',
            //     'roles' => ['admin', 'operator']
            // ],
            [
                'title' => 'Places',
                'url' => '/places',
                'roles' => ['admin', 'operator']
            ],
            // [
            //     'title' => 'Destinations',
            //     'url' => '/destinations',
            //     'roles' => ['admin', 'operator']
            // ]
        ]
    ],
    [
        'title' => 'Route Calculation',
        'icon' => 'fa fa-route',
        'url' => '/route-calculation',
        'roles' => ['admin', 'operator']
    ],
    // [
    //     'title' => 'Bus schedule',
    //     'icon' => 'fa fa-bus',
    //     'url' => '/bus-schedules',
    //     'roles' => ['admin', 'operator','driver','user']
    // ],

    // [
    //     'title' => 'Map Visualization',
    //     'icon' => 'fa fa-map',
    //     'url' => '/map',
    //     'roles' => ['admin', 'operator','driver','user']
    // ],

    [
        'title' => 'Evaluation/Analysis',
        'icon' => 'fa fa-chart-line',
        'roles' => ['admin'],
        'children' => [
            [
                'title' => 'Calculation Logs',
                'url' => '/calculation-logs',
                'roles' => ['admin']
            ],
            // [
            //     'title' => 'Performance Testing',
            //     'url' => '/performance-test',
            //     'roles' => ['admin']
            // ]
        ]
    ],

    [
        'title' => 'User Management',
        'icon' => 'fa fa-users',
        'url' => '/users',
        'roles' => ['admin','operator']
    ]

];