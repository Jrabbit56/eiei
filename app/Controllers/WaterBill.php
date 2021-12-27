<?php

namespace App\Controllers;
use App\Models\BuildingModel;
use App\Models\RoomModel;

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
        $model = model(RoomModel::class);
        $rooms = $model->getAllRoomsByBuildingID($id);

        $this->renderView('WaterBill/building', [
            'rooms' => $rooms
        ]);
    }

    public function room($id)
    {
        echo $id;
    }
}