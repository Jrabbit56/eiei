<?php

namespace App\Controllers;

class ElectricBill extends BaseController 
{
    public function index()
    {
        $model = model(BuildingModel::class);
        $buildings = $model->getAllBuildings();
        
        
        $this->renderView('ElectricBill/index', [
            'buildings' => $buildings
        ]);
    }
    public function building($id)
    {
            echo $id ;
    }
}