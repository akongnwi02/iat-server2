<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'roles' => [
            'created' => 'Rôle créé avec succès.',
            'deleted' => 'Rôle supprimé avec succès.',
            'updated' => 'Rôle mis à jour avec succès.',
        ],

        'users' => [
            'cant_resend_confirmation' => "L'application est actuellement paramétrée avec une validation manuelle des utilisateurs.",
            'confirmation_message'  => "Un message de confirmation a été envoyé à l'adresse indiquée.",
            'confirmed'              => "L'utilisateur a été confirmé avec succès.",
            'created'             => 'Utilisateur a été créé avec succès.',
            'deleted'             => 'Utilisateur a été supprimé avec succès.',
            'deleted_permanently' => "L'utilisateur a été supprimé définitivement.",
            'restored'            => "L'utilisateur a été réactivé.",
            'session_cleared'      => "La session de l'utilisateur a été effacée avec succès.",
            'social_deleted' => 'Le compte de réseau social a été effacé avec succès.',
            'unconfirmed' => "Le compte de l'utilisateur a été infirmé avec succès.",
            'updated'             => 'Utilisateur mis à jour avec succès.',
            'transferred'                 => "L'utilisateur a été transféré avec succès.",
            'updated_password'    => 'Le mot de passe de l\'utilisateur a été mis à jour avec succès.',
            'reset_pin'         => "Le code d'accès de l'utilisateur a été réinitialisé avec succès.",
            'reset_topup_account'         => "Les comptes de recharge de l'utilisateur ont été réinitialisés avec succès.",
        ],
        
        'companies' => [
            'company' => [
                'created' => 'L\'entreprise a été créée avec succès.',
                'updated' => 'L\'entreprise a été mise à jour avec succès.',
                'status_updated' => 'Le statut a été mis à jour avec succès.',
                'logged_in'     => 'Vous avez changé d\'entreprise avec succès.',
            ],
            'service' => [
                'status_updated' => 'Le statut a été mis à jour avec succès.',
                'updated' => 'Le service a été mis à jour pour cette compagnie avec succès.',
            ],
            'method' => [
                'status_updated' => 'Le statut a été mis à jour avec succès.',
                'updated' => 'Le mode de paiement a été mis à jour pour cette entreprise avec succès.',
            ]
        ],
        'services' => [
            'service' => [
                'created' => 'Le service a été crée avec succès.',
                'updated' => 'Le service a été mis à jour avec succès.',
                'status_updated' => 'Le statut a été mis à jour avec succès.',
            ],
            'company' => [
                'updated' => 'Les entreprises pour ce service ont été mises à jour avec succès'
            ],
            'price' => [
                'created' => 'Le prix a été crée avec succès.',
                'updated' => 'Le prix a été mis à jour avec succès.',
                'status_updated' => 'Le statut a été mis à jour avec succès.',
            ],
            'commission' => [
                'created' => 'Les frais de service ont été mis à jour avec succès.',
            ],
            'distribution' => [
                'created' => 'La distribution de la commission a été créée avec succès',
                'updated' => 'La distribution de la commission a été mise à jour avec succès',
            ],
            'method' => [
                'created' => 'Le mode de paiement a été crée avec succès.',
                'updated' => 'Le mode de paiement a été mis à jour avec succès.',
                'status_updated' => 'Le statut a été mis à jour avec succès.',
                'company_updated' => 'Les entreprises pour ce mode de paiement ont été mises à jour avec succès',
            ]
        ],
        'meters' => [
            'electricity' => [
                'activated' => 'Le compteur a été activé avec succès.',
                'deactivated' => 'Le compteur a été désactivé avec succès',
                'updated' => 'Le compteur a été mis à jour avec succès',
                'created' => 'Le compteur a été enregistré avec succès',
            ]
        ],
        'points' => [
            'electricity' => [
                'updated' => 'Le point de vente a été mise à jour avec succès',
                'gps_updated' => 'Le GPS du point de vente a été mis à jour avec succès',
                'created' => 'Le point de vente a été crée avec succès',
            ]
        ],
        'administration' => [
            'currency' => [
                'created' => 'La monnaie a été créée avec succès.',
                'updated' => 'La monnaie a été mise à jour avec succès.',
                'status_updated' => 'Le statut a été mis à jour avec succès.',
            ],
            'cycle' => [
                'created' => 'Le cycle a été créé avec succès.',
                'updated' => 'Le cycle a été mis àjour avec succès.',
                'status_updated' => 'Le statut a été mis à jour avec succès.',
            ]
        ],
        'quote' => [
            'inventory' => [
                'created' => 'L\'inventaire a été créé avec succès',
                'updated' => 'L\'inventaire a été mis à jour avec succès',
            ],
            'quote' => [
                'created' => 'Le devis a été créé avec succès',
                'updated' => 'Le devis a été mis à jour avec succès',
                'status_updated' => 'Le statut a été mis à jour avec succès.',
            ]
        ],
        'payment' => [
            'electricity' => [
                'updated' => 'Le paiement de la facture a été mis à jour avec succès',
                'created' => 'Le paiement de la facture a crée avec succès',
                'status_changed' => 'Le statut du paiement de la facture a été modifié avec succès'
            ]
        ],
        
        'accounting' => [
            'collection' => [
                'paid' => 'La collecte a été effectuée avec succès.'
            ],
            'provision' => [
                'requested' => 'La provision a été demandée avec succès.',
            ]
        ],
        'sales' => [
            'success' => 'La transaction s\'est achevée avec succès',
        ],
        'account' => [
            'floated' => 'La Float a été appliquée avec succès.',
            'transferred' => 'Montant transféré avec succès,',
            'status_updated' => 'Le statut a été mis à jour avec succès.',
            'drained' => 'Montant extrait avec succès.',
            'paid_out' => 'La demande de paiement a été acceptée. La demande est en attente de validation.',
        ],
        'payout' => [
            'status_updated' => 'Le statut de paiement a été mis à jour avec succès.'
        ]
    ],

    'frontend' => [
        'contact' => [
            'sent' => "Vos informations ont été envoyées avec succès. Nous répondrons à l'e-mail indiqué dans les plus brefs délais.",
        ],
    ],
    'api'      => [
        'users' => [
            'logged_out' => 'Utilisateur déconnecté avec succès.'
        ]
    ]
];
