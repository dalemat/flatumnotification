<?php

use Flarum\Extend;
use CryptoFXSignal\OneSignal\Listeners\DiscussionPosted;
use Flarum\Discussion\Event\Started;

return [
    // Listen for new discussions and send notifications
    (new Extend\Event)
        ->listen(Started::class, DiscussionPosted::class),
    
    // Add admin settings for OneSignal configuration
    (new Extend\Settings)
        ->serializeToForum('cryptofx.onesignal.app_id', 'cryptofx.onesignal.app_id')
        ->default('cryptofx.onesignal.app_id', '')
        ->default('cryptofx.onesignal.api_key', '')
        ->default('cryptofx.onesignal.enabled', true),
        
    // Add admin frontend assets
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),
];
