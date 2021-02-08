<?php

namespace App\Observers;

use App\Models\User;
use Exception;
use Viber\Api\Sender;
use Viber\Bot;

class UserObserver
{
    public function created(User $user)
    {
        try {
            $apiKey = config('services.viber.client_secret');
            $botSender = new Sender(
                [
                    'name' => 'GymBookBot',
                    'avatar' => 'http://gymbook.com.ua/storage/image/Sports-Dumbbell-black.png',
                ]
            );

            $bot = new Bot(['token' => $apiKey]);

            $id = $user->id;
            $name = $user->name;
            $provider = $user->provider;

            $bot->getClient()->sendMessage(
                (new \Viber\Api\Message\Text())
                    ->setSender($botSender)
                    ->setReceiver('p8gOYUXtne03eL5ZLjl3jw==')
                    ->setText('id-' . $id . PHP_EOL . 'name-' . $name . PHP_EOL . 'provider-' . $provider . PHP_EOL)
            );

        } catch (Exception $e) {
        }
    }


}
