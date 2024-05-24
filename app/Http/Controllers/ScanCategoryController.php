<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ScanCategory;
use Illuminate\Http\Request;

class ScanCategoryController extends Controller
{
    public function index()
    {
        $scans = ScanCategory::all();
        return view('layouts.scans.index', compact('scans'));
    }

    public function create()
    {
        return view('layouts.radiology.scans.create');
    }

    public function store(Request $request)
    {
        $itemController = new ItemController();
        try {
            $item = Item::create([
                'item_code'=>'MDHI'.rand(0000, 9999),
                'item_description'=>$request->name,
                'item_group_id'=>2,
                'si_unit'=>'n/a',
                'price_unit'=>$request->unit_price,
                'base_price'=>$request->base_price,
                'tariff_code'=>$request->tariff_code
            ]);
           
            $scan = ScanCategory::create([
                'name' => $request->name,
                'description' => 'n/a',
                'item_id'=>$item->id
            ]);
            
            $itemController->generatePriceList();

        } catch (\Exception $e) {

            return redirect()->back()->with('error','Could Not Create Scan/Test Name. '.$e->getMessage());
        }
        return redirect()->back()->with('success','Scan Name Defination Saved Successfully.');
    }
}
