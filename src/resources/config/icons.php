<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Library & Style
    |--------------------------------------------------------------------------
    */

    'default_library' => env('ICON_DEFAULT_LIBRARY', 'solar'),
    'default_style' => env('ICON_DEFAULT_STYLE', 'bold-duotone'),

    /*
    |--------------------------------------------------------------------------
    | Icon Libraries
    |--------------------------------------------------------------------------
    |
    | Define icon libraries with their source paths and available styles.
    | Source can be a vendor package path or custom directory.
    |
    */

    'libraries' => [
        'solar' => [
            'path' => 'vendor/xylph-official/xylph-icons/resources/icons/solar',
            'styles' => [
                'bold-duotone',
                'bold',
                'broken',
                'line-duotone',
                'linear',
                'outline',
            ],
            'pattern' => '{name}-{style}.svg',
        ],

        // 将来的に他のライブラリも追加可能
        // 'heroicons' => [
        //     'path' => 'vendor/xylph-official/xylph-icons/resources/icons/heroicons',
        //     'styles' => ['outline', 'solid', 'mini'],
        //     'pattern' => '{style}/{name}.svg',
        // ],
    ],

];
