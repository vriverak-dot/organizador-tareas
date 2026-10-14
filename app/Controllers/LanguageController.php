<?php

namespace App\Controllers;

class languageController extends BaseController
{
    public function switch($locale)
    {
        if (in_array($locale, ['en', 'es'])) {
            session()->set('locale', $locale);
            service('language')->setLocale($locale);
        }
        return redirect()->back();
    }
}