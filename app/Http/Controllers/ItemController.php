<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Package;
use App\Models\PackageItem;
use App\Models\PriceGroup;

class ItemController extends Controller
{

    public function index()
    {
        $collection = Item::all();
        return view('layouts.items.index', compact('collection'));
    }

    public function create()
    {
        //
    }

    public function store(StoreItemRequest $request)
    {
        //
    }

    public function show(Item $item)
    {
        return view('layouts.items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        //
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    public function destroy(Item $item)
    {
        //
    }

    public function generatePriceList()
    {

        $items = Item::all();
        $packages = Package::all();

        try {
            PriceGroup::truncate();
            foreach ($items as $item) {
                foreach ($packages as $package) {
                    if ($item->id != 0) {
                        PriceGroup::create([
                            'item_id' => $item->id,
                            'package_id' => $package->id,
                            'price' => $item->base_price
                        ]);
                    }
                }
            }

            return redirect()->back()->with('success', 'Product to package price mapping has been successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
