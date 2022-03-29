<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tarikhagustia\LaravelMt5\Entities\Trade;
use Tarikhagustia\LaravelMt5\LaravelMt5;
use Tarikhagustia\LaravelMt5\Entities\User;

class TraderApiController extends Controller
{
    /**
     * The result variable will return Trade class with ticket information,
     * you can grab ticket number by calling $result->getTicket()
     */
    public function createDeposit()
    {
        $api = new LaravelMt5();
        $trade = new Trade();
        $trade->setLogin(6000189);
        $trade->setAmount(100);
        $trade->setComment("Deposit");
        $trade->setType(Trade::DEAL_BALANCE);
        $result = $api->trade($trade);
    }
    //
    public function createTrader()
    {
        $api = new LaravelMt5();
        $user = new User();
        $user->setName("John Due");
        $user->setEmail("john@due.com");
        $user->setGroup("demo\demoforex");
        $user->setLeverage("50");
        $user->setPhone("0856123456");
        $user->setAddress("Sukabumi");
        $user->setCity("Sukabumi");
        $user->setState("Jawa Barat");
        $user->setCountry("Indonesia");
        $user->setZipCode(1470);
        $user->setMainPassword("Secure123");
        $user->setInvestorPassword("NotSecure123");
        $user->setPhonePassword("NotSecure123");
    }
    //Get Trading Account Information
    public function traderInformation()
    {
        $api = new LaravelMt5();
        $user = $api->getTradingAccounts($login);

        $balance = $user->Balance;
        $equity = $user->Equity;
        $freeMargin = $user->MarginFree;
    }
    //Get Trading History By Login Number
    public function traderHistory()
    {
        $api = new LaravelMt5();
        // Get Closed Order Total and pagination
        $total = $api->getOrderHistoryTotal($exampleLogin, $timestampfrom, $timestampto);
        $trades = $api->getOrderHistoryPagination($exampleLogin, $timestampfrom, $timestampto, 0, $total);
        foreach ($trades as $trade) {
            // see class MTOrder
            echo "LOGIN : ".$trade->Login.PHP_EOL;
            echo "TICKET : ".$trade->Order.PHP_EOL;
        }
    }
    //Open Order
    /**
     * The result variable will return User class with login information,
     *  you can grab login number by calling $result->getLogin()
     */
    public function openOrder()
    {
        $api = new LaravelMt5();
        $api->dealerSend([
            'Login' => 8113,
            'Symbol' => 'XAUUSD',
            'Volume' => 100,
            'Type' => 0
        ]);
    }

}
