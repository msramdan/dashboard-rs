<?php

return [
    /**
     * If any input file(image) as default will used options below.
     */
    'image' => [
        /**
         * Path for store the image.
         *
         * avaiable options:
         * 1. public
         * 2. storage
         */
        'path' => 'storage',

        /**
         * Will used if image is nullable and default value is null.
         */
        'default' => 'https://via.placeholder.com/350?text=No+Image+Avaiable',

        /**
         * Crop the uploaded image using intervention image.
         */
        'crop' => true,

        /**
         * When set to true the uploaded image aspect ratio will still original.
         */
        'aspect_ratio' => true,

        /**
         * Crop image size.
         */
        'width' => 500,
        'height' => 500,
    ],

    'format' => [
        /**
         * Will used to first year on select, if any column type year.
         */
        'first_year' => 1900,

        /**
         * If any date column type will cast and display used this format, but for input date still will used Y-m-d format.
         *
         * another most common format:
         * - M d Y
         * - d F Y
         * - Y m d
         */
        'date' => 'd/m/Y',

        /**
         * If any input type month will cast and display used this format.
         */
        'month' => 'm/Y',

        /**
         * If any input type time will cast and display used this format.
         */
        'time' => 'H:i',

        /**
         * If any datetime column type or datetime-local on input, will cast and display used this format.
         */
        'datetime' => 'd/m/Y H:i',

        /**
         * Limit string on index view for any column type text or longtext.
         */
        'limit_text' => 100,
    ],

    /**
     * It will used for generator to manage and showing menus on sidebar views.
     *
     * Example:
     * [
     *   'header' => 'Main',
     *
     *   // All permissions in menus[] and submenus[]
     *   'permissions' => ['test view'],
     *
     *   menus' => [
     *       [
     *          'title' => 'Main Data',
     *          'icon' => '<i class="bi bi-collection-fill"></i>',
     *          'route' => null,
     *
     *          // permission always null when isset submenus
     *          'permission' => null,
     *
     *          // All permissions on submenus[] and will empty[] when submenus equals to []
     *          'permissions' => ['test view'],
     *
     *          'submenus' => [
     *                 [
     *                     'title' => 'Tests',
     *                     'route' => '/tests',
     *                     'permission' => 'test view'
     *                  ]
     *               ],
     *           ],
     *       ],
     *  ],
     *
     * This code below always changes when you use a generator and maybe you must lint or format the code.
     */
    'sidebars' => [
    [
        'header' => 'Administrases',
        'permissions' => [
            'administrasi view'
        ],
        'menus' => [
            [
                'title' => 'Administrasi',
                'icon' => '<i class="bi bi-list"></i>',
                'route' => '/administrasi',
                'permission' => 'administrasi view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Rawat Inaps',
        'permissions' => [
            'rawat inap view'
        ],
        'menus' => [
            [
                'title' => 'Rawat Inap',
                'icon' => '<i class="bi bi-list"></i>',
                'route' => '/rawat-inaps',
                'permission' => 'rawat inap view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
            ],
    [
        'header' => 'Bkias',
        'permissions' => [
            'bkia view'
        ],
        'menus' => [
            [
                'title' => 'BKIA',
                'icon' => '<i class="bi bi-list"></i>',
                'route' => '/bkias',
                'permission' => 'bkia view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Ugds',
        'permissions' => [
            'ugd view'
        ],
        'menus' => [
            [
                'title' => 'UGD',
                'icon' => '<i class="bi bi-list"></i>',
                'route' => '/ugds',
                'permission' => 'ugd view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Poli Umums',
        'permissions' => [
            'poli umum view'
        ],
        'menus' => [
            [
                'title' => 'Poli Umum',
                'icon' => '<i class="bi bi-list"></i>',
                'route' => '/poli-umums',
                'permission' => 'poli umum view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Pendaftarans',
        'permissions' => [
            'pendaftaran view'
        ],
        'menus' => [
            [
                'title' => 'Pendaftaran',
                'icon' => '<i class="bi bi-list"></i>',
                'route' => '/pendaftarans',
                'permission' => 'pendaftaran view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Rekam Medis',
        'permissions' => [
            'rekam medi view'
        ],
        'menus' => [
            [
                'title' => 'Rekam Medis',
                'icon' => '<i class="bi bi-list"></i>',
                'route' => '/rekam-medis',
                'permission' => 'rekam medi view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Laboratoriums',
        'permissions' => [
            'laboratorium view'
        ],
        'menus' => [
            [
                'title' => 'Laboratorium',
                'icon' => '<i class="bi bi-list"></i>',
                'route' => '/laboratoriums',
                'permission' => 'laboratorium view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Radiologis',
        'permissions' => [
            'radiologi view'
        ],
        'menus' => [
            [
                'title' => 'Radiologi',
                'icon' => '<i class="bi bi-list"></i>',
                'route' => '/radiologis',
                'permission' => 'radiologi view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Utilities',
        'permissions' => [
            'user view',
            'role & permission view'
        ],
        'menus' => [
            [
                'title' => 'Users & Roles',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [
                    'user view',
                    'role & permission view'
                ],
                'submenus' => [
                    [
                        'title' => 'Users',
                        'route' => '/users',
                        'permission' => 'user view'
                    ],
                    [
                        'title' => 'Roles & permissions',
                        'route' => '/roles',
                        'permission' => 'role & permission view'
                    ]
                ]
            ]
        ]
    ]
]
];
