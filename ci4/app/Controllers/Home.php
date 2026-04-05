<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home', [
            'title' => 'Halaman Home',
            'content' => 'Selamat datang di website sederhana dengan CodeIgniter 4'
        ]);
    }
}