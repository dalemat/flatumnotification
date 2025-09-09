<?php

namespace CryptoFXSignal\OneSignal\Listeners;

use Flarum\Discussion\Event\Started;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\Foundation\ErrorHandling\LogReporter;

class DiscussionPosted
{
    protected $settings;

    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function handle(Started $event)
    {
        // Check if OneSignal notifications are enabled
        if (!$this->settings->get('cryptofx.onesignal.enabled', true)) {
            return;
        }

        // Get OneSignal configuration from Flarum admin settings
        $appId = $this->settings->get('cryptofx.onesignal.app_id');
        $apiKey = $this->settings->get('cryptofx.onesignal.api_key');
        
        // Skip if OneSignal is not properly configured
        if (empty($appId) || empty($apiKey)) {
            return;
        }

        $discussion = $event->discussion;
        $user = $event->actor;
        
        // Don't send notifications for private discussions
        if ($discussion->is_private) {
            return;
        }

        // Prepare notification content
        $title = "🚀 New CryptoFX Signal";
        $message = $this->formatNotificationMessage($discussion->title);
        $url = url("/d/{$discussion->id}-{$discussion->slug}");
        
        // Send the push notification
        $this->sendOneSignalNotification($appId, $apiKey, $title, $message, $url);
    }

    /**
     * Format the notification message for crypto/forex context
     */
    private function formatNotificationMessage($title)
    {
        // Add emoji based on common crypto/forex keywords
        $cryptoKeywords = ['BTC', 'ETH', 'CRYPTO', 'BITCOIN', 'ETHEREUM'];
        $forexKeywords = ['USD', 'EUR', 'GBP', 'JPY', 'FOREX', 'FX'];
        
        $upperTitle = strtoupper($title);
        
        foreach ($cryptoKeywords as $keyword) {
            if (strpos($upperTitle, $keyword) !== false) {
                return "₿ " . $title;
            }
        }
        
        foreach ($forexKeywords as $keyword) {
            if (strpos($upperTitle, $keyword) !== false) {
                return "💱 " . $title;
            }
        }
        
        return "📊 " . $title; // Default trading signal emoji
    }

    /**
     * Send notification via OneSignal API
     */
    private function sendOneSignalNotification($appId, $apiKey, $title, $message, $url)
    {
        $fields = [
            'app_id' => $appId,
            'included_segments' => ['Subscribed Users'],
            'headings' => ['en' => $title],
            'contents' => ['en' => $message],
            'url' => $url,
            'chrome_web_icon' => url('/assets/favicon.ico'),
            'large_icon' => url('/assets/favicon.ico'),
            'android_sound' => 'default',
            'ios_sound' => 'default',
            'android_channel_id' => 'cryptofx-signals',
            'priority' => 10, // High priority for trading signals
            'ttl' => 3600 // 1 hour TTL for trading signals
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic ' . $apiKey
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        // Log errors for debugging
        if ($httpCode !== 200 || !$response) {
            $error = curl_error($ch);
            LogReporter::log(
                new \Exception("CryptoFX OneSignal Error: HTTP $httpCode - Response: $response - cURL Error: $error")
            );
        } else {
            // Log successful notifications (optional)
            $responseData = json_decode($response, true);
            if (isset($responseData['id'])) {
                error_log("CryptoFX OneSignal: Notification sent successfully - ID: {$responseData['id']}");
            }
        }
        
        curl_close($ch);
        
        return $response;
    }
}
