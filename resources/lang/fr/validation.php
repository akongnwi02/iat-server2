<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Le champ :attribute doit être accepté.',
    'active_url'           => "Le champ :attribute n'est pas une URL valide.",
    'after'                => 'Le champ :attribute doit être une date supérieure à :date.',
    'after_or_equal'       => 'Le champ :attribute doit être une date supérieure ou égale à :date.',
    'alpha'                => 'Le champ :attribute ne peut contenir que des lettres.',
    'alpha_dash'           => 'Le champ :attribute ne peut contenir que des lettres, des chiffres et des tirets.',
    'alpha_num'            => 'Le champ :attribute ne peut contenir que des chiffres et des lettres.',
    'array'                => 'Le champ :attribute doit être un tableau.',
    'before'               => 'Le champ :attribute doit être une date inférieure :date.',
    'before_or_equal'      => 'Le champ :attribute doit être une date inférieure ou égale à  :date.',
    'between'              => [
        'numeric' => 'La valeur de :attribute doit être comprise entre :min et :max.',
        'file'    => 'La taille du fichier de :attribute doit être comprise entre :min et :max kilo-octets.',
        'string'  => 'Le texte :attribute doit contenir entre :min et :max caractères.',
        'array'   => 'Le tableau :attribute doit contenir entre :min et :max éléments.',
    ],
    'boolean'              => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed'            => 'Le champ de confirmation :attribute ne correspond pas.',
    'date'                 => "Le champ :attribute n'est pas une date valide.",
    'date_format'          => 'Le champ :attribute ne correspond pas au format :format.',
    'different'            => 'Les champs :attribute et :other doivent être différents.',
    'digits'               => 'Le champ :attribute doit contenir :digits chiffres.',
    'digits_between'       => 'Le champ :attribute doit contenir entre :min et :max chiffres.',
    'dimensions'           => 'Les dimensions de l\'image :attribute ne sont pas conformes.',
    'distinct'             => 'Le champ :attribute doit être une valeur unique.',
    'email'                => 'Le champ :attribute doit être une adresse email valide.',
    'exists'               => 'Le champ :attribute n\'existe pas.',
    'file'                 => 'Le champ :attribute doit être un fichier.',
    'filled'               => 'Le champ :attribute est obligatoire.',
    'gt'                   => [
        'numeric' => 'Le :attribute doit être supérieur à :value.',
        'file'    => 'Le :attribute doit être supérieur à :value kilobytes.',
        'string'  => 'Le :attribute doit être supérieur à :value characters.',
        'array'   => 'Le :attribute doit avoir plus de :value items.',
    ],
    'gte'                  => [
        'numeric' => 'Le :attribute doit être supérieur ou égal à :value.',
        'file'    => 'Le :attribute doit être supérieur ou égal à :value kilobytes.',
        'string'  => 'Le :attribute doit être supérieur ou égal à :value caractère.',
        'array'   => 'Le :attribute doit avoir :value articles ou plus.',
    ],
    'image'                => 'Le champ :attribute doit être une image.',
    'in'                   => 'Le champ :attribute n\'est pas valide.',
    'in_array'             => "Le champ :attribute n'existe pas dans :other.",
    'integer'              => 'Le champ :attribute doit être un entier.',
    'ip'                   => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4'                 => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json'                 => 'Le champ :attribute doit être un document JSON valide.',
    'lt'                   => [
        'numeric' => 'Le :attribute doit être inférieur à :value.',
        'file'    => 'Le :attribute doit être inférieur à :value kilobytes.',
        'string'  => 'Le :attribute doit être inférieur à :value caractère.',
        'array'   => 'Le :attribute doit avoir moins de :value articles.',
    ],
    'lte'                  => [
        'numeric' => 'The :attribute doit être inférieur ou égal à:value.',
        'file'    => 'The :attribute doit être inférieur ou égal à :value kilobytes.',
        'string'  => 'The :attribute doit être inférieur ou égal à :value characters.',
        'array'   => 'The :attribute ne doit pas avoir plus de :value items.',
    ],
    'max'                  => [
        'numeric' => 'La valeur de :attribute ne peut être supérieure à :max.',
        'file'    => 'La taille du fichier de :attribute ne peut pas dépasser :max kilo-octets.',
        'string'  => 'Le texte de :attribute ne peut être supérieur à :max caractères.',
        'array'   => 'Le tableau :attribute ne peut contenir plus de :max éléments.',
    ],
    'mimes'                => 'Le champ :attribute doit être un fichier de type : :values.',
    'mimetypes'            => 'Le champ :attribute doit être un fichier de type : :values.',
    'min'                  => [
        'numeric' => 'La valeur de :attribute doit être supérieure ou égale à :min.',
        'file'    => 'La taille du fichier de :attribute doit être supérieure à :min kilo-octets.',
        'string'  => 'Le texte :attribute doit contenir au moins :min caractères.',
        'array'   => 'Le tableau :attribute doit contenir au moins :min éléments.',
    ],
    'not_in'               => "Le champ :attribute sélectionné n'est pas valide.",
    'not_regex'            => 'Le format de :attribute n\'est pas valide.',
    'numeric'              => 'Le champ :attribute doit contenir un nombre.',
    'present'              => 'Le champ :attribute doit être rempli.',
    'regex'                => 'Le format du champ :attribute n\'est pas valide.',
    'required'             => 'Le champ :attribute est obligatoire.',
    'required_if'          => 'Le champ :attribute est obligatoire lorsque :other est :value.',
    'required_unless'      => 'Le champ :attribute est obligatoire sauf si :other est :value.',
    'required_with'        => 'Le champ :attribute est obligatoire lorsque :values a une valeur.',
    'required_with_all'    => 'Le champ :attribute est obligatoire lorsque :values existe.',
    'required_without'     => 'Le champ :attribute est obligatoire lorsque :values n\'a pas de valeur.',
    'required_without_all' => 'Le champ :attribute est obligatoire lorsque :values n\'existe pas.',
    'same'                 => 'Les champs :attribute et :other doivent être identiques.',
    'size'                 => [
        'numeric' => 'Le champ :attribute doit avoir une taille de :size.',
        'file'    => 'La taille du fichier de :attribute doit être de :size kilo-octets.',
        'string'  => 'Le texte de :attribute doit contenir :size caractères.',
        'array'   => 'Le tableau :attribute doit contenir :size éléments.',
    ],
    'string'               => 'Le champ :attribute doit être une chaîne de caractères.',
    'timezone'             => 'Le champ :attribute doit être un fuseau horaire valide.',
    'unique'               => 'La valeur du champ :attribute est déjà utilisée.',
    'uploaded'             => 'Le fichier du champ :attribute n\'a pu être téléchargé.',
    'url'                  => 'Le format de \'URL de :attribute n\'est pas valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    
    'attributes' => [

        'backend' => [
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Rôles associés',
                    'dependencies'     => 'Liens de dépendance',
                    'display_name'     => 'Nom affiché',
                    'group'            => 'Groupe',
                    'group_sort'       => 'Trier par groupe',

                    'groups' => [
                        'name' => 'Nom du groupe',
                    ],

                    'name'   => 'Nom complet',
                    'first_name' => 'Prénom',
                    'last_name'  => 'Nom',
                    'system' => 'Système',
                ],

                'roles' => [
                    'associated_permissions' => 'Permissions associées',
                    'name'                   => 'Nom',
                    'sort'                   => 'Ordre',
                ],

                'users' => [
                    'active'                  => 'Actif',
                    'associated_roles'        => 'Rôles associés',
                    'confirmed'               => 'Confirmé',
                    'email'                   => 'Adresse email',
                    'username'                  => 'Nom d\'utilisateur',
                    'phone'                     => 'Telephone',
                    'name'                    => 'Nom complet',
                    'last_name'               => 'Nom',
                    'first_name'              => 'Prénom',
                    'other_permissions'       => 'Autres permissions',
                    'password'                => 'Mot de passe',
                    'password_confirmation'   => 'Confirmation du mot de passe',
                    'send_confirmation_message' => 'Envoyer un message de confirmation',
                    'notification_channel'      => 'Option de notification',
                    'sms'                       => 'SMS',
                    'mail'                      => 'E-mail',
                    'timezone'                  => 'Fuseau horaire',
                    'language'                  => 'Langue',
                    'company'                   => 'Entreprise'
                ],
            ],
            'companies' => [
                'company' => [
                    'name'             => 'Nom de l\'entreprise',
                    'address'          => 'Adresse',
                    'country'          => 'Pays',
                    'state'            => 'Région',
                    'city'             => 'Ville',
                    'phone'            => 'Numéro de téléphone de l\'entreprise',
                    'type'             => 'Type de\'entreprise',
                    'email'            => 'Email de l\'entreprise',
                    'street'           => 'Rue',
                    'website'          => 'Site web',
                    'postal_code'      => 'Code postal',
                    'size'             => 'Taille',
                    'logo'             => 'Logo de l\'entreprise',
                    'provider'         => 'Fournisseur de service',
                    'direct_polling'   => 'Approvisionnement direct',
                    'agent_self_topup' => 'Auto-recharge des agents',
                ],
                'service'       => [
                    'customercommission'     => 'Commission du Client',
                    'providercommission'     => 'Commission du Fournisseur',
                    'commissiondistribution' => 'Startégie de Distribution des Commissions',
                    'default'                => 'Utiliser la valeur par défaut du service',
                    'custom'                 => 'Définir une valeur personnalisée',
                    'services'               => 'Services',
                    'default_setting'        => 'Utiliser les frais de service par défaut'
                ],
                'paymentmethod' => [
                    'customercommission' => 'Commission du Client',
                    'providercommission' => 'Commission du Fournisseur',
                    'default'            => 'Utiliser la valeur par défaut',
                    'custom'             => 'Définir une valeur personnalisée',
                    'methods'            => 'Modes de Paiement',
                    'default_setting'    => 'Utiliser les frais de service par défaut'
                ]
            ],
            'meters'         => [
                'electricity' => [
                    'meter_code'   => 'Code du compteur',
                    'phone'        => 'Contact Téléphonique',
                    'location'     => 'Localisation',
                    'email'        => 'Adresse email',
                    'type'         => 'Type',
                    'comment'      => 'Commentaire',
                    'supply_point' => 'Point de Vente',
                    'provider'     => 'Fournisseur',
                ]
            ],
            'sales' => [
                'service_code' => 'Service',
                'service' => 'Service',
                'currency_code' => 'Monnaie',
                'service_number' => 'Numéro de Service',
                'meter_number' => 'Numéro de Compteur',
                'amount' => 'Montant',
            ],
            'points'         => [
                'electricity' => [
                    'name'                => 'Nom',
                    'city'                => 'Ville',
                    'address'             => 'Adresse',
                    'phone'               => 'Contact Téléphonique',
                    'email'               => 'Adresse Email',
                    'external_identifier' => 'Numéro de Contrat ENEO',
                    'meter_no' => 'Numéro de Compteur ENEO',
                    'company'             => 'Entreprise',
                    'type'                => 'Type',
                    'provider_price'      => 'Tarif du Fournisseur (:currency)',
                    'provider_price2'     => 'Tarif du Fournisseur',
                    'is_auto_price'       => 'Tarif Automatique',
                    'is_internal'         => 'Interne',
                    'auto_price_margin'   => 'Marge du tarif automatique (:currency)',
                    'adjusted_price'      => 'Tarif ajusté (:currency)',
                    'auto_price_margin2'  => 'Marge du tarif automatique',
                    'adjusted_price2'     => 'Tarif ajusté',
                    'service_charge'      => 'Frais de Service Spécifiques',
                    'price'               => 'Tarif',
                    'tax'               => 'Taxe (%)',
                    'gps_lat'             => 'Latitude',
                    'gps_long'            => 'Longitude',
                    'total'               => 'Point de vente|Points de vente',
                ],
            ],
            'services'       => [
                'service'                 => [
                    'name'                       => 'Nom du Service',
                    'description_en'             => 'Description Anglaise',
                    'description_fr'             => 'Description Française',
                    'category'                   => 'Catégorie du Service',
                    'gateway'                    => 'Configuration de la passerelle',
                    'active'                     => 'Actif',
                    'code'                       => 'Code',
                    'destination_placeholder'    => 'Exemple de Numéro de Service',
                    'destination_regex'          => 'Numéro de Service Regex',
                    'providercommission'         => 'Frais de Service du Fournisseur de Services',
                    'companycommission'          => 'Frais de Service de l\'Entreprise',
                    'customercommission'         => 'Frais de Service du Client',
                    'supplypoint_servicecharge'  => 'Frais de Service par Défaut du Point de Vente ',
                    'supplypoint_price'          => 'Tarif par Défaut',
                    'logo'                       => 'Logo',
                    'logo_url'                   => 'URL du Logo',
                    'prepaid'                    => 'Prepayé',
                    'items'                      => 'Eléments',
                    'requires_auth'              => 'Autorisation Requise',
                    'withdrawal'                 => 'Retrait d\'Argent',
                    'min_amount'                 => 'Montant Minimum',
                    'max_amount'                 => 'Montant Maximum',
                    'step_amount'                => 'Montant de la tranche',
                    'providercompany'            => 'Entreprise Prestataire',
                    'commission_distribution_id' => 'Distribution de la Commission',
                    'companies'                  => 'Entreprises',
                ],
                'item'       => [
                    'active'         => 'Actif',
                    'description_en' => 'Description anglaise',
                    'description_fr' => 'Description française',
                    'name'           => 'Nom de l\'article',
                    'amount'         => 'Prix de l\'article',
                    'code'           => 'Code de l\'article',
                ],
                'commission' => [
                    'name'        => 'Nom',
                    'description' => 'Description',
                    'currency'    => 'Devise',
                    'pricings'    => 'Tarification ',
                    'pricing'     => [
                        'from'       => 'De',
                        'to'         => 'A',
                        'fixed'      => 'Fixé',
                        'percentage' => 'Pourcentage',
                    ]
                ],
                'commission_distribution' => [
                    'name'          => 'Nom',
                    'description'   => 'Description',
                    'company_rate'  => 'Taux par Défaut de l\'Entreprise (%)',
                    'agent_rate'    => 'Taux par Défaut de l\'Agent (%)',
                    'external_rate' => 'Taux par défaut externe (%)',
                ],
                'method'     => [
                    'name'               => 'Nom',
                    'code'               => 'Code',
                    'placeholder_text'   => 'Emplacement du compte',
                    'accountregex'       => 'Compte Regex',
                    'description_en'     => 'Description Anglaise',
                    'description_fr'     => 'Description Française',
                    'customercommission' => 'Frais de service du client',
                    'providercommission' => 'Frais du marchand',
                    'service'            => 'Service',
                    'realtime'           => 'Temps réel',
                    'logo'               => 'Logo',
                    'companies'          => 'Entreprises',
                ],
                'category'                => [
                    'name'    => 'Nom',
                    'code'    => 'Code',
                    'active'  => 'Actif',
                    'api_key' => 'Clé API Micro Service',
                    'api_url' => 'URL du Micro Service'
                ],
                'price'                   => [
                    'name'        => 'Nom',
                    'amount'      => 'Montant',
                    'description' => 'Description',
                ]
            ],
            'accounting' => [
                'collection' => [
                    'amount' => 'Montant',
                    'currency' => 'Monnaie',
                    'comment' => 'commentaire',
                ],
                'provision'  => [
                    'amount'   => 'Montant',
                    'currency' => 'Monnaie',
                    'comment'  => 'commentaire',
                ]
            ],
            'administration' => [
                'currency' => [
                    'name'   => 'Nom de la Monnaie',
                    'code'   => 'Code de la Monnaie',
                    'active' => 'Actif',
                    'rate'   => 'Taux d\'échange',
                ]
            ],
            'quote' => [
                'inventory' => [
                    'name_en' => 'Nom Anglais',
                    'name_fr' => 'Nom Français',
                ],
                'quote' => [
                    'title'       => 'Titre',
                    'name'        => 'Nom du Client',
                    'phone'       => 'Téléphone du Client',
                    'address'     => 'Adresse du Client',
                    'code'        => 'Code',
                    'description' => 'Description',
                    'status'      => 'Statut',
                    'type'        => 'Type',
                    'amount'      => 'Montant',
                    'inventories' => [
                        'material'  => 'Matériel',
                        'unit_cost' => 'Prix unitaire',
                        'quantity'  => 'Quantité',
                        'sub_total' => 'Sous Total',
                    ]
                ]
            ],
            'payment' => [
                'supply_point' => 'Point de vente',
                'external_identifier' => 'Numéro de Contrat ENEO',
                'cycle_year' => 'Cycle Annuel',
                'cycle_month' => 'Cycle Mensuel',
                'payments' => [
                    'amount' => 'Montant',
                    'payment_ref' => 'Référence de Paiement',
                    'method' => 'Mode de Paiement',
                    'consumption' => 'Consommation',
                    'bill_number' => 'Numéro de Facture',
                    'note' => 'Remarque',
                    'cycle_year'  => 'Année',
                    'cycle_month' => 'Mois',
                    'supply_point' => 'Point de Vente',
                ]
            ],
            'account'   => [
                'amount'         => 'Montant',
                'currency'       => 'Devise',
                'comment'        => 'Commentaire (Facultatif)',
                'name'           => 'Nom du compte',
                'number'         => 'Numéro du compte',
                'payment_method' => 'Mode de paiement',
            ]
        ],
        'frontend' => [
            'avatar'                    => 'Avatar',
            'email'                     => 'Adresse email',
            'subject'                   => 'Objet',
            'code'                      => 'Code de confirmation',
            'phone_or_email'            => 'Téléphone ou Email',
            'username'                  => 'Nom d\'utilisateur',
            'phone'                     => 'Numéro de téléphone',
            'first_name'                => 'Prénom',
            'last_name'                 => 'Nom',
            'name'                      => 'Nom complet',
            'password'                  => 'Mot de passe',
            'pin'                       => 'Code pin',
            'password_confirmation'     => 'Confirmation',
            'message'                   => 'Message',
            'new_password'              => 'Nouveau mot de passe',
            'new_password_confirmation' => 'Confirmation du nouveau mot de passe',
            'new_pin'                   => 'Nouveau code pin',
            'new_pin_confirmation'      => 'Confirmation du nouveau code pin',
            'old_password'              => 'Ancien mot de passe',
            'old_pin'                   => 'Ancien code pin',
            'timezone'                  => 'Fuseau horaire',
            'language'                  => 'Langue',
            'location'                  => 'Localisation',
            'topup' => [
                'service' => 'Service',
                'confirmed' => 'Confirmé',
                'account' => 'Compte',
                'config'  => 'Paramètre de recharge',
                'otp'     => 'OTP',
            ],
        ],
    ],
];
