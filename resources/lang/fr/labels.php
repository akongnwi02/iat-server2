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
        'continue'           => 'Continuer',
        'show'              => 'Voir',
        'toggle_navigation' => 'Navigation',
        'create_new'         => 'Créer nouveau',
        'download'           => 'Télécharger',
        'add'                => 'Ajouter',
        'location'           => 'Obtenir la localisation',
        'map'                => 'Carte',
        'list'               => 'Liste',
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
                'filter' => [
                    'full_name' => 'Nom',
                    'company'   => 'Entreprise',
                    'username'  => 'Nom d\'utilisateur',
                    'confirmed' => 'Confirmé',
                ],
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
                        'paymentmethods' => 'Mode de Paiements',
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
                                'customercommission' => 'Frais de service client',
                                'providercommission' => 'Frais de service fournisseur de service',
                                'commissiondistribution' => 'Stratégie de distribution des Commissions',
                                'total'              => 'service|services'
                            ]
                        ],
                        'paymentmethod' => [
                            'management' => 'Configurer le mode de paiement',
                            'edit'       => 'Mettre à jour le taux de service pour :company',
                            'add'        => 'Ajouter les modes de paiement pour :company',
                            'default'    => 'Utiliser le mode paiement par défaut',
                            'custom'     => 'Définir la personnalisation',
                            'table'      => [
                                'name'               => 'om du mode de paiement',
                                'active'             => 'Actif',
                                'code'               => 'Code',
                                'logo'               => 'Logo',
                                'customercommission' => 'Frais de service du client',
                                'providercommission' => 'Frais du marchand',
                                'total'              => 'mode|modes'
                            ]
                        ]
                    ]
                ],
            ],
        ],
        'services'   => [
            'service'    => [
                'management'      => 'Gestion de service',
                'assign'          => 'Assigner :service to companies',
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
                    'external_rate'         => 'Taux externe par défaut',
                    'min_amount'         => 'Montant minimal',
                    'max_amount'         => 'Montant maximal',
                    'customercommission'    => 'Frais de service par défaut du point de vente',
                    'price'                 => 'Tarifs par défaut',
                    'commissionditribution' => 'Distribution des commissions',
                    'total'                 => 'service|services',
                ],
                'tabs'  => [
                    'titles' => [
                        'profile'       => 'Profil',
                        'companies'     => 'Entreprises',
                        'supply_points' => 'Points de Ventes'
                    ]
                ]
            ],
            'price'        => [
                'management' => 'Tarif des services',
                'edit'       => 'Modifier les tarifs',
                'create'     => 'Créer les tarifs',
                'active'     => 'Activer les tarifs',
                'table'      => [
                    'name'        => 'Nom du tarif',
                    'code'        => 'Code du tarif',
                    'active'      => 'Actif',
                    'amount'      => 'Montant',
                    'description' => 'Description du tarif',
                    'total'       => 'tarif|tarifs',
                ]
            ],
            'commission' => [
                'management'         => 'Frais de service',
                'create'             => 'Créer les frais de services',
                'edit'               => 'Modifier les frais de service',
                'commission_actions' => 'Actions sur les frais de service',
                
                'table' => [
                    'name'        => 'Nom',
                    'description' => 'Description',
                    'currency'    => 'Monnaie',
                    'view'        => 'Afficher la séquence',
                    
                    'total' => 'Frais de service|Frais de services',
                    'stack' => [
                        'title'      => 'Séquence',
                        'from'       => 'De',
                        'to'         => 'A',
                        'percentage' => 'Pourcentage',
                        'fixed'      => 'Fixé',
                        'empty'      => 'Vide',
                    ],
                ],
            ],
            'distribution' => [
                'management' => 'Distribution des commissions',
                'create'     => 'Créer une distribution de commissions',
                'edit'       => 'Modifier une distribution de commissions',
                'table'      => [
                    'agent_rate'    => 'Taux de l\'agent par défaut',
                    'company_rate'  => 'Taux de l\'entreprise par défaut',
                    'external_rate' => 'Taux externe par défaut',
                    'name'          => 'Nom',
                    'description'   => 'Description',
                    'total'         => 'distribution|distributions'
                ]
            ],
            'method'     => [
                'management' => 'Modes de paiement',
                'create'     => 'Créer modes de paiement',
                'assign'     => 'Assigner :method to companies',
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
                        'profile'   => 'Profil',
                        'companies' => 'Entreprises'
                    ]
                ]
            ],
        ],
        'meters'    => [
            'electricity' => 'Compteurs électriques',
            'water'       => 'Compteurs d\'eau',
            'create'      => 'Créer un compteur',
            'edit'        => 'Modifier un compteur',
            'active'      => 'Compteurs actifs',
            'deactivate'  => 'Compteurs inactifs',
            'filter'      => 'Filtrer les compteurs',
            
            'table'    => [
                'meter_code'        => 'Code du compteur',
                'supply_point'      => 'Point de vente',
                'phone'             => 'Contact téléphonique',
                'email'             => 'Email de contact',
                'company'           => 'Entreprise',
                'provider'          => 'Fournisseur',
                'type'              => 'Type',
                'active'            => 'Actif',
                'last_vending_date' => 'Date de dernière recharge',
                'registration_date' => 'Date d\'enregistrement',
                'identifier'        => 'Identifiant externe',
                'location'          => 'Numéro de domaine',
                'total'             => 'compteur|compteurs',
            ],
            'maintain' => [
                'title'        => 'Entretenir un compteur',
                'meter_code'   => 'Code du compteur',
                'type'         => 'Type de Jeton',
                'token'        => 'Jeton',
                'supply_point' => 'Point de vente',
                'address'      => 'Adresse',
                'meter_type'   => 'Type de compteur',
            ]
        ],
        'points'    => [
            'electricity' => 'Points d\'électricité',
            'water'       => 'Points d\'eau',
            'create'      => 'Créer un point',
            'edit'        => 'Modifier un point',
            'editMap'     => 'Mettre à jour le GPS',
            'map'         => 'Carte',
            'active'      => 'Points actifs',
            'deactivate'  => 'Désactiver le point',
            'filter'      => 'Filtrer les Points',
            
            'table' => [
                'name'                => 'Nom',
                'city'                => 'Ville',
                'address'             => 'Adresse',
                'phone'               => 'Contact téléphonique',
                'email'               => 'Email de contact',
                'type'                => 'Type',
                'external_identifier' => 'Numéro de contrat',
                'company'             => 'Entreprise',
                'provider_price'      => 'Tarif du fournisseur',
                'adjusted_price'      => 'Ajuster les tarifs',
                'meter_no'            => 'Numéro de compteur',
                'is_auto_price'       => 'Tarif automatique',
                'is_internal'         => 'Interne',
                'internal'            => 'Interne',
                'auto_price_margin'   => 'Marge du tarif automatique',
                'service_charge'      => 'Frais de service spécifiques',
                'price'               => 'Tarif',
                'tax'                 => 'Taxe',
                'total'               => 'Point de vente|Points de vente',
            ],
        ],
        'sales'     => [
            'management' => 'Ventes',
            'create'     => 'Nouvelle vente',
            'filter'     => [
                'title'          => 'Filtrer les ventes',
                'download'       => 'Télécharger',
                'service'        => 'Service',
                'company'        => 'Entreprise',
                'status'         => 'Statut',
                'agent'          => 'Agent',
                'supply_point'          => 'Point de vente',
                'reference'      => 'Référence',
                'service_number' => 'Numéro de service',
                'from'           => 'De',
                'to'             => 'A',
            ],
            'table'      => [
                'code'                => 'Référence',
                'company'             => 'Entreprise',
                'date'                => 'Date',
                'user'                => 'Agent',
                'items'               => 'Eléments',
                'token'               => 'Jeton',
                'service'             => 'Service',
                'amount'              => 'Montant',
                'customer_fee'        => 'Frais du client',
                'provider_fee'        => 'Frais du fournisseur',
                'currency'            => 'Monnaie',
                'service_number'      => 'Numéro de service',
                'payment_account'     => 'Compte de paiement',
                'system_commission'   => 'Commission du système',
                'supply_point'        => 'Point de vente',
                'supply_point_amount' => 'Montant du point de vente',
                'units'               => 'Unités',
                'price'               => 'Prix Par Uniét',
                'vat'                 => 'TVA (%)',
                'amount_with_vat'     => 'Montant hors TVA',
                'completed_at'        => 'Completé A',
                'user_status'         => 'Statut de l\'utilisateur',
                'actual_status'       => 'Statut actuel',
                'to_be_verified'      => 'A vérifier',
                'total_sales'         => 'vente|ventes',
            ],
            'quote'      => [
                'meter_code'   => 'Code du compteur',
                'meter_type'   => 'Type de compteur',
                'supply_point' => 'Point de vente',
                'address'      => 'Adresse',
                'amount'       => 'Montant',
                'units'        => 'Unités',
                'tariff_name'  => 'Nom du tarif',
                'tariff_price' => 'Tarif Tarif',
            ]
        ],
        
        'account'        => [
            'management'            => 'Compte',
            'company_balance'       => 'Solde de l\'entreprise',
            'float_balance'         => 'Solde de la flotte',
            'umbrella_balance'      => 'Solde en espèces',
            'commission_balance'    => 'Solde de commission',
            'credit'                => 'Créditer le compte',
            'debit'                 => 'Débiter le compte',
            'transfer_to_strongbox' => 'Transférer au coffre-fort',
            'drain'                 => 'Décharger le compte',
            'float'                 => 'Ajouter la flotte',
            'request_payout'        => 'Demander un paiement',
            'filter'     => [
                'title' => 'Filtrer les Comptes',
                'code'   => 'Code',
                'name'   => 'Nom du Compte',
                'company' => 'Entreprise',
                'active' => 'Actif',
            ],
            'deposit'               => [
                'management' => 'Comptes de l\'entreprise',
                'actions'    => 'Actions sur le compte',
                'view'       => 'Voir un compte',
                'table'      => [
                    'code'    => 'Numéro de compte',
                    'type'    => 'Type de compte',
                    'owner'   => 'Titulaire',
                    'company' => 'Entreprise',
                    'active'  => 'Actif',
                    'balance' => 'Solde du compte',
                    'float'   => 'Solde de la flotte',
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
                            'company' => 'Entreprise',
                            'active'  => 'Actif',
                            'balance' => 'Solde du compte',
                            'float'   => 'Solde de la flotte',
                        ],
                        'movements' => [
                            'table' => [
                                'code'             => 'Code',
                                'transaction_code' => 'Référence de la transaction',
                                'amount'           => 'Montant',
                                'type'             => 'Type',
                                'user'             => 'Exécuté par',
                                'source'           => 'Compte source',
                                'destination'      => 'Compte de destination',
                                'date'             => 'Date',
                                'reversal'         => 'Inversion',
                                'cancelled'        => 'annulé',
                                'total'            => 'mouvement|mouvements'
                            ],
                        ],
                        'payments' => [
                            'table' => [
                                'amount'      => 'Montant',
                                'cycle_month' => 'Mois',
                                'cycle_year'  => 'Année',
                                'payment_ref' => 'Référence de paiement',
                                'method'      => 'Mode de paiement',
                                'consumption' => 'Consommation',
                                'bill_number' => 'Numéro de facture',
                                'note'        => 'Remarque',
                            ],
                        ],
                    ],
                ],
            ],
            'point'                 => [
                'management' => 'Comptes du point de vente',
                'actions'    => 'Actions sur le compte',
                'view'       => 'Voir un compte',
                'table'      => [
                    'code'    => 'Numéro de compte',
                    'type'    => 'Type de compte',
                    'owner'   => 'Titulaire',
                    'company' => 'Entreprise',
                    'active'  => 'Actif',
                    'balance' => 'Solde du compte',
                    'total'   => 'compte|comptes'
                ],
                'tabs'       => [
                    'titles'  => [
                        'overview'  => 'Aperçu',
                        'movements' => 'Mouvements',
                        'payments' => 'Paiements',
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
                            'company' => 'Entreprise',
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
                    'external'          => 'Externe',
                    'number_requests'   => 'Nombre de requêtes',
                    'last_request_date' => 'Date de dernière requête',
                    'total'             => 'service|services'
                ],
                'movements'  => [
                    'code'    => 'Numéro de transaction',
                    'amount'  => 'Montant',
                    'comment' => 'Commentaire',
                    'user'    => 'Exécuté par',
                    'date'    => 'Date',
                    'total'   => 'requête|requêtes',
                ]
            ],
            'commission' => [
                'management' => 'Commissions',
                'actions'    => 'Actions sur les commissions',
                'view'       => 'Voir commission',
                'table'      => [
                    'service'           => 'Service',
                    'commission'        => 'Commission',
                    'external'          => 'Externe',
                    'number_requests'   => 'Nombre de requêtes',
                    'last_request_date' => 'Date de dernière requête',
                    'total'             => 'service|services'
                ],
                'movements'  => [
                    'code'    => 'Numéro de transaction',
                    'amount'  => 'Montant',
                    'comment' => 'Comment',
                    'user'    => 'Executed by',
                    'date'    => 'Date',
                    'total'   => 'request|requests',
                ]
            ],
            'collection' => [
                'management' => 'Encaissements',
                'actions'    => 'Actions sur les encaissements',
                'view'       => 'Voir l\'encaissement',
                'table'      => [
                    'service'          => 'Service',
                    'amount'           => 'Montant encaissé',
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
                'management' => 'Monnaie',
                'edit'       => 'Modifier la monnaie',
                'create'     => 'Créer la monnaie',
                'active'     => 'Monnaies actives',
                'table'      => [
                    'name'    => 'Nom de la monnaie',
                    'code'    => 'Code de la monnaie',
                    'active'  => 'Actif',
                    'default' => 'Défaut',
                    'rate'    => 'Taux d\'échange',
                    'total'   => 'monnaie|monnaies',
                ]
            ],
            'cycle'    => [
                'management' => 'Cycle',
                'edit'       => 'Modifier le cycle',
                'create'     => 'Créer le cycle',
                'active'     => 'Cycles actifs',
                'table'      => [
                    'month'             => 'Cycle Mensuel',
                    'year'              => 'Cycle Annuel',
                    'complete'          => 'Complet',
                    'balance'           => 'Solde',
                    'system_commission' => 'Commission du système',
                    'amount_collected'  => 'Montant encaissé',
                    'amount_paid'       => 'Montant encaissé',
                    'total'             => 'cycle|cycles',
                ]
            ]
        ],
        'quote'          => [
            'inventory' => [
                'management' => 'Gestion de l\'inventaire',
                'edit'       => 'Modifier l\'inventaire',
                'create'     => 'Créer l\'inventaire',
                'table'      => [
                    'name_en' => 'Nom Anglais',
                    'name_fr' => 'Nom Français',
                    'total'   => 'inventaire|inventaires'
                ]
            ],
            'quote'     => [
                'management' => 'Devis d\'installation',
                'edit'       => 'Modifier le devis',
                'create'     => 'Créer le devis',
                'show'       => 'Afficher',
                'table'      => [
                    'title'       => 'Titre',
                    'name'        => 'Nom du Client',
                    'phone'       => 'Téléphone du client',
                    'address'     => 'Adresse du Client',
                    'code'        => 'Code',
                    'amount'      => 'Montant',
                    'description' => 'Description',
                    'status'      => 'Statut',
                    'type'        => 'Type',
                    'created_at'  => 'Crée à',
                    'created_by'  => 'Crée par',
                    'empty'       => 'Vide',
                    'total'       => 'devis|devis',
                    'inventories' => [
                        'name'      => 'Nom',
                        'unit_cost' => 'Prix unitaire',
                        'quantity'  => 'Quantité',
                        'sub_total' => 'Sous-total',
                    ]
                ],
                'filter'     => [
                    'title'      => 'Filtrer les devis',
                    'user'       => 'Nom d\'utilisateur',
                    'code'       => 'Code',
                    'customer'   => 'Client',
                    'start_date' => 'De',
                    'end_date'   => 'A',
                    'status'     => 'Statut',
                ],
                'pdf'        => [
                    'invoice'          => 'Fcature',
                    'date'             => 'Date',
                    'department'       => 'Département Commercial',
                    'business_details' => 'Détails de l\'activité',
                    'customer_details' => 'Détails du client',
                    'country'          => 'Cameroun',
                    'description'      => 'Remarques',
                    'table'            => [
                        'title'     => 'Elements',
                        'material'  => 'Nom de l\'élément',
                        'unit_cost' => 'Prix unitaire',
                        'quantity'  => 'Quantité',
                        'sub_total' => 'Sous-total',
                        'tax'       => 'Taxe',
                        'total'     => 'Total',
                    ]
                ]
            ]
        ],
        'payment'        => [
            'electricity' => [
                'management' => 'Electricité',
                'edit'       => 'Modifier le paiement',
                'create'     => 'Créer le paiement',
                'show'       => 'Afficher',
                'table'      => [
                    'company'             => 'Entreprise',
                    'supply_point'        => 'Point de Vente',
                    'external_identifier' => 'Numéro de contrat',
                    'cycle_year'          => 'Cycle Annuel',
                    'is_internal'         => 'Interne',
                    'cycle_month'         => 'Cycle Mensuel',
                    'confirmed'           => 'Confirmé',
                    'amount_collected'    => 'Montant Encaissé',
                    'system_commission'   => 'Commission du système',
                    'amount_paid'         => 'Montant payé',
                    'eneo_consumption'    => 'Consommation',
                    'iat_consumption'     => 'Consommation IAT',
                    'balance'             => 'Solde',
                    'new_tariff'          => 'Nouveau tarif estimatif',
                    'current_tariff'      => 'Tarif en vigueur',
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
