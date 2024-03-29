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
    
    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'gt'                   => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file'    => 'The :attribute must be greater than :value kilobytes.',
        'string'  => 'The :attribute must be greater than :value characters.',
        'array'   => 'The :attribute must have more than :value items.',
    ],
    'gte'                  => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
        'string'  => 'The :attribute must be greater than or equal :value characters.',
        'array'   => 'The :attribute must have :value items or more.',
    ],
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'lt'                   => [
        'numeric' => 'The :attribute must be less than :value.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        'string'  => 'The :attribute must be less than :value characters.',
        'array'   => 'The :attribute must have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        'string'  => 'The :attribute must be less than or equal :value characters.',
        'array'   => 'The :attribute must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',
    
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
        
        'backend'  => [
            'access'     => [
                'permissions' => [
                    'associated_roles' => 'Associated Roles',
                    'dependencies'     => 'Dependencies',
                    'display_name'     => 'Display Name',
                    'group'            => 'Group',
                    'group_sort'       => 'Group Sort',
                    
                    'groups' => [
                        'name' => 'Group Name',
                    ],
                    
                    'name'       => 'Name',
                    'first_name' => 'First Name',
                    'last_name'  => 'Last Name',
                    'system'     => 'System',
                ],
                
                'roles' => [
                    'associated_permissions' => 'Associated Permissions',
                    'name'                   => 'Name',
                    'sort'                   => 'Sort',
                ],
                
                'users' => [
                    'active'                    => 'Active',
                    'associated_roles'          => 'Associated Roles',
                    'confirmed'                 => 'Confirmed',
                    'email'                     => 'E-mail Address',
                    'username'                  => 'Username',
                    'phone'                     => 'Telephone',
                    'name'                      => 'Name',
                    'last_name'                 => 'Last Name',
                    'first_name'                => 'First Name',
                    'other_permissions'         => 'Other Permissions',
                    'password'                  => 'Password',
                    'password_confirmation'     => 'Password Confirmation',
                    'send_confirmation_message' => 'Send Confirmation Message',
                    'notification_channel'      => 'Notification Channel',
                    'sms'                       => 'SMS',
                    'mail'                      => 'E-mail',
                    'timezone'                  => 'Timezone',
                    'language'                  => 'Language',
                    'company'                   => 'Company'
                ],
            ],
            'companies'  => [
                'company'       => [
                    'name'             => 'Company Name',
                    'address'          => 'Address',
                    'country'          => 'Country',
                    'state'            => 'State',
                    'city'             => 'City',
                    'phone'            => 'Company Phone',
                    'type'             => 'Company Type',
                    'email'            => 'Company Email',
                    'street'           => 'Street',
                    'website'          => 'Website',
                    'postal_code'      => 'Postal Code',
                    'size'             => 'Size',
                    'logo'             => 'Company Logo',
                    'provider'         => 'Provider',
                    'direct_polling'   => 'Direct Polling',
                    'merchant'         => 'Merchant',
                    'agent_self_topup' => 'Agent Self Topup',
                ],
                'service'       => [
                    'customercommission' => 'Customer Commission',
                    'providercommission' => 'Provider Commission',
                    'commissiondistribution' => 'Commission Distribution Strategy',
                    'default'            => 'Use service default value',
                    'custom'             => 'Set custom value',
                    'services'           => 'Services',
                    'default_setting'    => 'Use Default Service Charge'
                ],
                'paymentmethod' => [
                    'customercommission' => 'Customer Commission',
                    'providercommission' => 'Provider Commission',
                    'default'            => 'Use method default value',
                    'custom'             => 'Set custom value',
                    'methods'            => 'Payment methods',
                    'default_setting'    => 'Use Default Service Charge'
                ]
            ],
            'services'   => [
                'service'    => [
                    'name'                    => 'Service Name',
                    'description_en'          => 'English Description',
                    'description_fr'          => 'French Description',
                    'category'                => 'Service Category',
                    'gateway'                 => 'Gateway Configuration',
                    'active'                  => 'Active',
                    'code'                    => 'Code',
                    'destination_placeholder' => 'Service Number Example',
                    'destination_regex'       => 'Service Number Regex',
                    'providercommission'      => 'Service Provider Service Charge',
                    'companycommission'       => 'Company Service Charge',
                    'customercommission'      => 'Customer Service Charge',
                    'supplypoint_servicecharge'      => 'Default Supply Point Service Charge',
                    'logo'                    => 'Logo',
                    'logo_url'                => 'Logo URL',
                    'prepaid'                 => 'Prepaid',
                    'items'                   => 'Items',
                    'requires_auth'           => 'Authorization Required',
                    'withdrawal'              => 'Money Withdrawal',
                    'min_amount'              => 'Minimum Amount',
                    'max_amount'              => 'Maximum Amount',
                    'step_amount'             => 'Step Amount',
                    'providercompany'         => 'Provider Company',
                    'commission_distribution_id' => 'Commission Distribution',
                    'companies'               => 'Companies',
                ],
                'item'       => [
                    'active'         => 'Active',
                    'description_en' => 'English Description',
                    'description_fr' => 'French Description',
                    'name'           => 'Item Name',
                    'amount'         => 'Item Price',
                    'code'           => 'Item Code',
                ],
                'commission' => [
                    'name'        => 'Name',
                    'description' => 'Description',
                    'currency'    => 'Currency',
                    'pricings'    => 'Pricings',
                    'pricing'     => [
                        'from'       => 'From',
                        'to'         => 'To',
                        'fixed'      => 'Fixed',
                        'percentage' => 'Percentage',
                    ]
                ],
                'commission_distribution' => [
                    'name'        => 'Name',
                    'description' => 'Description',
                    'company_rate'            => 'Default Company Rate (%)',
                    'agent_rate'              => 'Default Agent Rate (%)',
                    'external_rate'           => 'Default External Rate (%)',
                ],
                'method'     => [
                    'name'               => 'Name',
                    'code'               => 'Code',
                    'placeholder_text'   => 'Account Placeholder',
                    'accountregex'       => 'Account Regex',
                    'description_en'     => 'English Description',
                    'description_fr'     => 'French Description',
                    'customercommission' => 'Customer Service Charge',
                    'providercommission' => 'Merchant Fee',
                    'service'            => 'Service',
                    'realtime'           => 'Realtime',
                    'logo' => 'Logo',
                    'companies'          => 'Companies',
                ],
                'category'   => [
                    'name'    => 'Name',
                    'code'    => 'Code',
                    'active'  => 'Active',
                    'api_key' => 'Micro Service API Key',
                    'api_url' => 'Micro Service URL'
                ]
            ],
            'accounting' => [
                'collection' => [
                    'amount'   => 'Amount',
                    'currency' => 'Currency',
                    'comment'  => 'comment',
                ],
                'provision'  => [
                    'amount'   => 'Amount',
                    'currency' => 'Currency',
                    'comment'  => 'comment',
                ]
            ],
            'administration' => [
                'currency'   => [
                    'name'    => 'Currency Name',
                    'code'    => 'Currency Code',
                    'active'  => 'Active',
                    'rate'    => 'Exchange Rate',
                ]
            ],
            'account'    => [
                'amount'         => 'Amount',
                'currency'       => 'Currency',
                'comment'        => 'Comment (Optional)',
                'name'           => 'Account Name',
                'number'         => 'Account Number',
                'payment_method' => 'Payment Method',
            ]
        ],
        'frontend' => [
            'avatar'                    => 'Avatar Location',
            'email'                     => 'E-mail Address',
            'subject'                   => 'Subject',
            'code'                      => 'Confirmation Code',
            'phone_or_email'            => 'Phone or Email',
            'username'                  => 'Username',
            'phone'                     => 'Telephone',
            'first_name'                => 'First Name',
            'last_name'                 => 'Last Name',
            'name'                      => 'Full Name',
            'password'                  => 'Password',
            'pin'                       => 'Pin Code',
            'password_confirmation'     => 'Password Confirmation',
            'message'                   => 'Message',
            'new_password'              => 'New Password',
            'new_password_confirmation' => 'New Password Confirmation',
            'new_pin'                   => 'New Pin',
            'new_pin_confirmation'      => 'New Pin Confirmation',
            'old_password'              => 'Old Password',
            'old_pin'                   => 'Old Pin',
            'timezone'                  => 'Timezone',
            'language'                  => 'Language',
            'location'                  => 'Location',
            'topup'                     => [
                'service'   => 'Service',
                'confirmed' => 'Confirmed',
                'account'   => 'Account',
                'config'    => 'Topup Configuration',
                'otp'       => 'OTP',
            ]
        ]
    ],
];
