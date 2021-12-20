<?php

namespace App\Controllers;

class Report extends BaseController 
{
    public function index()
    {
        $model = model(BuildingModel::class);
        $buildings = $model->getAllBuildings();
        
        
        $this->renderView('Report/index', [
            'buildings' => $buildings
        ]);
    }
    public function building($id)
    {
            echo $id ;
    }
}