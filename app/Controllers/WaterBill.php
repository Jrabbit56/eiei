<?php

namespace App\Controllers;
use App\Models\BuildingModel;

class WaterBill extends BaseController 
{
    public function index()
    {
        $model = model(BuildingModel::class);
        $buildings = $model->getAllBuildings();
        
        
        $this->renderView('WaterBill/index', [
            'buildings' => $buildings
        ]);
    }
    public function building($id)
    {
            echo $id ;
    }
}