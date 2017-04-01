<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
use Theme;

class ExchangeRates extends AbstractWidget
{
    public function run()
    {
        return Cache::tags(['Widget', 'Core', 'ExchangeRates'])->rememberForever('ExchangeRates', function()  {

            $connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');

            $usdBuying = $connect_web->Currency[0]->BanknoteBuying;
            $usdSelling = $connect_web->Currency[0]->BanknoteSelling;
            $euroBuying = $connect_web->Currency[3]->BanknoteBuying;
            $euroSelling = $connect_web->Currency[3]->BanknoteSelling;
            return Theme::view('frontend.widgets.exchange_rates',compact([
                'usdBuying',
                'usdSelling',
                'euroBuying',
                'euroSelling',
            ]))->render();
        });
    }
}