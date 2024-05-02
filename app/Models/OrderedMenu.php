<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderedMenu extends Model
{
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}



$popularMenus = OrderedMenu::select('menu_id', DB::raw('COUNT(*) as total'))
    ->groupBy('menu_id')
    ->orderByDesc('total')
    ->take(5) // Ambil 5 menu teratas
    ->get();

// Tampilkan hasil
foreach ($popularMenus as $menu) {
    $menuName = $menu->menu->name;
    $totalOrders = $menu->total;
    echo "Menu: $menuName, Total Pesanan: $totalOrders\n";
}

