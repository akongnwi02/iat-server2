<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */
    
    'general' => [
        'all'     => 'Tout',
        'yes'     => 'Oui',
        'no'      => 'Non',
        'copyright'          => 'Copyright',
        'custom'  => 'Personnalisé',
        'actions' => 'Actions',
        'active'  => 'Actif',
        'toggle'             => 'Basculer',
        'buttons' => [
            'save'   => 'Enregistrer',
            'update' => 'Mettre à jour',
            'create' => 'Créer',
        ],
        'hide'              => 'Cacher',
        'inactive'          => 'Inactif',
        'none'              => 'Aucun',
        'continue'           => 'Continue',
        'show'              => 'Voir',
        'toggle_navigation' => 'Navigation',
        'create_new'         => 'Créer nouveau',
        'download'           => 'Download',
        'add'                => 'Ajouter',
        'location'           => 'Get Location',
        'map'                => 'Map',
        'list'               => 'List',
        'remove'             => 'Retirer',
        'credit'             => 'Crédit',
        'debit'              => 'Débit',
        'toolbar_btn_groups' => 'Barre d\'outils avec boutons de groupes',
        'more'               => 'Plus',
        'select'             => 'Sélectionnez une option'
    ],
    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Créer un rôle',
                'edit'       => 'Modifier un rôle',
                'management' => 'Gestion des rôles',
                'table' => [
                    'number_of_users' => "Nombre d'utilisateurs",
                    'permissions'     => 'Permissions',
                    'role'            => 'Rôle',
                    'sort'            => 'Trier',
                    'total'           => 'rôle total|rôles total',
                ],
            ],
            'users' => [
                'active'              => 'Utilisateurs actifs',
                'all_permissions'     => 'Toutes les permissions',
                'change_password'     => 'Modifier le mot de passe',
                'change_password_for' => 'Modifier le mot de passe pour :user',
                'transfer_user'       => 'Transférer :utilissatur dans une nouvelle entreprise.',
                'create'              => 'Créer un utilisateur',
                'transfer'            => 'Transférer un utilisateur',
                'deactivated'         => 'Utilisateurs désactivés',
                'deleted'             => 'Utilisateurs supprimés',
                'edit'                => 'Modifier un utilisateur',
                'management'          => 'Gestion des utilisateurs',
                'no_permissions'      => 'Aucune permission',
                'no_roles'            => 'Pas de rôles à déterminer.',
                'permissions'         => 'Permissions',
                'user_actions'        => 'Actions des utilisateurs',
                'table' => [
                    'confirmed'      => 'Confirmé',
                    'created'        => 'Créé',
                    'email'          => 'Email',
                    'username'          => 'Nom d\'utilisateur',
                    'id'             => 'ID',
                    'last_updated'   => 'Dernière mise à jour',
                    'name'           => 'Nom',
                    'first_name'     => 'Prénom',
                    'last_name'      => 'Nom',
                    'no_deactivated' => "Pas d'utilisateurs désactivés",
                    'no_deleted'     => "Pas d'utilisateurs supprimés",
                    'other_permissions' => 'Autres permissions',
                    'company'           => 'Entreprise',
                    'permissions'    => 'Permissions',
                    'abilities'         => 'Fonctions',
                    'roles'          => 'Rôles',
                    'social' => 'Réseau social',
                    'total'          => 'utilisateur total|utilisateurs total',
                ],
                'tabs' => [
                    'titles' => [
                        'overview' => 'Aperçu',
                        'history'  => 'Historique',
                    ],
                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmé',
                            'created_at'   => 'Créé le',
                            'deleted_at'   => 'Supprimé le',
                            'email'        => 'Adresse email',
                            'last_login_at' => 'Dernière connexion à',
                            'last_login_ip' => 'Dernière connexion IP',
                            'last_updated' => 'Dernière mise à jour',
                            'name'         => 'Nom',
                            'first_name'   => 'Prénom',
                            'last_name'    => 'Nom',
                            'username'      => 'Nom d\'utilisateur',
                            'phone'         => 'Telephone',
                            'status'       => 'Statut',
                            'timezone'     => 'Fuseau horaire',
                            'location'     => 'Localisation',
                        ],
                    ],
                ],
                'view' => 'Voir un utilisateur',
            ],
        ],
        'companies'  => [
            'company' => [
                'management'      => 'Gestion de l\'entreprise',
                'create'          => 'Créer une entreprise',
                'edit'            => 'Modifier une entreprise',
                'active'          => 'Entreprises actives',
                'company_actions' => 'Actions des entreprises',
                'table' => [
                    'name'         => 'Nom de l\'entreprise',
                    'address'      => 'Adresse',
                    'country'      => 'Pays',
                    'state'        => 'Région',
                    'city'         => 'Ville',
                    'phone'        => 'Numéro de téléphone de l\'entreprise',
                    'type'         => 'Type d\'entreprise',
                    'email'        => 'Email de l\'entreprise',
                    'street'       => 'Rue',
                    'website'      => 'Site web',
                    'postal_code'  => 'Code  postal',
                    'size'         => 'Taille',
                    'last_updated' => 'Taille',
                    'active'       => 'Actif',
                    'total'        => 'entreprise|entreprises',
                ],
                'tabs'  => [
                    'titles'  => [
                        'profile'  => 'Profil',
                        'services' => 'Services',
                        'paymentmethods' => 'Payment Methods',
                    ],
                    'content' => [
                        'service' => [
                            'management' => 'Frais de service',
                            'edit'       => 'Mettre à jour les frais de service pour :company',
                            'add'        => 'Ajouter les services pour :company',
                            'default'    => 'Utiliser le service par défaut',
                            'custom'     => 'Personnalisation',
                            'table'      => [
                                'name'               => 'Nom du service',
                                'category'           => 'Catégorie du service',
                                'gateway'            => 'Configuration de la passerelle',
                                'active'             => 'Actif',
                                'code'               => 'Code',
                                'logo'               => 'Logo',
                                'company_rate'       => 'Taux spécifique à l\'entreprise (%)',
                                'agent_rate'         => 'Taux spécifique à l\'agent (%)',
                                'customercommission' => 'Frais de service client',
                                'providercommission' => 'Frais de service fournisseur de service',
                                'total'              => 'service|services'
                            ]
                        ],
                        'paymentmethod' => [
                            'management' => 'Configure Payment Method',
                            'edit'       => 'Update service rate for :company',
                            'add'        => 'Add payment methods for :company',
                            'default'    => 'Use payment method default',
                            'custom'     => 'Set custom',
                            'table'      => [
                                'name'               => 'Payment Method Name',
                                'active'             => 'Active',
                                'code'               => 'Code',
                                'logo'               => 'Logo',
                                'customercommission' => 'Customer Service Charge',
                                'providercommission' => 'Merchant Fee',
                                'total'              => 'method|methods'
                            ]
                        ]
                    ]
                ],
            ],
        ],
        'services'   => [
            'service'    => [
                'management'      => 'Gestion de service',
                'assign'          => 'Assign :service to companies',
                'create'          => 'Créer un service',
                'edit'            => 'Modifier le service',
                'active'          => 'Services activées',
                'service_actions' => 'Actions de service',
                
                'table' => [
                    'name'               => 'Nom du service',
                    'code'               => 'Code du service',
                    'active'             => 'Actif',
                    'logo'               => 'Logo',
                    'gateway'            => 'Passerelle',
                    'category'           => 'Catégorie',
                    'agent_rate'         => 'Taux par défaut de l\'agent',
                    'company_rate'       => 'Taux par défaut de l\'entreprise',
                    'external_rate'         => 'Default External Rate',
                    'min_amount'         => 'Montant minimal',
                    'max_amount'         => 'Montant maximal',
                    'customercommission'    => 'Default Supply Point Service Charge',
                    'price'                 => 'Default Tariff',
                    'commissionditribution' => 'Commission Distribution',
                    'total'                 => 'service|services',
                ],
                'tabs'  => [
                    'titles' => [
                        'profile'       => 'Profile',
                        'companies'     => 'Companies',
                        'supply_points' => 'Supply Points'
                    ]
                ]
            ],
            'price'        => [
                'management' => 'Service Tariff',
                'edit'       => 'Edit Tariff',
                'create'     => 'Create Tariff',
                'active'     => 'Active Tariff',
                'table'      => [
                    'name'        => 'Tariff Name',
                    'code'        => 'Tariff Code',
                    'active'      => 'Active',
                    'amount'      => 'Amount',
                    'description' => 'Tariff Description',
                    'total'       => 'tariff|tariffs',
                ]
            ],
            'commission' => [
                'management'         => 'Frais de service',
                'create'             => 'Créer les frais de services',
                'edit'               => 'Modifier les frais de service',
                'commission_actions' => 'Actions en matière de frais de service',
                
                'table' => [
                    'name'        => 'Nom',
                    'description' => 'Description',
                    'currency'    => 'Devise',
                    'view'        => 'Voir Stack',
                    
                    'total' => 'Frais de service|Frais de services',
                    'stack' => [
                        'title'      => 'Stack',
                        'from'       => 'De',
                        'to'         => 'A',
                        'percentage' => 'Pourcentage',
                        'fixed'      => 'Fixé',
                        'empty'      => 'Vide',
                    ],
                ],
            ],
            'distribution' => [
                'management' => 'Commission Distribution',
                'create'     => 'Create Commission Distribution',
                'edit'       => 'Edit Commission Distribution',
                'table'      => [
                    'agent_rate'    => 'Default Agent Rate',
                    'company_rate'  => 'Default Company Rate',
                    'external_rate' => 'Default External Rate',
                    'name'          => 'Name',
                    'description'   => 'Description',
                    'total'         => 'distribution|distributions'
                ]
            ],
            'method'     => [
                'management' => 'Modes de paiement',
                'create'     => 'Créer modes de paiement',
                'assign'     => 'Assign :method to companies',
                'edit'       => 'Modifier modes de paiement',
                'table'      => [
                    'name'               => 'Nom',
                    'description_en'     => 'Description En',
                    'description_fr'     => 'Description Fr',
                    'code'               => 'Code',
                    'active'             => 'Actif',
                    'realtime'           => 'Temps réel',
                    'service'            => 'Service',
                    'logo'               => 'Logo',
                    'customercommission' => 'Frais de service du client',
                    'providercommission' => 'Frais de service du fournisseur de service',
                    'total'              => 'mode de paiement|modes de paiements',
                ],
                'tabs'       => [
                    'titles' => [
                        'profile'   => 'Profile',
                        'companies' => 'Companies'
                    ]
                ]
            ],
        ],
        'meters'    => [
            'electricity' => 'Electricity Meters',
            'water'       => 'Water Meters',
            'create'      => 'Create Meter',
            'edit'        => 'Edit Meter',
            'active'      => 'Active Meters',
            'deactivate'  => 'Deactivate Meter',
            'filter'      => 'Filter Meters',
            
            'table'    => [
                'meter_code'        => 'Meter Code',
                'supply_point'      => 'Supply Point',
                'phone'             => 'Contact Phone',
                'email'             => 'Contact Email',
                'company'           => 'Company',
                'provider'          => 'Provider',
                'type'              => 'Type',
                'active'            => 'Active',
                'last_vending_date' => 'Last Recharge Date',
                'registration_date' => 'Registration Date',
                'identifier'        => 'External Identifier',
                'location'          => 'Room Number',
                'total'             => 'meter|Meters',
            ],
            'maintain' => [
                'title'        => 'Maintain Meter',
                'meter_code'   => 'Meter Code',
                'type'         => 'Token Type',
                'token'        => 'Token',
                'supply_point' => 'Supply Point',
                'address'      => 'Address',
                'meter_type'   => 'Meter Type',
            ]
        ],
        'points'    => [
            'electricity' => 'Electricity Points',
            'water'       => 'Water Points',
            'create'      => 'Create Point',
            'edit'        => 'Edit Point',
            'editMap'     => 'Update GPS',
            'map'         => 'Map',
            'active'      => 'Active Points',
            'deactivate'  => 'Deactivate Point',
            'filter'      => 'Filter Points',
            
            'table' => [
                'name'                => 'Name',
                'city'                => 'City',
                'address'             => 'Address',
                'phone'               => 'Contact Phone',
                'email'               => 'Contact Email',
                'type'                => 'Type',
                'external_identifier' => 'ENEO Contract Number',
                'company'             => 'Company',
                'provider_price'      => 'Provider\'s Tariff',
                'adjusted_price'      => 'Adjusted Tariff',
                'meter_no'            => 'Meter Number',
                'is_auto_price'       => 'Auto Tariff',
                'is_internal'         => 'Internal',
                'internal'            => 'Internal',
                'auto_price_margin'   => 'Auto Tariff Margin',
                'service_charge'      => 'Specific Service Charge',
                'price'               => 'Tariff',
                'tax'                 => 'Tax',
                'total'               => 'Supply point|Supply points',
            ],
        ],
        'sales'     => [
            'management' => 'Sales',
            'create'     => 'New Sale',
            'filter'     => [
                'title'          => 'Filter Sales',
                'download'       => 'Download',
                'service'        => 'Service',
                'company'        => 'Company',
                'status'         => 'Status',
                'agent'          => 'Agent',
                'supply_point'          => 'Supply Point',
                'reference'      => 'Reference',
                'service_number' => 'Service Number',
                'from'           => 'From',
                'to'             => 'To',
            ],
            'table'      => [
                'code'                => 'Reference',
                'company'             => 'Company',
                'date'                => 'Date',
                'user'                => 'Agent',
                'items'               => 'Items',
                'token'               => 'Token',
                'service'             => 'Service',
                'amount'              => 'Amount',
                'customer_fee'        => 'Customer Fee',
                'provider_fee'        => 'Provider Fee',
                'currency'            => 'Currency',
                'service_number'      => 'Service Number',
                'payment_account'     => 'Payment Account',
                'system_commission'   => 'System Commission',
                'supply_point'        => 'Supply Point',
                'supply_point_amount' => 'Supply Point Amount',
                'units'               => 'Units',
                'price'               => 'Price Per Unit',
                'vat'                 => 'VAT (%)',
                'amount_with_vat'     => 'Amount Minus VAT',
                'completed_at'        => 'Completed At',
                'user_status'         => 'User\'s Status',
                'actual_status'       => 'Actual Status',
                'to_be_verified'      => 'To be verified',
                'total_sales'         => 'sale|sales',
            ],
            'quote'      => [
                'meter_code'   => 'Meter Code',
                'meter_type'   => 'Meter Type',
                'supply_point' => 'Supply Point',
                'address'      => 'Address',
                'amount'       => 'Amount',
                'units'        => 'Units',
                'tariff_name'  => 'Tariff Name',
                'tariff_price' => 'Tariff Tariff',
            ]
        ],
        
        'account'        => [
            'management'            => 'Account',
            'company_balance'       => 'Company Balance',
            'float_balance'         => 'Float Balance',
            'umbrella_balance'      => 'Solde en espèces',
            'commission_balance'    => 'Solde de commission',
            'credit'                => 'Créditer le compte',
            'debit'                 => 'Débiter le compte',
            'transfer_to_strongbox' => 'Transférer au coffre-fort',
            'drain'                 => 'Décharger le compte',
            'float'                 => 'Ajouter la flotte',
            'request_payout'        => 'Demander un paiement',
            'deposit'               => [
                'management' => 'Company Accounts',
                'actions'    => 'Account Actions',
                'view'       => 'View Account',
                'table'      => [
                    'code'    => 'Account Number',
                    'type'    => 'Account Type',
                    'owner'   => 'Owner',
                    'company' => 'Company',
                    'active'  => 'Active',
                    'balance' => 'Account Balance',
                    'float'   => 'Float Balance',
                    'total'   => 'account|accounts'
                ],
                'tabs'       => [
                    'titles'  => [
                        'overview'  => 'Overview',
                        'movements' => 'Movements',
                    ],
                    'content' => [
                        'overview'  => [
                            'code'    => 'Account Number',
                            'type'    => 'Account Type',
                            'owner'   => 'Owner',
                            'company' => 'Company',
                            'active'  => 'Active',
                            'balance' => 'Account Balance',
                            'float'   => 'Float Balance',
                        ],
                        'movements' => [
                            'table' => [
                                'code'             => 'Code',
                                'transaction_code' => 'Transaction Reference',
                                'amount'           => 'Amount',
                                'type'             => 'Type',
                                'user'             => 'Executed By',
                                'source'           => 'Source Account',
                                'destination'      => 'Destination Account',
                                'date'             => 'Date',
                                'reversal'         => 'reversal',
                                'cancelled'        => 'cancelled',
                                'total'            => 'movement|movements'
                            ],
                        ],
                    ],
                ],
            ],
            'point'                 => [
                'management' => 'Supply Point Accounts',
                'actions'    => 'Account Actions',
                'view'       => 'View Account',
                'table'      => [
                    'code'    => 'Numéro de compte',
                    'type'    => 'Type de compte',
                    'owner'   => 'Titulaire',
                    'company' => 'Company',
                    'active'  => 'Actif',
                    'balance' => 'Solde du compte',
                    'total'   => 'compte|comptes'
                ],
                'tabs'       => [
                    'titles'  => [
                        'overview'  => 'Aperçu',
                        'movements' => 'Mouvements',
                    ],
                    'content' => [
                        'overview'  => [
                            'code'    => 'Numéro de compte',
                            'type'    => 'Type de compte',
                            'owner'   => 'Titulaire',
                            'active'  => 'Actif',
                            'balance' => 'Solde du compte',
                        ],
                        'movements' => [
                            'table' => [
                                'code'        => 'Numéro de transaction',
                                'transaction_code' => 'Transaction Reference',
                                'amount'      => 'Montant',
                                'type'        => 'Type',
                                'user'        => 'Exécuté par',
                                'source'      => 'Compte fournisseur',
                                'destination' => 'Compte de destination',
                                'date'        => 'Date',
                                'reversal'    => 'inversion',
                                'cancelled'   => 'annulée',
                                'total'       => 'mouvement|mouvements'
                            ],
                        ],
                    ],
                ],
            ],
            'umbrella'              => [
                'management' => 'Comptes espèces',
                'actions'    => 'Actions sur le compte',
                'view'       => 'Voir le compte',
                'table'      => [
                    'code'    => 'Numéro de compte',
                    'owner'   => 'Titulaire',
                    'active'  => 'Actif',
                    'balance' => 'Solde',
                    'total'   => 'Compte|Comptes',
                    'user'    => 'Utilisateur',
                    'company' => 'Company',
                ],
                'tabs'       => [
                    'titles'  => [
                        'overview'  => 'Aperçu',
                        'movements' => 'Mouvements',
                    ],
                    'content' => [
                        'overview'  => [
                            'code'    => 'Numéro de compte',
                            'user'    => 'Utilisateur',
                            'company' => 'Company',
                            'balance' => 'Solde du compte',
                        ],
                        'movements' => [
                            'table' => [
                                'code'    => 'Numéro de transaction',
                                'amount'  => 'Montant',
                                'comment' => 'Commentaire',
                                'account' => 'Compte',
                                'user'    => 'Exécuté par',
                                'company' => 'Entreprise',
                                'date'    => 'Date',
                                'total'   => 'mouvement|mouvements',
                            ],
                        ],
                    ],
                ],
            ],
            'payout'                => [
                'management' => 'Comptes de Commission',
                'actions'    => 'Actions sur le compte',
                'view'       => 'Voir le compte',
                'table'      => [
                    'code'    => 'Numéro de compte',
                    'balance' => 'Solde de commission',
                    'pending' => 'En attente',
                    'total'   => 'Compte|comptes',
                    'owner'   => 'Titulaire',
                    'type'    => 'Type',
                ],
                'tabs'       => [
                    'titles'  => [
                        'overview'  => 'Aperçu',
                        'movements' => 'Mouvements',
                    ],
                    'content' => [
                        'overview'  => [
                            'code'    => 'Numéro de compte',
                            'type'    => 'Type de compte',
                            'owner'   => 'Titulaire',
                            'balance' => 'Solde de commission',
                        ],
                        'movements' => [
                            'table' => [
                                'code'        => 'Numéro de transaction',
                                'amount'      => 'Montant',
                                'method'      => 'Mode de paiement',
                                'number'      => 'Numéro de compte',
                                'comment'     => 'Commentaire',
                                'name'        => 'Nom du compte',
                                'account'     => 'Compte',
                                'user'        => 'Demandé par',
                                'date'        => 'Demandé à',
                                'company'     => 'Entreprise',
                                'status'      => 'Statut',
                                'decision_by' => 'Décision par',
                                'decision_at' => 'Décision à',
                                'total'       => 'mouvement|mouvements',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'accounting' => [
            'pay'        => 'Payer les collectes',
            'request'    => 'Demande de provision',
            'provision'  => [
                'management' => 'Provisions',
                'actions'    => 'Actions sur provision',
                'view'       => 'Voir Provision',
                'table'      => [
                    'service'           => 'Service',
                    'commission'        => 'Commission',
                    'external'          => 'External',
                    'number_requests'   => 'Number of requests',
                    'last_request_date' => 'Last request date',
                    'total'             => 'service|services'
                ],
                'movements'  => [
                    'code'    => 'Numéro de transaction',
                    'amount'  => 'Montant',
                    'comment' => 'Commentaire',
                    'user'    => 'Exécuté par',
                    'date'    => 'Date',
                    'total'   => 'request|requests',
                ]
            ],
            'commission' => [
                'management' => 'Commissions',
                'actions'    => 'Commission Actions',
                'view'       => 'View Commission',
                'table'      => [
                    'service'           => 'Service',
                    'commission'        => 'Commission',
                    'external'          => 'External',
                    'number_requests'   => 'Number of requests',
                    'last_request_date' => 'Last request date',
                    'total'             => 'service|services'
                ],
                'movements'  => [
                    'code'    => 'Transaction Number',
                    'amount'  => 'Amount',
                    'comment' => 'Comment',
                    'user'    => 'Executed by',
                    'date'    => 'Date',
                    'total'   => 'request|requests',
                ]
            ],
            'collection' => [
                'management' => 'Collectes',
                'actions'    => 'Actions sur les collectes',
                'view'       => 'Voir la collecte',
                'table'      => [
                    'service'          => 'Service',
                    'amount'           => 'Montant collecté',
                    'number_payments'  => 'Nombre de paiements',
                    'last_payout_date' => 'Date de derner paiement',
                    'total'            => 'service|services'
                ],
                'movements'  => [
                    'code'    => 'Numéro de transaction',
                    'amount'  => 'Montant',
                    'comment' => 'Commentaire',
                    'user'    => 'Exécuté par',
                    'date'    => 'Date',
                    'total'   => 'paiement|paiements',
                ]
            ],
        ],
        'administration' => [
            'currency' => [
                'management' => 'Currency',
                'edit'       => 'Edit Currency',
                'create'     => 'Create Currency',
                'active'     => 'Active Currencies',
                'table'      => [
                    'name'    => 'Currency Name',
                    'code'    => 'Currency Code',
                    'active'  => 'Active',
                    'default' => 'Default',
                    'rate'    => 'Exchange Rate',
                    'total'   => 'currency|currencies',
                ]
            ],
            'cycle'    => [
                'management' => 'Cycle',
                'edit'       => 'Edit Cycle',
                'create'     => 'Create Cycle',
                'active'     => 'Active Cycles',
                'table'      => [
                    'month'             => 'Cycle Month',
                    'year'              => 'Cycle Year',
                    'complete'          => 'Complete',
                    'balance'           => 'Balance',
                    'system_commission' => 'System Commission',
                    'amount_collected'  => 'Amount Collected',
                    'amount_paid'       => 'Amount Paid',
                    'total'             => 'cycle|cycles',
                ]
            ]
        ],
        'quote'          => [
            'inventory' => [
                'management' => 'Inventory Management',
                'edit'       => 'Edit Inventory',
                'create'     => 'Create Inventory',
                'table'      => [
                    'name_en' => 'English Name',
                    'name_fr' => 'French Name',
                    'total'   => 'inventory|inventories'
                ]
            ],
            'quote'     => [
                'management' => 'Installation Quotes',
                'edit'       => 'Edit Quote',
                'create'     => 'Create Quote',
                'show'       => 'Show',
                'table'      => [
                    'title'       => 'Title',
                    'name'        => 'Customer Name',
                    'phone'       => 'Customer phone',
                    'address'     => 'Customer Address',
                    'code'        => 'Code',
                    'amount'      => 'Amount',
                    'description' => 'Description',
                    'status'      => 'Status',
                    'type'        => 'Type',
                    'created_at'  => 'Created At',
                    'created_by'  => 'Created By',
                    'empty'       => 'Empty',
                    'total'       => 'quote|quotes',
                    'inventories' => [
                        'name'      => 'Name',
                        'unit_cost' => 'Unit Cost',
                        'quantity'  => 'Quantity',
                        'sub_total' => 'Sub Total',
                    ]
                ],
                'filter'     => [
                    'title'      => 'Filter Quotes',
                    'user'       => 'Username',
                    'code'       => 'Code',
                    'customer'   => 'Customer',
                    'start_date' => 'From',
                    'end_date'   => 'To',
                    'status'     => 'Status',
                ],
                'pdf'        => [
                    'invoice'          => 'Invoice',
                    'date'             => 'Date',
                    'department'       => 'Commercial Department',
                    'business_details' => 'Business Details',
                    'customer_details' => 'Customer Details',
                    'country'          => 'Cameroon',
                    'description'      => 'Notes',
                    'table'            => [
                        'title'     => 'Items',
                        'material'  => 'Item Name',
                        'unit_cost' => 'Unit Cost',
                        'quantity'  => 'Quantity',
                        'sub_total' => 'Sub Total',
                        'tax'       => 'Tax',
                        'total'     => 'Total',
                    ]
                ]
            ]
        ],
        'payment'        => [
            'electricity' => [
                'management' => 'Electricity',
                'edit'       => 'Edit Payment',
                'create'     => 'Create Payment',
                'show'       => 'Show',
                'table'      => [
                    'company'             => 'Company',
                    'supply_point'        => 'Supply Point',
                    'external_identifier' => 'Contract Number',
                    'cycle_year'          => 'Cycle Year',
                    'is_internal'         => 'Internal',
                    'cycle_month'         => 'Cycle Month',
                    'confirmed'           => 'Confirmed',
                    'amount_collected'    => 'Amount Collected',
                    'system_commission'   => 'System Commission',
                    'amount_paid'         => 'Amount Paid Out',
                    'eneo_consumption'    => 'ENEO Consumption',
                    'iat_consumption'     => 'IAT Consumption',
                    'balance'             => 'Balance',
                    'new_tariff'          => 'Estimated New Tariff',
                    'current_tariff'      => 'Current Tariff',
                    'total'               => 'points|point'
                ]
            ]
        ]
    ],
    'frontend' => [
        'auth' => [
            'login_box_title'    => 'Connexion',
            'login_to_account'   => 'Connectez-vous à votre compte',
            'create_account'     => 'Créer votre compte',
            'login_button'       => 'Entrer',
            'login_with'         => 'Se connecter avec :réseau social',
            'register_box_title' => "S'enregistrer",
            'register_now'       => 'S\'inscrire maintenant!',
            'no_account'         => 'Vous n\'avez pas encore de compte',
            'quick'              => ' C\'est rapide et facile.',
            'register_button'    => 'Créer le compte',
            'remember_me'        => 'Se souvenir de moi',
        ],
        'contact' => [
            'box_title' => 'Contactez-nous',
            'button' => 'Envoyer le message',
        ],
        'confirm'   => [
            'confirm_account_box_title' => 'Confirmez votre compte',
            'confirm_account_button'    => 'Confirmer le compte',
        ],
        'passwords' => [
            'expired_password_box_title'      => 'Votre mot de passe a expiré.',
            'forgot_password'                 => 'Avez-vous oublié votre mot de passe;?',
            'reset_password_box_title'        => 'Réinitialisation du mot de passe',
            'reset_password_button'           => 'Réinitialiser le mot de passe',
            'update_password_button'          => 'Mise à jour du mot de passe',
            'send_password_reset_link_button' => 'Envoyer le lien de réinitialisation',
            'send_password_reset_code'        => 'Envoyer le code de réinitialisation du mot de passe',
            'confirm_code_button'             => 'Confirmer le code',
        ],
        'user' => [
            'passwords' => [
                'change' => 'Modifier le mot de passe',
            ],
            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Crée le',
                'edit_information'   => 'Modifier les informations',
                'email'              => 'Adresse email',
                'company'            => 'Entreprise',
                'phone'              => 'Telephone',
                'username'           => 'Nom d\'uutilisateur',
                'last_updated'       => 'Date de dernière mise à jour',
                'name'               => 'Nom',
                'first_name'         => 'Prénom',
                'last_name'          => 'Nom',
                'update_information' => 'Mettre à jour les informations',
            ],
        ],
    ],
];
