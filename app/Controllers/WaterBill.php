<?php

namespace App\Controllers;

class WaterBill extends BaseController 
{
    public function index()
    {
        $this->renderView('WaterBill/index');
    }
}