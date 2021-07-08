<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Strings Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in strings throughout the system.
    | Regardless where it is placed, a string can be listed here so it is easily
    | found in a intuitive way.
    |
    */
    
    'backend'  => [
        'access' => [
            'users' => [
                'delete_user_confirm'  => 'Êtes-vous sûr de vouloir supprimer cet utilisateur de façon permanente ? Toutes les références à cet utilisateur dans cette application peuvent provoquer des erreurs et cette opération ne peut être annulée.',
                'if_confirmed_off'     => '(Si confirmé est désactivé)',
                'no_deactivated'       => 'Il n\'y a aucun utilisateur désactivé.',
                'no_deleted'           => 'Il y a aucun utilisateur supprimé.',
                'restore_user_confirm' => 'Remettre cet utilisateur dans son statut d\'origine ?',
            ],
        ],
        'meters' => [
            'maintain' => 'Generate :type token'
        ],
        
        'dashboard' => [
            'title'   => "Tableau de bord",
            'welcome' => 'Bienvenue',
            'company' => [
                'agents'                  => 'Agents',
                'users'                   => 'Utilisateur|Utilisateurs',
                'balance'                 => 'Solde du compte',
                'float'           => 'Float Balance',
                'number'                  => 'Numéro de compte de l\'entreprise',
                'commission'              => 'Solde de commission',
                'system_commission'       => 'Commission du système',
                'commission_today'        => 'Commission du jour',
                'commission_today_help'   => 'Commission gagné aujourd\'hui',
                'agents_balance'          => 'Solde des agents',
                'agents_commission'       => 'Commission des agents',
                'total_balance'           => 'Solde total',
                'total_commission'        => 'Commission Total ',
                'balance_help'            => 'Le solde du compte de l\'entreprise',
                'float_balance_help'            => 'The company\'s float balance',
                'agents_balance_help'     => 'Le solde du compte de tous les agents',
                'agents_commission_help'  => 'Le commissions de tous les agents',
                'total_balance_help'      => 'Solde total de l\'agent et de l\'entreprise',
                'commission_help'         => 'Solde de commission de l\'entreprise',
                'strong_box_balance'      => 'Coffre-fort',
                'strong_box_balance_help' => 'Le solde du coffre-fort de l\'entreprise',
                'total_commission_help'   => 'commissions totales de l\'agent et l\'entreprise',
                'system_commission_help'  => 'Solde de commission du système',
            ],
            'user'    => [
                'balance'         => 'Votre solde',
                'balance_help'    => 'Votre solde disponible',
                'commission'      => 'Vos commissions',
                'commission_help' => 'Vos commissions disponibles'
            ]
        ],
        'general' => [
            'all_rights_reserved' => 'Tous droits réservés.',
            'are_you_sure'        => 'Êtes-vous sûr ?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'corlang_link'        => 'Corlang Limited',
            'powered_by'          => 'Powered by',
            'continue'            => 'Continuer',
            'member_since'        => 'Membre depuis',
            'minutes'             => ' minutes.',
            'search_placeholder'  => 'Rechercher...',
            'timeout'             => 'Pour des raisons de sécurité, vous avez été automatiquement déconnecté pour cause d\'inactivité. ',

            'see_all' => [
                'messages'      => 'Voir tous les messages',
                'notifications' => 'Voir toutes les notifications',
                'tasks'         => 'Voir toutes les tâches',
            ],
            'status' => [
                'online'  => 'En ligne',
                'offline' => 'Hors ligne',
            ],
            'you_have' => [
                'messages'      => "{0} Vous n'avez pas de message|{1} Vous avez 1 message|[2,Inf] Vous avez :number messages",
                'notifications' => "{0} Vous n'avez pas de notification|{1} Vous avez 1 notification|[2,Inf] Vous avez :number notifications",
                'tasks'         => "{0} Vous n'avez pas de tâche affectée|{1} Vous avez 1 tâche affectée|[2,Inf] Vous avez :number tâches affectées",
            ],
        ],
        'search' => [
            'empty'      => 'Veuillez entrer un terme de recherche.',
            'incomplete' => 'Vous devez mettre en place votre protocole pour ce système.',
            'title'      => 'Résultats de recherche',
            'results'    => 'Résultats de la recherche :query',
        ],
        'welcome'   => 'Welcome to the Dashboard',
        'bill_payment' => [
            'money_transfer' => 'Money Transfer',
            'bill_settlement' => 'Bill Settlement',
        ]
    ],
    'emails' => [
        'auth' => [
            'account_confirmed' => 'Votre compte a été confirmé.',
            'error'                   => 'Oups !',
            'greeting'                => 'Bonjour !',
            'user_greeting'           => 'Hello :first_name!',
            'regards'                 => 'Salutations,',
            'trouble_clicking_button' => "Si vous avez des difficultés à cliquer sur le bouton ':action_text', copiez et collez l'URL ci-dessous dans un navigateur:",
            'thank_you_for_using_app' => "Merci d'utiliser notre application !",

            'password_reset_subject'    => 'Réinitialisation du mot de passe',
            'password_cause_of_email'   => 'Vous recevez cet email car nous avons reçu une demande de réinitialisation de mot de passe pour ce compte.',
            'password_if_not_requested' => "Si vous n'avez pas effectué cette demande, aucune autre action n'est requise.",
            'reset_password'            => 'Cliquez ici pour réinitialiser votre mot de passe',

            'click_to_confirm' => 'Cliquez ici pour confirmer votre compte :',
            'use_code_to_confirm'     => 'Utilisez le code ci-dessous pour confirmer votre compte:',
            'use_code_to_reset_email' => 'Utilisez le code ci-dessous pour réinitialiser votre mot de passe:',
            'use_code_to_confirm_sms' => 'Hello :first_name! Utilisez le code :code de confirmation de votre compte sur :app_name.',
            'use_code_to_reset_sms'   => 'Hello :first_name! Utilisez le code :code de réinitialisation de votre mot de passe sur :app_name.',

            'login_sms' => 'Visitez notre site web pour vous connecter à votre compte.'
        ],
        'companies' => [
            'companies' => [
                'sms'  => [
                    'company_created' => 'Hello :first_name! vos entreprises :le compte a été créé avec succès sur :app_name. ',
                    'login'           => 'Visitez notre site web pour vous connecter à votre compte.'
                ],
                'mail' => [
                    'company_created'         => 'Entreprise créé',
                    'company_account_created' => 'votre entreprise :account a été créé avec succès sur :app_nme.',
                ],
            ]
        ],
        'contact' => [
            'email_body_title' => 'Vous avez une nouvelle demande de formulaire de contact : Vous trouverez les détails ci-dessous :',
            'subject' => 'Un nouveau formulaire de contact :app_name !',
        ],
        'general' => [
            'user_greeting' => 'Hello :first_name!',
            'login'         => 'Cliquez ici pour vous connecter à votre compte:',
            'regards'       => 'Salutations,',
            'greeting'      => 'Hello!',
        ],
    ],
    'description' => [
        'points' => [
            'electricity' => [
                'auto_price_margin' => 'The margin maintained between the provider\'s price and internal price when auto price adjustment is turned on.',
                'price' => 'Only required when auto price calculation is turned off',
            ]
        ]
    ],
    'frontend' => [
        'test' => 'Test',
        'tests' => [
            'based_on' => [
                'permission' => 'Sur la base d\'une autorisation : ',
                'role'       => 'Sur la base du rôle : ',
            ],
            'js_injected_from_controller' => 'Javascript injecté depuis un lgiciel de contrôle',
            'using_blade_extensions' => 'Utilisation des extensions Blade',
            'using_access_helper' => [
                'array_permissions'     => "L'utilisateur doit disposer de toutes les permissions identifiées soit par son ID, soit par son nom.",
                'array_permissions_not' => "L'utilisateur doit disposer d'au moins une permission identifiée soit par son ID, soit par son nom.",
                'array_roles'           => "L'utilisateur doit disposer de tous les rôles identifiés soit par son ID, soit par son nom.",
                'array_roles_not'       => "L'utilisateur doit disposer d'au moins un des rôles, identifiés soit par son ID, soit par son nom.",
                'permission_id'         => "L'utilisateur doit avoir une permission identifiée par son ID",
                'permission_name'       => "L'utilisateur doit avoir une permission identifiée par son nom",
                'role_id'               => "L'utilisateur doit avoir un rôle identifié par son ID",
                'role_name'             => "L'utilisateur doit avoir un rôle identifié par son nom",
            ],
            'view_console_it_works'          => 'Sur la commande du navigateur, vous devriez voir \'ça marche!\', ce qui est produit depuis le FrontendController@index',
            'you_can_see_because'            => 'Vous voyez ce message car vous disposez du rôle \':role\' !',
            'you_can_see_because_permission' => 'Vous voyez ce message car vous avez la permission \':permission\' !',
        ],
        'general' => [
            'joined'        => 'A rejoint',
        ],
        'user'                    => [
            'change_email_notice'         => 'If you change your e-mail you will have to confirm your new e-mail address.',
            'change_phone_notice'         => 'If you change your phone number, you will have to confirm your new phone number',
            'email_changed_notice'        => 'You must confirm your new e-mail address before you can log in again.',
            'cannot_change_email_notice'  => 'You cannot change your e-mail address. This is your default notification means',
            'cannot_change_phone_notice'  => 'You cannot change your phone number. This is your default notification means',
            'profile_updated'             => 'Profile successfully updated.',
            'password_updated'            => 'Password successfully updated.',
            'pin_changed'                 => 'Your pin code was changed successfully.',
            'pin_created'                 => 'Your pin code was created successfully.',
            'topup_updated'               => 'Your Topup configuration has been updated successfully. You can now recharge your account',
            'topup_account_change_notice' => 'Once a topup account is confirmed by the system, it cannot be changed except you contact support.',
            'configure_topup'             => 'Please configure your account recharge methods'
        ],
        'welcome_to' => 'Bienvenue sur :place',
        'what_we_do'              => 'Ce que nous faisons',
        'our_services'            => 'Nos services',
        'how_to_become_a_partner' => 'Comment devenir partenaire',
        'our_partners'            => 'Nos partenaires',
        'services' => [
            'prepaid_bills'    => [
                'title'       => 'Factures de services publics prépayées',
                'description' => 'Notre plateforme facilite le prépaiement des services publics par le biais de la souscription d\'un compteur au domicile du client',
            ],
            'postpaid_bills'   => [
                'title'       => 'Factures de services publics postpayées',
                'description' => 'Nous facilitons le paiement des factures de services publics post-payées, telles que les factures d\'électricité et d\'eau.',
            ],
            'mobile_money'     => [
                'title'       => 'Services Mobile Money',
                'description' => 'Gardez, envoyez et recevez de l\'argent grâce à notre plateforme.',
            ],
            'airtime_recharge' => [
                'title'       => 'Recharge de crédit de communication',
                'description' => 'Nous facilitons l\'achat de crédit d\'appels, de données mobiles, de sms, etc. auprès de votre fournisseur de services.'
            ],
            'ticket' => [
                'title' => 'Tickets',
                'description' => 'Achetez vos billets facilement dans nos points de vente. Cinéma, voyage, concert, etc..'
            ],
            'ecommerce' => [
                'title' => 'E-commerce',
                'description' => 'Achetez des marchandises en ligne à partir de votre boutique en ligne préférée intégrée à notre site.'
            ]
        ],
        'partner'  => [
            'steps' => [
                '1' => 'Contactez-nous',
                '2' => 'Soumettre les documents KYC',
                '3' => 'Soyez intégré',
                '4' => 'Commencez à vendre et à gagner',
            ]
        ],
        'what_we_do_details' => [
            'tagline' => 'Nous aidons les entreprises à vendre à leurs clients grâce à notre vaste réseau d\'agents.',
            'agent' => [
                'title' => 'Agents',
                'description' => 'Rejoignez notre réseau d\'agents en pleine expansion et commencez à gagner des commissions avec un seul capital et une seule plateforme pour tous les service.'
            ],
            'biller' => [
                'title' => 'Fournisseurs de service/ Marchants',
                'description' => 'Grâce à nos API simples, nos plugins et notre plateforme, nous pouvons intégrer votre entreprise très facilement et commencer à encaisser vos paiements et à améliorer vos processus.',
            ],
            'distributor' => [
                'title' => 'Distributeurs',
                'description' => 'Avec notre API SIMPLE mais PUISSANTE, vous pouvez vendre sur notre plateforme ou créer les comptes de vos agents directement dans notre plateforme et commencer à vendre et gagner des commissions'
            ]
        ],
        'contact_us'              => [
            'title'      => 'Love to Hear From You',
            'text'       => 'We are now available twenty-four hours a day, seven days a week. Call us today and find out how we can help your business.',
            'company'    => 'Company',
            'address'    => 'Address',
            'phone'      => 'Phone',
            'email'      => 'Email',
            'website'    => 'Website',
            'work_hours' => 'Work Hours',
            'monday'     => 'Monday',
            'saturday'   => 'Saturday',
            'to'         => 'to',
        ]
    ],
];
