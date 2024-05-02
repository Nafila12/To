<?php

namespace App\Http\Controllers;

use App\Models\OrderedMenu;
use App\Http\Requests\StoreOrderedMenuRequest;
use App\Http\Requests\UpdateOrderedMenuRequest;
use Illuminate\Support\Facades\DB;

class OrderedMenuController extends Controller
{

public function showPopularMenus()
{
    $popularMenus = OrderedMenu::select('menu_id', DB::raw('COUNT(*) as total'))
        ->groupBy('menu_id')
        ->orderByDesc('total')
        ->take(5) // Ambil 5 menu teratas
        ->get();

    return view('popular_menus', compact('popularMenus'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderedMenuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderedMenu $orderedMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderedMenu $orderedMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderedMenuRequest $request, OrderedMenu $orderedMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderedMenu $orderedMenu)
    {
        //
    }
}
