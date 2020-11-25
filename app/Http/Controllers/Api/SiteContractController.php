<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteContractResource;

use App\Models\contract;
use Illuminate\Http\Request;

class SiteContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SiteContractResource::collection(contract::all());

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $contractdata = contract::find($id);
        if($contractdata->count()){
            $contractdata->update($request->only('HakkimizdaMetni','UyelikSozlesmesiMetni','KullanimKosullariMetni','GizlilikSozlesmesiMetni','MesafeliSatisSozlesmesiMetni','TeslimatMetni','IptalIadeDegisimMetni'));
          return response()->json(['message' => 'başarılı bir şekilde Güncellenmiştir..!']);
        } else {
          return response()->json(['message'=>'Güncelleme sırasında hata oluştu..!']);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
