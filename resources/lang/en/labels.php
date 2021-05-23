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
    
    'general'  => [
        'all'                => 'All',
        'yes'                => 'Yes',
        'no'                 => 'No',
        'copyright'          => 'Copyright',
        'custom'             => 'Custom',
        'actions'            => 'Actions',
        'active'             => 'Active',
        'toggle'             => 'Toggle',
        'buttons'            => [
            'save'   => 'Save',
            'update' => 'Update',
            'create' => 'Create',
        ],
        'hide'               => 'Hide',
        'inactive'           => 'Inactive',
        'none'               => 'None',
        'continue'           => 'Continue',
        'show'               => 'Show',
        'toggle_navigation'  => 'Toggle Navigation',
        'create_new'         => 'Create New',
        'download'           => 'Download',
        'add'                => 'Add',
        'location'           => 'Get Location',
        'map'                => 'Map',
        'list'               => 'List',
        'remove'             => 'Remove',
        'credit'             => 'Credit',
        'debit'              => 'Debit',
        'toolbar_btn_groups' => 'Toolbar with button groups',
        'more'               => 'More',
        'select'             => 'Select One'
    ],
    'backend'  => [
        'access'    => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',
                'table'      => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],
            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'transfer_user'       => 'Transfer :user to a new Company.',
                'create'              => 'Create User',
                'transfer'            => 'Transfer User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',
                'user_actions'        => 'User Actions',
                'table'               => [
                    'confirmed'         => 'Confirmed',
                    'created'           => 'Created',
                    'email'             => 'E-mail',
                    'username'          => 'Username',
                    'id'                => 'ID',
                    'last_updated'      => 'Last Updated',
                    'name'              => 'Name',
                    'first_name'        => 'First Name',
                    'last_name'         => 'Last Name',
                    'no_deactivated'    => 'No Deactivated Users',
                    'no_deleted'        => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'company'           => 'Company',
                    'permissions'       => 'Permissions',
                    'abilities'         => 'Abilities',
                    'roles'             => 'Roles',
                    'social'            => 'Social',
                    'total'             => 'user total|users total',
                ],
                'tabs'                => [
                    'titles'  => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],
                    'content' => [
                        'overview' => [
                            'avatar'        => 'Avatar',
                            'confirmed'     => 'Confirmed',
                            'created_at'    => 'Created At',
                            'deleted_at'    => 'Deleted At',
                            'email'         => 'E-mail',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated'  => 'Last Updated',
                            'name'          => 'Name',
                            'first_name'    => 'First Name',
                            'last_name'     => 'Last Name',
                            'username'      => 'Username',
                            'phone'         => 'Telephone',
                            'status'        => 'Status',
                            'timezone'      => 'Timezone',
                            'location'      => 'Location',
                        ],
                    ],
                ],
                'view'                => 'View User',
            ],
        ],
        'companies' => [
            'company' => [
                'management'      => 'Company Management',
                'create'          => 'Create Company',
                'edit'            => 'Edit Company',
                'active'          => 'Active Companies',
                'company_actions' => 'Company Actions',
                'table'           => [
                    'name'         => 'Company Name',
                    'address'      => 'Address',
                    'country'      => 'Country',
                    'state'        => 'State',
                    'city'         => 'City',
                    'phone'        => 'Company Phone',
                    'type'         => 'Company Type',
                    'email'        => 'Company Email',
                    'street'       => 'Street',
                    'website'      => 'Website',
                    'postal_code'  => 'Postal Code',
                    'size'         => 'Size',
                    'last_updated' => 'Size',
                    'active'       => 'Active',
                    'total'        => 'company|companies',
                ],
                'tabs'            => [
                    'titles'  => [
                        'profile'        => 'Profile',
                        'services'       => 'Services',
                        'paymentmethods' => 'Payment Methods',
                    ],
                    'content' => [
                        'service'       => [
                            'management' => 'Service Commission Rate',
                            'edit'       => 'Update commission rate for :company',
                            'add'        => 'Add services for :company',
                            'default'    => 'Use service default',
                            'custom'     => 'Set custom',
                            'table'      => [
                                'name'                   => 'Service Name',
                                'category'               => 'Service Category',
                                'gateway'                => 'Gateway Configuration',
                                'active'                 => 'Active',
                                'code'                   => 'Code',
                                'logo'                   => 'Logo',
                                'customercommission'     => 'Customer Service Charge',
                                'providercommission'     => 'Provider Service Charge',
                                'commissiondistribution' => 'Commission Distribution Strategy',
                                'total'                  => 'service|services'
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
        'services'  => [
            'service'      => [
                'management'      => 'Service Management',
                'assign'          => 'Assign :service to companies',
                'create'          => 'Create Service',
                'edit'            => 'Edit Service',
                'active'          => 'Active Services',
                'service_actions' => 'Service Actions',
                
                'table' => [
                    'name'                  => 'Service Name',
                    'code'                  => 'Service Code',
                    'active'                => 'Active',
                    'logo'                  => 'Logo',
                    'gateway'               => 'Gateway',
                    'category'              => 'Category',
                    'agent_rate'            => 'Default Agent Rate',
                    'company_rate'          => 'Default Company Rate',
                    'external_rate'         => 'Default External Rate',
                    'min_amount'            => 'Min Amount',
                    'max_amount'            => 'Max Amount',
                    'customercommission'    => 'Default Supply Point Service Charge',
                    'price'                 => 'Default Price',
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
                'management' => 'Service Prices',
                'edit'       => 'Edit Price',
                'create'     => 'Create Price',
                'active'     => 'Active Prices',
                'table'      => [
                    'name'        => 'Price Name',
                    'code'        => 'Price Code',
                    'active'      => 'Active',
                    'amount'      => 'Amount',
                    'description' => 'Price Description',
                    'total'       => 'price|prices',
                ]
            ],
            'commission'   => [
                'management'         => 'Service Charge',
                'create'             => 'Create Service Charge',
                'edit'               => 'Edit Service Charge',
                'commission_actions' => 'Service Charge Actions',
                
                'table' => [
                    'name'        => 'Name',
                    'description' => 'Description',
                    'currency'    => 'Currency',
                    'view'        => 'View Stack',
                    
                    'total' => 'service charge|service charges',
                    'stack' => [
                        'title'      => 'Stack',
                        'from'       => 'From',
                        'to'         => 'To',
                        'percentage' => 'Percentage',
                        'fixed'      => 'Fixed',
                        'empty'      => 'Empty',
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
            'method'       => [
                'management' => 'Payment Methods',
                'create'     => 'Create Payment Method',
                'assign'     => 'Assign :method to companies',
                'edit'       => 'Edit Payment Method',
                'table'      => [
                    'name'               => 'Name',
                    'description_en'     => 'Description En',
                    'description_fr'     => 'Description Fr',
                    'code'               => 'Code',
                    'active'             => 'Active',
                    'realtime'           => 'Realtime',
                    'service'            => 'Service',
                    'logo'               => 'Logo',
                    'customercommission' => 'Customer Service Charge',
                    'providercommission' => 'Merchant Fee',
                    'total'              => 'payment method|payment methods',
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
            
            'table' => [
                'meter_code'        => 'Meter Code',
                'supply_point'      => 'Supply Point',
                'phone'             => 'Contact Phone',
                'email'             => 'Contact Email',
                'company'           => 'Company',
                'provider'          => 'Provider',
                'type'              => 'Type',
                'active'            => 'Active',
                'last_vending_date' => 'Last Recharge Date',
                'identifier'        => 'External Identifier',
                'location'          => 'Room Number',
                'total'             => 'meter|Meters',
            ],
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
                'provider_price'      => 'Provider\'s Price',
                'adjusted_price'      => 'Adjusted Price',
                'meter_no'            => 'Meter Number',
                'is_auto_price'       => 'Auto Price',
                'is_internal'         => 'Internal',
                'internal'            => 'Internal',
                'auto_price_margin'   => 'Auto Price Margin',
                'service_charge'      => 'Specific Service Charge',
                'price'               => 'Price',
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
                'reference'      => 'Reference',
                'service_number' => 'Service Number',
                'from'           => 'From',
                'to'             => 'To',
            ],
            'table'      => [
                'code'              => 'Reference',
                'company'           => 'Company',
                'date'              => 'Date',
                'user'              => 'Agent',
                'items'             => 'Items',
                'token'             => 'Token',
                'service'           => 'Service',
                'amount'            => 'Amount',
                'customer_fee'      => 'Customer Fee',
                'provider_fee'      => 'Provider Fee',
                'currency'          => 'Currency',
                'service_number'    => 'Service Number',
                'payment_account'   => 'Payment Account',
                'system_commission' => 'System Commission',
                'company_amount'    => 'Company Amount',
                'units'             => 'Units',
                'vat'               => 'VAT (%)',
                'amount_with_vat'   => 'Amount With VAT',
                'completed_at'      => 'Completed At',
                'user_status'       => 'User\'s Status',
                'actual_status'     => 'Actual Status',
                'to_be_verified'    => 'To be verified',
                'total_sales'       => 'sale|sales',
            ],
            'quote'      => [
                'meter_code'   => 'Meter Code',
                'meter_type'   => 'Meter Type',
                'supply_point' => 'Supply Point',
                'address'      => 'Address',
                'amount'       => 'Amount',
                'units'        => 'Units',
                'tariff_name'  => 'Tariff Name',
                'tariff_price' => 'Tariff Price',
            ]
        ],
        
        'account'        => [
            'management'            => 'Account',
            'company_balance'       => 'Company Balance',
            'umbrella_balance'      => 'Umbrella Balance',
            'commission_balance'    => 'Commission Balance',
            'credit'                => 'Credit Account',
            'debit'                 => 'Debit Account',
            'transfer_to_strongbox' => 'Transfer to Strongbox',
            'drain'                 => 'Drain Account',
            'float'                 => 'Add Float',
            'request_payout'        => 'Request Payout',
            'deposit'               => [
                'management' => 'Deposit Accounts',
                'actions'    => 'Account Actions',
                'view'       => 'View Account',
                'table'      => [
                    'code'    => 'Account Number',
                    'type'    => 'Account Type',
                    'owner'   => 'Owner',
                    'company' => 'Company',
                    'active'  => 'Active',
                    'balance' => 'Account Balance',
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
                    'code'    => 'Account Number',
                    'type'    => 'Account Type',
                    'owner'   => 'Owner',
                    'company' => 'Company',
                    'active'  => 'Active',
                    'balance' => 'Account Balance',
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
                            'active'  => 'Active',
                            'balance' => 'Account Balance',
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
            'umbrella'              => [
                'management' => 'Cash Accounts',
                'actions'    => 'Account Actions',
                'view'       => 'View Account',
                'table'      => [
                    'code'    => 'Account Number',
                    'owner'   => 'Owner',
                    'active'  => 'Active',
                    'balance' => 'Balance',
                    'total'   => 'account|accounts',
                    'user'    => 'User',
                    'company' => 'Company',
                ],
                'tabs'       => [
                    'titles'  => [
                        'overview'  => 'Overview',
                        'movements' => 'Movements',
                    ],
                    'content' => [
                        'overview'  => [
                            'code'    => 'Account Number',
                            'user'    => 'User',
                            'company'    => 'Company',
                            'balance' => 'Account Balance',
                        ],
                        'movements' => [
                            'table' => [
                                'code'    => 'Transaction Number',
                                'amount'  => 'Amount',
                                'comment' => 'Comment',
                                'account' => 'Account',
                                'user'    => 'Executed by',
                                'company' => 'Company',
                                'date'    => 'Date',
                                'total'   => 'movement|movements',
                            ],
                        ],
                    ],
                ],
            ],
            'payout'                => [
                'management' => 'Commission Accounts',
                'actions'    => 'Account Actions',
                'view'       => 'View Account',
                'table'      => [
                    'code'    => 'Account Number',
                    'balance' => 'Commission Balance',
                    'pending' => 'Pending',
                    'total'   => 'account|accounts',
                    'owner'   => 'Owner',
                    'type'    => 'Type',
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
                            'balance' => 'Commission Balance',
                        ],
                        'movements' => [
                            'table' => [
                                'code'        => 'Transaction Number',
                                'amount'      => 'Amount',
                                'method'      => 'Payout Method',
                                'number'      => 'Account Number',
                                'comment'     => 'Comment',
                                'name'        => 'Account Name',
                                'account'     => 'Account',
                                'user'        => 'Requested By',
                                'date'        => 'Requested At',
                                'company'     => 'Company',
                                'status'      => 'Status',
                                'decision_by' => 'Decision By',
                                'decision_at' => 'Decision At',
                                'total'       => 'movement|movements',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'accounting'     => [
            'pay'        => 'Payout Collection',
            'request'    => 'Request Provision',
            'provision'  => [
                'management' => 'Provisions',
                'actions'    => 'Provision Actions',
                'view'       => 'View Provision',
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
                'management' => 'Collections',
                'actions'    => 'Collection Actions',
                'view'       => 'View Collection',
                'table'      => [
                    'service'          => 'Service',
                    'amount'           => 'Collected Amount',
                    'number_payments'  => 'Number of payments',
                    'last_payout_date' => 'Last payout date',
                    'total'            => 'service|services'
                ],
                'movements'  => [
                    'code'    => 'Transaction Number',
                    'amount'  => 'Amount',
                    'comment' => 'Comment',
                    'user'    => 'Executed by',
                    'date'    => 'Date',
                    'total'   => 'payment|payments',
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
        'auth'      => [
            'login_box_title'    => 'Login',
            'login_to_account'   => 'Sign in to your account',
            'create_account'     => 'Create your account',
            'login_button'       => 'Login',
            'login_with'         => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_now'       => 'Register Now!',
            'no_account'         => 'Don\'t have an account?',
            'quick'              => ' It’s quick and easy.',
            'register_button'    => 'Register',
            'remember_me'        => 'Remember Me',
        ],
        'contact'   => [
            'box_title' => 'Contact Us',
            'button'    => 'Send Information',
        ],
        'confirm'   => [
            'confirm_account_box_title' => 'Confirm Your Account',
            'confirm_account_button'    => 'Confirm Account',
        ],
        'passwords' => [
            'expired_password_box_title'      => 'Your password has expired.',
            'forgot_password'                 => 'Forgot Password?',
            'reset_password_box_title'        => 'Reset Password',
            'reset_password_button'           => 'Reset Password',
            'update_password_button'          => 'Update Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
            'send_password_reset_code'        => 'Send Password Reset Code',
            'confirm_code_button'             => 'Confirm Code',
        ],
        'user'      => [
            'passwords' => [
                'change' => 'Change Password',
            ],
            
            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Created At',
                'edit_information'   => 'Edit Information',
                'email'              => 'E-mail',
                'company'            => 'Company',
                'phone'              => 'Telephone',
                'username'           => 'Username',
                'last_updated'       => 'Last Updated',
                'name'               => 'Name',
                'first_name'         => 'First Name',
                'last_name'          => 'Last Name',
                'update_information' => 'Update Information',
            ],
        ],
    ],
];
