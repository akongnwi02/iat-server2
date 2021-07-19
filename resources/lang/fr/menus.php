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
                'reset' => 'Réinitialiser les filtres'
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
                'all'             => 'Tous les utilisateurs',
                'change-password' => 'Changer le mot de passe',
                'transfer-user'   => 'Transférer l\'utilisateur',
                'create'          => 'Créer l\'utilisateur',
                'deactivated'     => 'Utilisateurs Désactivés',
                'deleted'         => 'Utilisateurs Supprimés',
                'edit'            => 'Modifier l\'utilisateur',
                'main'            => 'Utilisateurs',
                'view'            => 'Voir l\'utilisateur',
            ],
        ],
        
        'administration' => [
            'main'     => 'Administration',
            'currency' => [
                'management' => 'Monnaie',
                'create'     => 'Créer la monnaie',
                'edit'       => 'Modifier la monnaie',
            ],
            'inventory' => [
                'management' => 'Gestion de l\'inventaire',
                'create' => 'Créer l\'inventaire',
                'edit' => 'Modifier l\'inventaire',
            ],
            'cycle' => [
                'management' => 'Gestion du cycle',
                'create' => 'Créer le cycle',
                'edit' => 'Modifier le Cycle',
            ]
        ],
        
        'meter' => [
            'main'        => 'Compteurs',
            'all'         => 'Tous les compteurs',
            'electricity' => [
                'management' => 'Compteurs électriques',
                'maintain' => 'Entretien des Compteurs',
                'create'     => 'Enregistrer le Compteur d\'électricité',
                'edit'       => 'Modifier le compteur d\'électricité',
                'activate'   => 'Activer le Compteur',
                'deactivate' => 'Désctiver le Compteur',
                'clone'      => 'Cloner le compteur',
                'unassigned' => 'Compteurs non assignés'
            ],
        ],
        'point' => [
            'main'        => 'Points de vente',
            'all'         => 'Tous les points de ventes',
            'electricity' => [
                'management' => 'Points d\'électricité',
                'create'     => 'Enregistrer le Point',
                'edit'       => 'Modifier le Point',
                'editMap'       => 'Mettre à jour le GPS',
                'clone'      => 'Cloner le Point',
                'map'        => 'Carte',
            ],
        ],
        'payment' => [
            'main' => 'Paiements',
            'reset_filters' => 'Réinitialiser les Filtres',
            'unpaid' => 'Factures Impayées',
        ],
        
        'log-viewer' => [
            'main'      => 'Gestionnaire de fichiers',
            'dashboard' => 'Tableau de bord',
            'logs'      => 'Journaux',
        ],

        'sidebar' => [
            'dashboard' => 'Tableau de bord',
            'sales' => 'Ventes',
            'quote' => 'Devis d\'installation',
            'horizon' => 'Horizon',
            'general'   => 'Général',
            'history'   => 'Historique',
            'system'    => 'Système',
            'business'  => 'Activités',
            'access'    => 'Accès',
            'hardware'  => 'Matériel',
            'payments' => 'Paiement de Factures'
        ],
        'companies' => [
            'title' => 'Entreprises',
    
            'company' => [
                'management' => 'Entreprises',
                'create'     => 'Créer une entreprise',
                'edit'       => 'Modifier l\'enttreprise',
                'clone'      => 'Cloner l\'entreprise',
            ],
        ],
        
        'quote' => [
            'title' => 'Devis',
            'inventory' => [
                'management' => 'Inventaires',
                'create' => 'Créer l\'Inventaire',
                'edit' => 'Modifier l\'Inventaire',
            ],
            'quote' => [
                'management' => 'Devis',
                'create' => 'Créer le devis',
                'edit' => 'Modifier le devis',
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
                'management' => 'Tarif',
                'edit'       => 'Modifier le Tarif',
                'create'       => 'Créer le Tarif',
            ],
            'commission'   => [
                'management' => 'Frais de Service',
                'create'     => 'Créer les Frais de Service',
                'edit'       => 'Modifier les Frais de Service',
            ],
            'distribution' => [
                'management' => 'Stratégie de Distribution des Commissions',
                'create'     => 'Créer la Stratégie de Distribution',
                'edit'       => 'Modifier la Stratégie de Distribution',
            ],
            'method'       => [
                'management' => 'Modes de paiement',
                'create'     => 'Créer le Mode de Paiement',
                'edit'       => 'Modifier le Mode de Paiement',
            ]
        ],
        'sales'      => [
            'management' => 'Ventes',
            'clear'      => 'Effacer les Filtres',
            'reset'      => 'Réinitialiser les Filtres',
            'create'     => 'Nouveau',
            'quote'      => 'Nouvelle Vente'
        ],
        'accounts' => [
            'title' => 'Comptes',
            'reset' => 'Réinitialiser les Filtres',

            'deposit' => [
                'management' => 'Compte de dépôt',
                'company' => 'Compte de l\'entreprise',
                'view' => 'Voir le compte'
            ],
            'umbrella' => [
                'management' => 'Compte de caisse',
                'view' => 'Voir le compte',
            ],
            'payout'   => [
                'management' => 'Compte Commission',
                'view'       => 'Voir le compte',
            ],
            'point' => [
                'management' => 'Compte du Point de Vente',
                'view'       => 'Voir le compte',
            ]
        ],
        'accounting' => [
            'title' => 'Comptabilité',
            'collections' => [
                'management' => 'Encaissements',
                'view' => 'Voir l\'Encaissement'
            ],
            'provisions' => [
                'management' => 'Approvisionnements',
                'view'       => 'Voir les Approvisionnements',
            ],
            'commissions' => [
                'management' => 'Commissions',
                'view'       => 'Voir les Commissions',
            ],
        ],
        'payments' => [
            'title' => 'Paiements des Factures',
            'view' => 'Voir les Paiements',
            'electricity' => [
                'management' => 'Points d\'électricité',
                'edit' => 'Mettre à jour le Paiement',
                'create' => 'Créer le Paiement',
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
