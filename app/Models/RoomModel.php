<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model {
    protected $table = "room";
    protected $primaryKey = "RoomID";

    public function getAllrooms() {
        return $this->orderBy('RoomID', 'asc')->findAll();
}