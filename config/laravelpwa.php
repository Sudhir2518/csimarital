<?php

return [
    'name' => 'CSIMarital',
    'manifest' => [
        'name' => env('APP_NAME', 'CSIMarital'),
        'short_name' => 'CSIM',
        'start_url' => '/',
        'background_color' => '#51A8D6',
        'theme_color' => '#02407E',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'blue',
        'icons' => [
            '72x72' => [
                'path' => '/public/images/AppIcons/72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/public/images/AppIcons/96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/public/images/AppIcons/128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/public/images/AppIcons/144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/public/images/AppIcons/152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/public/images/AppIcons/192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/public/images/AppIcons/384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/public/images/AppIcons/512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/public/images/AppIcons/splash-640x1136.png',
            '750x1334' => '/public/images/AppIcons/splash-750x1334.png',
            '828x1792' => '/public/images/AppIcons/splash-828x1792.png',
            '1125x2436' => '/public/images/AppIcons/splash-1125x2436.png',
            '1242x2208' => '/public/images/AppIcons/splash-1242x2208.png',
            '1242x2688' => '/public/images/AppIcons/splash-1242x2688.png',
            '1536x2048' => '/public/images/AppIcons/splash-1536x2048.png',
            '1668x2224' => '/public/images/AppIcons/splash-1668x2224.png',
            '1668x2388' => '/public/images/AppIcons/splash-1668x2388.png',
            '2048x2732' => '/public/images/AppIcons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/dashboard',
                'icons' => [
                    "src" => "/public/images/AppIcons/72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/welcomeuser'
            ]
        ],
        'custom' => []
    ]
];
