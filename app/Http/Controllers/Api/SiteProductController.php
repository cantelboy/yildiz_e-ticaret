<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteMenu;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;



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

        $rules = [
            'MenuId'         => 'required',
            'UrunTuru'       => 'required',
            'UrunAdi'        => 'required',
            'UrunFiyati'     => 'required',
            'ParaBirimi'     => 'required',
            'KdvOrani'       => 'required',
            'UrunAciklamasi' => 'required',
            'VaryantBasligi' => 'required',
            'KargoUcreti'    => 'required',
            'VaryantAdi'     => 'required',
            'StokAdedi'      => 'required',
            'files'          => 'required',
        ];

        $input = $request->only([
            'MenuId', 'UrunTuru', 'UrunAdi', 'UrunFiyati', 'ParaBirimi', 'KdvOrani', 'UrunAciklamasi', 'UrunResmiBir',
            'VaryantBasligi', 'KargoUcreti', 'StokAdedi', 'VaryantAdi', 'files'
        ]);



        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()], 203);
        }

        $productMenuIdSelected = SiteMenu::where('id', $request->MenuId)->get();

        foreach ($productMenuIdSelected as $product) {

            if ($product->UrunTuru == "Erkek Ayakkabısı") {
                $ResimKlasoru    =    "UrunResimleri/Erkek/";
            } elseif ($product->UrunTuru == "Kadın Ayakkabısı") {
                $ResimKlasoru    =    "UrunResimleri/Kadin/";
            } elseif ($product->UrunTuru == "Çocuk Ayakkabısı") {
                $ResimKlasoru    =    "UrunResimleri/Cocuk/";
            }
            if ($product->id == $request->MenuId) {

                $MenuId          = $request->MenuId;
                $UrunAdi         = $request->UrunAdi;
                $UrunFiyati      = $request->UrunFiyati;
                $ParaBirimi      = $request->ParaBirimi;
                $KdvOrani        = $request->KdvOrani;
                $KargoUcreti     = $request->KargoUcreti;
                $UrunAciklamasi  = $request->UrunAciklamasi;
                $VaryantBasligi  = $request->VaryantBasligi;
                $KargoUcreti     = $request->KargoUcreti;

                $ProductCreate = Product::create([
                    'MenuId' => $MenuId, 'UrunTuru' => $product->UrunTuru, 'UrunAdi' => $UrunAdi, 'UrunFiyati' => $UrunFiyati, 'ParaBirimi' => $ParaBirimi, 'KdvOrani' => $KdvOrani, 'KargoUcreti' => $KargoUcreti,
                    'UrunAciklamasi' => $UrunAciklamasi, 'Durumu' => 1, 'VaryantBasligi' => $VaryantBasligi,
                ]);

                if ($ProductCreate->count()) {

                    if (count($request->files)) {

                        $result = $request->files;
                        foreach ($result as $imgs) {

                            for ($i = 0; $i < count($imgs); $i++) {
                                $filename    = Str::of($request->UrunAdi)->slug('-') . time() . rand(1, 50) . '.jpg';
                                $image_resize = Image::make($imgs[$i]->getRealPath())->resize(300, 500)->save(public_path('upload/' . $ResimKlasoru . $filename));
                                $UrunResmiDort = "";
                                if ($i === 0) {
                                    $UrunResmiBir = $filename;
                                } elseif ($i === 1) {
                                    $UrunResmiIki = $filename;
                                } elseif ($i === 2) {
                                    $UrunResmiUc = $filename;
                                } elseif ($i === 3) {
                                    $UrunResmiDort = $filename;
                                } else {
                                    return response()->json(['error' => true, 'message' => 'Enfaz her ürün için 4 resim yükleyebilirsiniz']);
                                }
                            }
                        }

                        $UrunResmiDort ? $UrunResmiDort : $UrunResmiDort = null;

                        $id = Product::all()->last()->id;
                        $ProductCreate = Product::where('id', $id)->update(['UrunResmiBir' => $UrunResmiBir, 'UrunResmiIki' => $UrunResmiIki, 'UrunResmiUc' => $UrunResmiUc, 'UrunResmiDort' => $UrunResmiDort]);
                    }
                    $menuProductCountUpdate = SiteMenu::find($request->MenuId);
                    if ($menuProductCountUpdate->count()) {
                        $menuProductCountUpdate->where('id', $request->MenuId)->update(['UrunSayisi' => DB::raw('UrunSayisi +1')]);

                        if (isset($request->StokAdedi) && isset($request->VaryantAdi)) {
                            $results1 = $request->StokAdedi;
                            $variants1 = explode(',', $results1);

                            $results2 = $request->VaryantAdi;
                            $variants2 = explode(',', $results2);

                            for ($i = 0; $i < count($variants2); $i++) {

                                $prdouctVariantCreate = ProductVariant::create(['UrunId' => $id, 'VaryantAdi' => $variants2[$i], 'StokAdedi' => $variants1[$i]]);
                            }
                        }

                        if ($prdouctVariantCreate->count()) {

                            return response()->json(['success' => true, 'message' => 'required validete islemi başarılı..!']);
                        } else {
                            return response()->json(['success' => false, 'error' => 'Varyant Kayıt işlemi sırasında bir hata oluştu', 203]);
                        }
                    } else {
                        return response()->json(['message' => 'Urunsayisi Urun Menu Güncelleme sırasında hata oluştu..!']);
                    }
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
