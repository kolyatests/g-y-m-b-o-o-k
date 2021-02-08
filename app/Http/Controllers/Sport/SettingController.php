<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use Auth;
use Config;

class SettingController extends Controller//
{

    public function setUserLanguage(string $lang)
    {
        switch ($lang) {
            case 'English':
                $loc = 'en';
                $langId = 'eng';
                break;
            case 'Русский':
                $loc = 'ru';
                $langId = 'rus';
                break;
            case 'Deutsch':
                $loc = 'de';
                $langId = 'deu';
                break;
            case 'Español':
                $loc = 'es';
                $langId = 'spa';
                break;
            case 'Português':
                $loc = 'pt';
                $langId = 'por';
                break;
            default:
                $loc = 'ru';
                $langId = 'rus';
        }

        $locale = $loc;
        if (in_array($locale, Config::get('app.locales'))) {
            session(['locale' => $locale]);
            session(['lang_id' => $langId]);
            Auth::user()->update(['lang_id' => $langId]);
        }

        return back();
    }

    public function setUserMass(int $mass)
    {
        session(['weight_id' => $mass]);
        Auth::user()->update(['weight_id' => $mass]);

        return back();
    }

    public function setUserWeight(int $dist)
    {
        session(['unit_id' => $dist]);
        Auth::user()->update(['unit_id' => $dist]);
        return back();
    }

    public function setUserDay(int $calendar_day)
    {
        session(['calendar_id' => $calendar_day]);
        Auth::user()->update(['calendar_id' => $calendar_day]);
        return back();
    }
}
