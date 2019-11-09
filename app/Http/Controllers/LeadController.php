<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeadController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaded=Lead::orderBy('time', 'ASC')->get();
       return($leaded);
    }




        public function today()
        {
            $current_date = Carbon::now()->timezone('America/Los_Angeles')->format('d');
            $current_month = Carbon::now()->timezone('America/Los_Angeles')->format('m');
            // return ($current_month);
            $leadeds=Lead::whereDay('time', '=', $current_date)
            ->whereMonth('time', '=', $current_month)->get();
            return ($leadeds);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Responseleadeds
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
        $data = $request->validate([
            'name'=> 'required|string',
            'company'=> 'required',
            'address'=> 'required',
             'phone'=> 'required',
             'email'=> 'required',
             'website'=> 'required',
             'appointment'=> 'required',
             'time'=> 'required',
             'notes'=> 'required',
                  ]);
           $client = Lead::create($data);
           return response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients=Lead::findOrFail($id);

        return($clients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer=Lead::findOrFail($id);
        $customer->update($request->all());
        return response()->json(['message'=>'Client Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
