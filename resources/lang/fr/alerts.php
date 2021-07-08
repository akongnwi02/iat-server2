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
            'confirmation_message'  => "Un message de confirmation a été adressé à l'adresse indiquée.",
            'confirmed'              => "L'utilisateur a été confirmé avec succès.",
            'created'             => 'Utilisateur créé avec succès.',
            'deleted'             => 'Utilisateur supprimé avec succès.',
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
                'status_updated' => 'The status was successfully updated.',
                'updated' => 'The service was updated for this company successfully.',
            ],
            'method' => [
                'status_updated' => 'The status was successfully updated.',
                'updated' => 'The payment method was updated for this company successfully.',
            ]
        ],
        'services' => [
            'service' => [
                'created' => 'Le service a été crée avcec succès.',
                'updated' => 'Le service a été mis à jour avec succès.',
                'status_updated' => 'Le statut a été mis à jour avec succès.',
            ],
            'company' => [
                'updated' => 'The companies for this service was updated successfully'
            ],
            'price' => [
                'created' => 'The price was successfully created.',
                'updated' => 'The price was successfully updated.',
                'status_updated' => 'The status was successfully updated.',
            ],
            'commission' => [
                'created' => 'The service charge was updated successfully.',
            ],
            'distribution' => [
                'created' => 'The commission distribution was created successfully',
                'updated' => 'The commission distribution was updated successfully',
            ],
            'method' => [
                'created' => 'The payment method was successfully created.',
                'updated' => 'The payment method was successfully updated.',
                'status_updated' => 'The status was successfully updated.',
                'company_updated' => 'The companies for this payment method was updated successfully',
            ]
        ],
        'meters' => [
            'electricity' => [
                'activated' => 'The meter was activated successfully.',
                'deactivated' => 'The meter was deactivated successfully',
                'updated' => 'The meter was updated successfully',
                'created' => 'The meter was registered successfully',
            ]
        ],
        'points' => [
            'electricity' => [
                'updated' => 'The supply point was updated successfully',
                'gps_updated' => 'The supply point GPS was updated successfully',
                'created' => 'The supply point was created successfully',
            ]
        ],
        'administration' => [
            'currency' => [
                'created' => 'The currency was successfully created.',
                'updated' => 'The currency was successfully updated.',
                'status_updated' => 'The status was successfully updated.',
            ],
            'cycle' => [
                'created' => 'The cycle was successfully created.',
                'updated' => 'The cycle was successfully updated.',
                'status_updated' => 'The status was successfully updated.',
            ]
        ],
        'quote' => [
            'inventory' => [
                'created' => 'The inventory was created successfully',
                'updated' => 'The inventory was updated successfully',
            ],
            'quote' => [
                'created' => 'The quote was created successfully',
                'updated' => 'The quote was updated successfully',
                'status_updated' => 'The status was successfully updated.',
            ]
        ],
        'payment' => [
            'electricity' => [
                'updated' => 'The bill payment was updated successfully',
                'status_changed' => 'The bill payment status was changed successfully'
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
            'success' => 'The transaction completed successfully',
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
