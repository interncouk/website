<?php

return [
    'name' => 'Newsletters',
    'settings' => [
        'email' => [
            'templates' => [
                'title' => 'Newsletter',
                'description' => 'Config newsletter email templates',
                'to_admin' => [
                    'title' => 'Email send to admin',
                    'description' => 'Template for sending email to admin',
                ],
                'to_user' => [
                    'title' => 'Email send to user',
                    'description' => 'Template for sending email to subscriber',
                ],
            ],
        ],
        'title' => 'Newsletter',
        'description' => 'Settings for newsletter (auto send newsletter email to SendGrid, Mailchimp... when someone register newsletter on website).',
        'mailchimp_api_key' => 'Mailchimp API Key',
        'mailchimp_list_id' => 'Mailchimp List ID',
        'mailchimp_list' => 'Mailchimp List',
        'sendgrid_api_key' => 'Sendgrid API Key',
        'sendgrid_list_id' => 'Sendgrid List ID',
        'sendgrid_list' => 'Sendgrid List',
        'enable_newsletter_contacts_list_api' => 'Enable newsletter contacts list API?',
    ],
    'statuses' => [
        'subscribed' => 'Subscribed',
        'unsubscribed' => 'Unsubscribed',
    ],
    'validation' => [
        'email' => [
            'required' => '11The email field is required.', 
            'email' => 'The email field must be a valid email address.',
        ],
    ],
];
