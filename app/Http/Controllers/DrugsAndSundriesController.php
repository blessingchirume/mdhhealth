<?php

namespace App\Http\Controllers;

use App\Models\DrugsAndSundries;
use App\Models\MedicalItemsCategory;
use Exception;
use Illuminate\Http\Request;
use Auth;

class DrugsAndSundriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $drugsAndSundries = DrugsAndSundries::with('categories')->paginate(10);
        $drugCategories = MedicalItemsCategory::all();
        return view('layouts.drugs_and_sundries.medications', compact('drugsAndSundries','drugCategories'));
    }

    /**
     * Show the list of medical items categories
     */
    public function categories()
    {
        $medicalCategories = MedicalItemsCategory::paginate(10);
        return view('layouts.drugs_and_sundries.categories', compact('medicalCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
       // try{
            $drug = DrugsAndSundries::create([
                'code'=>$request->code,
                'name'=>$request->name,
                'description'=>$request->description,
                'medical_categories_id'=>$request->drug_category,
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d'),
                'created_by' =>Auth::user()->id,
                'updated_by'=>Auth::user()->id
            ]);

            return redirect()->back()->with('success','Drug or Sundry Added Succefully');
        /*}catch(Exception $e){
            return redirect()->back()->with('error','Could not Add Drug or Sundry. Please Contact system Admin For Assistance.');
        }*/
    }

    public function createCategory(Request $request)
    {
       // try{
            $drug = MedicalItemsCategory::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d')
            ]);

            return redirect()->back()->with('success','Drug or Sundry Added Succefully');
        /*}catch(Exception $e){
            return redirect()->back()->with('error','Could not Add Drug or Sundry. Please Contact system Admin For Assistance.');
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DrugsAndSundries  $drugsAndSundries
     */
    public function show(DrugsAndSundries $drugsAndSundries)
    {
        return view('layouts.drugs_and_sundries.show', compact('drugsAndSundries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DrugsAndSundries  $drugsAndSundries
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugsAndSundries $drugsAndSundries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DrugsAndSundries  $drugsAndSundries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugsAndSundries $drugsAndSundries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DrugsAndSundries  $drugsAndSundries
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugsAndSundries $drugsAndSundries)
    {
        //
    }
}
