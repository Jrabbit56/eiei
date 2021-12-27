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
        $meterUnit = 0;
        $lastMonthMeterUnit = 0;

        $month = $this->request->getPost('BillingMonth') ?: $currentMonth;
        $year = $this->request->getPost('BillingYear') ?: $currentYear;

        // Get current month bill.
        $bill = $model->getBillByMonthAndYear($month, $year);
        if(!empty($bill)) {
            $meterUnit = $bill['MeterUnit'];
        }

        $lastMonth = $month;
        $lastYear = $year;
        if($month == 1) {
            $lastMonth = 12;
            $lastYear = $year - 1;
        } else {
            $lastMonth = $month - 1;
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
                    'BillingMonth' => $month,
                    'BillingYear' => $year,
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