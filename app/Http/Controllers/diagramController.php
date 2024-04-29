<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\stok;
use Illuminate\Http\Request;

class diagramController extends Controller
{
    public function index()
    {
        $menu = Menu::get();
        $data['count_menu'] = $menu->count();
        $stok = stok::get();
        $data['count_stok'] = $stok->count();
        return view('tamplate.dashboard')->with($data);
    }
}
