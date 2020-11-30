<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteMenu;

class SiteProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SiteMenu::all();
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
    





       

        $input = $request->only(['MenuId','UrunTuru','UrunAdi','UrunFiyati','ParaBirimi','KdvOrani','UrunAciklamasi','UrunResmiBir','UrunResmiIki','UrunResmiUc','UrunResmiDort',
        'VaryantBasligi','KargoUcreti','Durumu','ToplamSatisSayisi','YorumSayisi','ToplamYorumPuani','GoruntulenmeSayisi']);


        
     

     

       if($input){
    
        $first_name  = $request->first_name;
        $last_name   = $request->last_name;
        $description = $request->description;
        $tc_no       = $request->tc_no;
        $age         = $request->age;
        $state       = $request->cv_state;
 
        $CvList = Cvlist::create(['first_name' => $first_name, 'last_name'=> $last_name, 'description'=>$description,'tc_no'=>$tc_no,'age'=>$age,'cv_state'=>$state]);
        return response()->json(['success'=> true, 'message'=> 'Kayıt yapıldı..!']);
 
    
          
       }else{
        return response()->json(['success'=> false, 'error'=> $validator->messages()],203);

       }
      


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
        //
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
