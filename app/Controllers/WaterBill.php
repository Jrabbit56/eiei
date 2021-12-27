<?php

namespace App\Controllers;
use App\Models\BuildingModel;
use App\Models\RoomModel;
use App\Models\BillModel;

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
        helper('thai_months');
        $model = model(BillModel::class);

        $thaiMonths = get_thai_months();
        $currentMonth = date('n');
        $currentYear = date('Y');
        $lastMonthMeterUnit = 0;

        $currentMonth = $this->request->getPost('BillingMonth') ?: date('n');
        $currentYear = $this->request->getPost('BillingYear') ?: date('Y');
        $meterUnit = $this->request->getPost('MeterUnit') ?: 0;

        // Get current month bill.
        $bill = $model->getBillByMonthAndYear($currentMonth, $currentYear);
        if(!empty($bill)) {
            $meterUnit = $bill['MeterUnit'];
        }

        $lastMonth = $currentMonth;
        $lastYear = $currentYear;
        if($currentMonth == 1) {
            $lastMonth = 12;
            $lastYear = $currentYear - 1;
        } else {
            $lastMonth = $currentMonth - 1;
        }

        $lastMonthBill = $model->getBillByMonthAndYear($lastMonth, $lastYear);
        if(!empty($lastMonthBill)) {
            $lastMonthMeterUnit = $lastMonthBill['MeterUnit'];
        }

        if( $this->request->getMethod() === 'post' ) {
            if(!empty($bill)) {
                $bill['MeterUnit'] = $this->request->getPost('MeterUnit');
            } else {
                $bill = [
                    'RoomID' => $id,
                    'BillingMonth' => $currentMonth,
                    'BillingYear' => $currentYear,
                    'BillingType' => 'WATER',
                    'MeterUnit' => $this->request->getPost('MeterUnit')
                ];
            }
            
            $model->save($bill);
        }

        $this->renderView('WaterBill/room', [
            'months' => $thaiMonths,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
            'meterUnit' => $meterUnit,
            'lastMonthMeterUnit' => $lastMonthMeterUnit
        ]);
    }
}