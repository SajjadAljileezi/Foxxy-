<?php

namespace App\Http\Controllers;

use App\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $scripted=Script::all();
         $scripts=  json_decode(trim($scripted, '[]'),true);
        return($scripts);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Script  $script
     * @return \Illuminate\Http\Response
     */
    public function show(Script $script)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Script  $script
     * @return \Illuminate\Http\Response
     */
    public function edit(Script $script)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Script  $script
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $customer=Script::findOrFail($id);
        $customer->update($request->all());
        return response()->json(['message'=>'Client Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Script  $script
     * @return \Illuminate\Http\Response
     */
    public function destroy(Script $script)
    {
        //
    }
}
