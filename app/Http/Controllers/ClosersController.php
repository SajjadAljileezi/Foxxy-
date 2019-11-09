<?php

namespace App\Http\Controllers;
use App\Client;
use App\Closers;
use Illuminate\Http\Request;


class ClosersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
         {
         $closers= Client:: select('id','closer_name','company','packages')->where('active',true)->get();
         return ($closers);
    }
    public function unactive()
    {
    $unactive= Client:: select('id','closer_name','company','canceled_date')->where('active',false)->get();
    return ($unactive);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all()
    {
         $all=Client:: select( 'closer_name','id','packages','company' )->where('active',true)->get();
        return ($all);
    }


    public function closers()
    {
        // $all=Client:: select( 'closer_name' )->where('active',true)->get();
        // foreach($all as $key => $value){
        //     return($value->closer_n);
        // }

         $nate= Closers::get();

        return ($nate);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $priceInput=$request->only('accounts');
        foreach($priceInput as $i => $chargeArray){
            foreach ($chargeArray as $j=> $charge){
                $c=[ 'closer_name' => $charge['closer_name'],
                 'commissions' => $charge['commissions']


              ];

                $closer=Closers::create($c);

            }}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients=Closers::findOrFail($id);

        return($clients);
    }

    public function shows()
    {
        $closersname= Closers::get();
        return ($closersname);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $close=Closers::findOrFail($id);

        $close->update($request->all());
        return response()->json(['message'=>'Client Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Closers $id)
    {
        $deleteid = Closers::findOrFail($id);
         $deleteid->each->delete($id);
         return response()->json(['message'=>'Client Updated Successfully']);
    }
}
