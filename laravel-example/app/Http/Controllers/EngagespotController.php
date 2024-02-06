<?php

namespace App\Http\Controllers;

use Engagespot\EngagespotClient;
use Illuminate\Http\Request;

class EngagespotController extends Controller
{
    /**
     * Create or update a user in Engagespot.
     *
     * This method will create a new user in Engagespot if the user does not exist,
     * or update the existing user's profile if the user already exists.
     *
     * @return array The result of the create or update operation.
     */
    public function createEngagespotUser()
    {
        // Retrieve API key and secret from environment variables
        $apiKey = env("X_ENGAGESPOT_API_KEY");
        $apiSecret = env("X_ENGAGESPOT_API_SECRET");

        // Initialize Engagespot client
        $engagespot = new EngagespotClient($apiKey, $apiSecret);

        // Define unique identifier for the user
        $userUniqueIdentifier = 'john@test.com';

        // Define user profile data
        $userProfile = [
            'email' => 'john@test.com',
            'firstName' => 'John',
            'phoneNumber' => '+910000000000'
        ];

        // Create or update user in Engagespot
        $result = $engagespot->createOrUpdateUser($userUniqueIdentifier, $userProfile);
        return $result;
    }

    /**
     * Send a notification to a specific Engagespot user.
     *
     * This method will send a notification to a specific user in Engagespot.
     *
     * @return array The result of the send operation.
     */
    public function sendNotificationToEngagespotUser()
    {
        // Retrieve API key and secret from environment variables
        $apiKey = env("X_ENGAGESPOT_API_KEY");
        $apiSecret = env("X_ENGAGESPOT_API_SECRET");

        // Initialize Engagespot client
        $engagespot = new EngagespotClient($apiKey, $apiSecret);

        // Define unique identifier for the user
        $userUniqueIdentifier = 'john@test.com';

        // Define notification data
        $notificationData = [
            'notification' => [
                'title' => 'This is an example message!',
            ],
            'sendTo' => [
                'recipients' => [$userUniqueIdentifier],
            ],
        ];

        // Send notification to user
        return $engagespot->send($notificationData);
    }

    /**
     * Generate a user token for a specific Engagespot user.
     *
     * This method will generate a user token for a specific user in Engagespot.
     *
     * @return string The generated user token.
     */
    public function generateUserToken()
    {
        // Retrieve API key, secret, and signing key from environment variables
        $apiKey = env("X_ENGAGESPOT_API_KEY");
        $apiSecret = env("X_ENGAGESPOT_API_SECRET");
        $signingKey = env("X_ENGAGESPOT_SIGNING_KEY");

        // Initialize Engagespot client
        $engagespot = new EngagespotClient($apiKey, $apiSecret);

        // Set signing key in Engagespot client configuration
        $engagespot->setConfig('signingKey', $signingKey);

        // Define unique identifier for the user
        $userUniqueIdentifier = 'john@test.com';

        // Generate user token
        return $engagespot->generateUserToken($userUniqueIdentifier);
    }
}
