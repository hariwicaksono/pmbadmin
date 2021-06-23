<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $status = session()->get();
        if($status['STATUS']!='2'){return redirect()->to('/');}
        $data = [
            'title' => 'Starter Project CodeIgniter 4'
        ];

        return view('dashboard/index', $data);
    }
}