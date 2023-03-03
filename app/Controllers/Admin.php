<?php

namespace App\Controllers;

class Admin extends BaseController
{

    public function __construct()
    {
        helper('form');
    }
    public function index()
    {

$data = [
    'title' => 'Dashboard',
    'page' => 'master/v_admin'
];
        return view('tampilan', $data);
    }



}
