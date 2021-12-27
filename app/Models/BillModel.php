<?php

namespace App\Models;

use CodeIgniter\Model;

class BillModel extends Model {
    protected $table = "bill";
    protected $primaryKey = "ID";
    protected $allowedFields = ['RoomID', 'BillingMonth', 'BillingYear', 'BillingType', 'MeterUnit'];

    public function getBillByMonthAndYear($month, $year) {
        return $this->where([
            'BillingMonth' => $month,
            'BillingYear' => $year
        ])
        ->first();
    }
}