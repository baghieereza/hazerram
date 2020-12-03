<?php

return [

    /*
     * These are the keys for authentication (VAPID).
     * These keys must be safely stored and should not change.
     */
    'vapid' => [
        'subject' => env('VAPID_SUBJECT'),
        'public_key' => 'BFDgdvdkIjIEfSRkti_4jV4CGI4rVB8XkwP4XS0IDvdA0pGPionnBd3pJPM7JGjn9znYHsAEFMaXWrr4aIM91YQ',
        'private_key' => 'KURcFAFYHyLxp1Vf5nDN5ZKuD5AIrCqr4_d0-oXicsc',
        'pem_file' => env('VAPID_PEM_FILE'),
    ],

    /*
     * Google Cloud Messaging.
     * Deprecated and optional. It's here only for compatibility reasons.
     */
    'gcm' => [
        'key' => env('GCM_KEY'),
        'sender_id' => env('GCM_SENDER_ID'),
    ],

    /*
     * This is model that will be used to for push subscriptions.
     */
    'model' => \NotificationChannels\WebPush\PushSubscription::class,

    /*
     * This is the name of the table that will be created by the migration and
     * used by the PushSubscription model shipped with this package.
     */
    'table_name' => env('WEBPUSH_DB_TABLE', 'push_subscriptions'),

    /*
     * This is the database connection that will be used by the migration and
     * the PushSubscription model shipped with this package.
     */
    'database_connection' => env('WEBPUSH_DB_CONNECTION', env('DB_CONNECTION', 'mysql')),

];
