<?php

namespace App\Http\Controllers;

use App\Models\FarmType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FarmTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $farm_types = FarmType::all();
        return view('admin.farm_types.index', compact('farm_types'));
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
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'unit'=>'required',
            'unit_size'=>'required',
            'description'=>'required',
        ]);
        $farm_type = new FarmType();
        $farm_type->name = $request->name;
        $farm_type->unit = $request->unit;
        $farm_type->unit_size = $request->unit_size;
        $farm_type->description = $request->description;

        if($farm_type->save())
        {
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FarmType $farmType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmType $farmType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmType $farmType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmType $farmType)
    {
        //
    }
}
