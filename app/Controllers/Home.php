<?php

namespace App\Controllers;

use App\Models\RoomModel;

class Home extends BaseController
{
    public function index()
    {
        return view('Home/index');
    }

    public function welcome($msg)
    {
        $model = model(RoomModel::class);

        $rooms = $model->findAll();

        return view('Home/welcome', [
            'msg' => $msg,
            'rooms' => $rooms
        ]);
    }
}
