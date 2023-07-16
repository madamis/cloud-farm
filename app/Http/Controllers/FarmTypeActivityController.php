<?php

namespace App\Http\Controllers;

use App\Models\FarmTypeActivity;
use Illuminate\Http\Request;

class FarmTypeActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function move(Request $request)
    {
        $farmTypeActivity = FarmTypeActivity::findOrFail($request->farm_type_activity);

        if($request->movement == 'UP')
        {
            $farmTypeActivity->moveUp();
        }
        if($request->movement == 'DOWN')
        {
            $farmTypeActivity->moveDown();
        }
        return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FarmTypeActivity $farmTypeActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmTypeActivity $farmTypeActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmTypeActivity $farmTypeActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmTypeActivity $farmTypeActivity)
    {
        //
    }
}
