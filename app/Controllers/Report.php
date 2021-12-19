<?php

namespace App\Controllers;

class Report extends BaseController 
{
    public function index()
    {
        $this->renderView('Report/index');
    }
}