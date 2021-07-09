<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */
    
    'backend' => [
        'general' => [
            'filters' => [
                'reset' => 'Reset Filters'
            ],
        ],
        'access' => [
            'title' => 'Utilisateurs',

            'roles' => [
                'all'        => 'Tous les rôles',
                'create'     => 'Créer un rôle',
                'edit'       => 'Modifier un rôle',
                'management' => 'Gestion des rôles',
                'main'       => 'Rôles',
            ],
            
            'users' => [
                'all'             => 'All Users',
                'change-password' => 'Change Password',
                'transfer-user'   => 'Transfer User',
                'create'          => 'Create User',
                'deactivated'     => 'Deactivated Users',
                'deleted'         => 'Deleted Users',
                'edit'            => 'Edit User',
                'main'            => 'Users',
                'view'            => 'View User',
            ],
        ],
        
        'administration' => [
            'main'     => 'Administration',
            'currency' => [
                'management' => 'Currency',
                'create'     => 'Create Currency',
                'edit'       => 'Edit Currency',
            ],
            'inventory' => [
                'management' => 'Inventory Management',
                'create' => 'Create Inventory',
                'edit' => 'Edit Inventory',
            ],
            'cycle' => [
                'management' => 'Cycle Management',
                'create' => 'Create Cycle',
                'edit' => 'Edit Cycle',
            ]
        ],
        
        'meter' => [
            'main'        => 'Meters',
            'all'         => 'All Meters',
            'electricity' => [
                'management' => 'Electricity Meters',
                'maintain' => 'Maintain Meters',
                'create'     => 'Register Electricity Meter',
                'edit'       => 'Edit Electricity Meter',
                'activate'   => 'Activate Meter',
                'deactivate' => 'Deactivate Meter',
                'clone'      => 'Clone Meter',
                'unassigned' => 'Unassigned Meters'
            ],
        ],
        'point' => [
            'main'        => 'Supply Points',
            'all'         => 'All Supply Points',
            'electricity' => [
                'management' => 'Electricity Points',
                'create'     => 'Register Point',
                'edit'       => 'Edit Point',
                'editMap'       => 'Update GPS',
                'clone'      => 'Clone Point',
                'map'        => 'Map',
            ],
        ],
        'payment' => [
            'main' => 'Payments',
            'reset_filters' => 'Reset Filters',
            'unpaid' => 'Unpaid Bills',
        ],
        
        'log-viewer' => [
            'main'      => 'Vue du journal',
            'dashboard' => 'Tableau de bord',
            'logs'      => 'Journaux',
        ],

        'sidebar' => [
            'dashboard' => 'Tableau de bord',
            'sales' => 'Ventes',
            'quote' => 'Installation Quote',
            'horizon' => 'Horizon',
            'general'   => 'Général',
            'history'   => 'Historique',
            'system'    => 'Système',
            'business'  => 'Activités',
            'access'    => 'Accès',
            'hardware'  => 'Hardware',
            'payments' => 'BIll Payments'
        ],
        'companies' => [
            'title' => 'Entreprises',
    
            'company' => [
                'management' => 'Entreprises',
                'create'     => 'Créer une entreprise',
                'edit'       => 'Modifier l\'enttreprise',
                'clone'      => 'Clone Company',
            ],
        ],
        
        'quote' => [
            'title' => 'Quote',
            'inventory' => [
                'management' => 'Inventories',
                'create' => 'Create Inventory',
                'edit' => 'Edit Inventory',
            ],
            'quote' => [
                'management' => 'Quotes',
                'create' => 'Create Quote',
                'edit' => 'Edit Quote',
            ]
        ],
        
        'services' => [
            'title' => 'Services',
    
            'service'   => [
                'management' => 'Services',
                'create'     => 'Créer un service',
                'edit'       => 'Modifier le service',
            ],
            'price'     => [
                'management' => 'Tariff',
                'edit'       => 'Edit Tariff',
                'create'       => 'Create Tariff',
            ],
            'commission'   => [
                'management' => 'Service Charges',
                'create'     => 'Create Service Charge',
                'edit'       => 'Edit Service Charge',
            ],
            'distribution' => [
                'management' => 'Commission Distribution Strategy',
                'create'     => 'Create Distribution Strategy',
                'edit'       => 'Edit Distribution Strategy',
            ],
            'method'       => [
                'management' => 'Payment Methods',
                'create'     => 'Create Payment Method',
                'edit'       => 'Edit Payment Method',
            ]
        ],
        'sales'      => [
            'management' => 'Sales',
            'clear'      => 'Clear Filters',
            'reset'      => 'Reset Filters',
            'create'     => 'New',
            'quote'      => 'New Sale'
        ],
        'accounts' => [
            'title' => 'Comptes',
            'reset' => 'Reset Filter',

            'deposit' => [
                'management' => 'Compte de dépôt',
                'company' => 'Company Account',
                'view' => 'Voir le compte'
            ],
            'umbrella' => [
                'management' => 'Compte espèces',
                'view' => 'Voir le compte',
            ],
            'payout'   => [
                'management' => 'Commission Account',
                'view'       => 'View Account',
            ],
            'point' => [
                'management' => 'Supply Point Account',
                'view'       => 'View Account',
            ]
        ],
        'accounting' => [
            'title' => 'Comptabilité',
            'collections' => [
                'management' => 'Collectes',
                'view' => 'Voir la collecte'
            ],
            'provisions' => [
                'management' => 'Provisions',
                'view'       => 'View Provisions',
            ],
            'commissions' => [
                'management' => 'Commissions',
                'view'       => 'View Commissions',
            ],
        ],
        'payments' => [
            'title' => 'Bill Payments',
            'view' => 'View Payments',
            'electricity' => [
                'management' => 'Electricity Points',
                'edit' => 'Update Payment',
                'create' => 'Create Payment',
            ]
        ]
    ],
    
    'language-picker' => [
        'language' => 'Langue',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'العربية (Arabic)',
            'zh'    => 'Chinois simplifié (Chinese Simplified)',
            'zh-TW' => 'Chinois traditionnel (Chinese Traditional)',
            'da'    => 'Danois (Danish)',
            'de'    => 'Allemand (German)',
            'el'    => 'Grec (Greek)',
            'en'    => 'Anglais (English)',
            'es'    => 'Espagnol (Spanish)',
            'fa'    => 'Persan (Persian)',
            'fr'    => 'Français (French)',
            'he'    => 'Hébreu (Hebrew)',
            'id'    => 'Indonésien (Indonesian)',
            'it'    => 'Italien (Italian)',
            'ja'    => 'Japonais (Japanese)',
            'nl'    => 'Hollandais (Dutch)',
            'no'    => 'Norvégien (Norwegian)',
            'pt_BR' => 'Portugais (Brazilian Portuguese)',
            'ru'    => 'Russe (Russian)',
            'sv'    => 'Suédois (Swedish)',
            'th'    => 'Thaïlandais (Thai)',
            'tr'    => 'Turc (Turkish)',
        ],
    ],
];
