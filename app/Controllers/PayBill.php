<?php

namespace App\Controllers;

class PayBill extends BaseController 
{
    public function index()
    {
        $this->renderView('PayBill/index');
    }
}