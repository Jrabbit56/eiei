<?php

namespace App\Controllers;

use App\Models\RoomModel;

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

    public function building()
    {
        $roomModel = model(RoomModel::class);
        $rooms =$roomModel->getAllRooms();   

        $this->renderView('ElectricBill/index/building', [
            'rooms' => $rooms
        ]);
    }

    
}