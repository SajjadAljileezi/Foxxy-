<?php

namespace App\Http\Controllers;
use App\Closers;
use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Client::all();
        return($clients);

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
        $data = $request->validate([
            'name'=> 'required|string',
            'company'=> 'required',
            'address'=> 'required',
             'phone'=> 'required',
             'email'=> 'required',
             'website'=> 'required',
             'keywords'=> 'required',
             'adword'=> 'nullable|boolean',
             'closer_name'=> 'required',
             'city_campaign'=> 'required',
             'packages'=> 'required',
             'adword_start'=> 'nullable|date',
             'adword_end'=> 'nullable|date',
             'adword_phrases'=> 'required',
             'active'=> 'required|boolean',
             'facebook'=> 'required|boolean',
             'twitter'=> 'nullable|boolean',
             'ourwebsite'=> 'nullable|boolean',
             'call_back'=> 'nullable|date',
             'review_managment'=> 'nullable|boolean',
             'is_call_back'=> 'nullable|boolean',
             'price'=> 'required',
             'notes'=> 'required',
           ]);
           $client = Client::create($data);
           $user= $request->get('closer_name');
           $comm=Closers::where('closer_name',$user)->get('commissions');
           $final= preg_replace('/\D/', '', $comm);

           $adds=Closers::where('closer_name',$user)->increment('commission', $final);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients=Client::findOrFail($id);

        return($clients);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer=Client::findOrFail($id);
        $customer->update($request->all());
        $active= $request->get('active');
        if ($active ==0) {
            $user= $request->get('closer_name');
            $comm=Closers::where('closer_name',$user)->get('commissions');
           $final= preg_replace('/\D/', '', $comm);

           $adds=Closers::where('closer_name',$user)->decrement('commission', $final);

        return response()->json(['message'=>'Client Updated Successfully']);
    }else{
        $user= $request->get('closer_name');
        $comm=Closers::where('closer_name',$user)->get('commissions');
       $final= preg_replace('/\D/', '', $comm);

       $adds=Closers::where('closer_name',$user)->increment('commission', $final);

    return response()->json(['message'=>'Client Updated Successfully']);
    }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $id)
    {
        $deleteid = Client::findOrFail($id);
         $deleteid->each->delete($id);
         return response()->json(['message'=>'Client Updated Successfully']);
    }
}
