<?php

namespace App\Models;

use CodeIgniter\Model;

class BuildingModel extends Model {
    protected $table = "building";
    protected $primaryKey = "BuildingID";

    public function getAllBuildings() {
        return $this->orderBy('BuildingID', 'asc')->findAll();
    }
}
