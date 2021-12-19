<?php

namespace App\Controllers;

class ElectricBill extends BaseController 
{
    public function index()
    {
        $this->renderView('ElectricBill/index');
    }
}