<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteMenu;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;





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

        //request ile file gelen resim dosyasını yakalamaya bakılacak
        $file = $request->file('file');
        dd($file);
        die();
    
  
    $productMenuIdSelected = SiteMenu::where('id', $request->MenuId)->get();

  

    foreach($productMenuIdSelected as $product){

        if($product->UrunTuru == "Erkek Ayakkabısı"){
            $ResimKlasoru	=	"UrunResimleri/Erkek/";
        }elseif($product->UrunTuru == "Kadın Ayakkabısı"){
            $ResimKlasoru	=	"UrunResimleri/Kadin/";
        }elseif($product->UrunTuru == "Çocuk Ayakkabısı"){
            $ResimKlasoru	=	"UrunResimleri/Cocuk/";
        }   

     if($product->id == $request->MenuId){

        $input = $request->only(['MenuId','UrunTuru','UrunAdi','UrunFiyati','ParaBirimi','KdvOrani','UrunAciklamasi','UrunResmiBir','UrunResmiIki','UrunResmiUc','UrunResmiDort',
        'VaryantBasligi','KargoUcreti','Durumu','ToplamSatisSayisi','YorumSayisi','ToplamYorumPuani','GoruntulenmeSayisi']);

       if($input){
      
        $MenuId          = $request->MenuId;
        $UrunAdi         = $request->UrunAdi;
        $UrunFiyati      = $request->UrunFiyati;
        $ParaBirimi      = $request->ParaBirimi;
        $KdvOrani        = $request->KdvOrani;
        $KargoUcreti     = $request->KargoUcreti;
        $UrunAciklamasi  = $request->UrunAciklamasi;
        $UrunResmiBir    = $request->UrunResmiBir;
        $UrunResmiIki    = $request->UrunResmiIki;
        $UrunResmiUc     = $request->UrunResmiUc;
        $UrunResmiDort   = $request->UrunResmiDort;
        $VaryantBasligi  = $request->VaryantBasligi;
        $VaryantAdi      = $request->VaryantAdi;
        $KargoUcreti     = $request->KargoUcreti;
        $StokAdedi       = $request->StokAdedi;
 
        $ProductCreate = Product::create(['MenuId' => $MenuId, 'UrunTuru'=> $product->UrunTuru, 'UrunAdi'=> $UrunAdi, 'UrunFiyati'=>$UrunFiyati,'ParaBirimi'=>$ParaBirimi,'KdvOrani'=>$KdvOrani,'KargoUcreti'=>$KargoUcreti,
            'UrunAciklamasi'=>$UrunAciklamasi,'UrunResmiBir'=>$UrunResmiBir,'UrunResmiIki'=>$UrunResmiIki,'UrunResmiUc'=>$UrunResmiUc,'UrunResmiDort'=>$UrunResmiDort, 'Durumu'=> 1,'VaryantBasligi'=>$VaryantBasligi,
            
        ]);

        if($ProductCreate->count()){

                $id = Product::all()->last()->id;

                $image       = $request->input('file');
                $filename    = Product::find($id)->UrunAdi . time() . '.jpg';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(600, 800);
                $image_resize->save(public_path('upload/'.$ResimKlasoru . $filename));
             
         
            $menuProductCountUpdate = SiteMenu::find($MenuId);
            if($menuProductCountUpdate->count()){
                $menuProductCountUpdate->where('id', $MenuId)->update(['UrunSayisi' => DB::raw('UrunSayisi +1')]);

                $id = Product::all()->last()->id;

                $prdouctVariantCreate = ProductVariant::create(['UrunId'=>$id, 'VaryantAdi'=> $VaryantAdi,'StokAdedi'=>$StokAdedi]);
    
                if($prdouctVariantCreate->count()){
               
                   return response()->json(['success'=> true, 'message'=> 'Varyant Kayıtları yapıldı..!']);
                }else{
                    return response()->json(['success'=> false, 'error'=> 'Varyant Kayıt işlemi sırasında bir hata oluştu', 203]); 
                }

              return response()->json(['message' => 'Urunsayisi Urun Menu başarılı bir şekilde Güncellenmiştir..!']);
            } else {
              return response()->json(['message'=>'Urunsayisi Urun Menu Güncelleme sırasında hata oluştu..!']);
            } 
        }    

        return response()->json(['success'=> true, 'message'=> 'Kayıt yapıldı..!']);
          
       }else{

          return response()->json(['success'=> false, 'error'=> 'birhata oluştu', 203]);

        }
      }
        
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
