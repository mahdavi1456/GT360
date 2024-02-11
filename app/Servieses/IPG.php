<?php

namespace App\Servieses;

use app\Models\Transaction;
use Gatewayes\Zarinpal;

class IPG
{

    public function start()
    {
        $zp = new Zarinpal();
        $zp->Start();
    }

    public function verify()
    {
        $zp = new Zarinpal();
        $zp->Verify();
    }

}
