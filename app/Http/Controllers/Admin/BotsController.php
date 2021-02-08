<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Viber\Client;

class BotsController extends Controller
{

    public function bots()
    {
        return view('admin.bot.index');
    }

    public function viber()
    {
        return view('admin.bot.viber.create');
    }

    public function viberHook()
    {
        $apiKey = config('services.viber.client_secret');
        $webhookUrl = config('services.viber.redirect');

        try {
            $client = new Client(['token' => $apiKey]);
            $client->setWebhook($webhookUrl);
            return redirect()->back()->with(['success' => "Webhook установлен"]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['alert' => "Webhook  не установлен"]);
        }
    }

}

