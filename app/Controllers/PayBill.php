<?php

namespace App\Controllers;

class PayBill extends BaseController 
{
    public function index()
    {
        $model = model(BuildingModel::class);
        $buildings = $model->getAllBuildings();
        
        
        $this->renderView('PayBill/index', [
            'buildings' => $buildings
        ]);
    }
    public function building($id)
    {
            echo $id ;
    }
}