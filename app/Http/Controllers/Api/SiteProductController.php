<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Images;
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
        $getMenus = $this->getMenus();
        $getProduct = $this->getProduct();
        return response()->json(['success' => true, 'message' => 'ürünler ve ürün menu başarılı get', 'menu' => $getMenus, 'product' => $getProduct], 200);
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
        //Product create process
        $validator = $this->productValidate($request);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()], 203);
        }

        $MenuId          = $request->MenuId;
        $UrunAdi         = $request->UrunAdi;
        $UrunFiyati      = $request->UrunFiyati;
        $ParaBirimi      = $request->ParaBirimi;
        $KdvOrani        = $request->KdvOrani;
        $KargoUcreti     = $request->KargoUcreti;
        $UrunAciklamasi  = $request->UrunAciklamasi;
        $VaryantBasligi  = $request->VaryantBasligi;
        $KargoUcreti     = $request->KargoUcreti;

        //Ürün var olup olmadığı kontrol ediliyor
        $productAll = Product::where('UrunAdi', $UrunAdi)->first();


        if ($productAll === null) {
            $ProductCreate = Product::create([
                'MenuId' => $MenuId, 'UrunAdi' => $UrunAdi, 'UrunFiyati' => $UrunFiyati, 'ParaBirimi' => $ParaBirimi, 'KdvOrani' => $KdvOrani, 'KargoUcreti' => $KargoUcreti,
                'UrunAciklamasi' => $UrunAciklamasi, 'Durumu' => 1, 'VaryantBasligi' => $VaryantBasligi,
            ]);
        } elseif ($productAll->count() <= 0) {
            $ProductCreate = Product::create([
                'MenuId' => $MenuId, 'UrunAdi' => $UrunAdi, 'UrunFiyati' => $UrunFiyati, 'ParaBirimi' => $ParaBirimi, 'KdvOrani' => $KdvOrani, 'KargoUcreti' => $KargoUcreti,
                'UrunAciklamasi' => $UrunAciklamasi, 'Durumu' => 1, 'VaryantBasligi' => $VaryantBasligi,
            ]);
        } else {
            return response()->json(['success' => false, 'error' => 'Daha önceden bu ürün adında ekleme yapılmış', 203]);
        }

        if (isset($ProductCreate)) {
            //Product Son Id getirme
            $this->productLastId();
            //product images updated save process
            if (count($request->input('files')) > 0) {
                $imageCreate = $this->createImage($request);


                if (isset($imageCreate)) {
                    //Product Variant ekleme işlemi
                    $productVariat = $this->createVariant($request);

                    return response()->json(['success' => true, 'message' => 'ürün ekleme islemi başarılı bir şekilde kaydedilmiştir...!']);
                } else {
                    return response()->json(['message' => 'Urunsayisi Urun Menu Güncelleme sırasında hata oluştu..!']);
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
        $productId = $id;



        $getVariants = ProductVariant::where('productId', $productId)->limit(20)->get();

        $getMenus = $this->getMenus();
        $getProduct = $this->getProduct($productId);
        $getImages = $this->getImages($productId);

        return response()->json(['success' => true, 'message' => 'ürünler ve varinat başarılı get', 'variants' => $getVariants, 'menu' => $getMenus, 'product' => $getProduct, 'image' => $getImages], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

        $validator = $this->productValidate($request);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()], 203);
        }

        $MenuId          = $request->MenuId;
        $UrunAdi         = $request->UrunAdi;
        $UrunFiyati      = $request->UrunFiyati;
        $ParaBirimi      = $request->ParaBirimi;
        $KdvOrani        = $request->KdvOrani;
        $KargoUcreti     = $request->KargoUcreti;
        $UrunAciklamasi  = $request->UrunAciklamasi;
        $VaryantBasligi  = $request->VaryantBasligi;
        $KargoUcreti     = $request->KargoUcreti;

        $productUpdate = Product::find($id);

        if (isset($productUpdate)) {
            $pruductUpdate = $productUpdate->update([
                'MenuId' => $MenuId, 'UrunAdi' => $UrunAdi, 'UrunFiyati' => $UrunFiyati, 'ParaBirimi' => $ParaBirimi, 'KdvOrani' => $KdvOrani, 'KargoUcreti' => $KargoUcreti,
                'UrunAciklamasi' => $UrunAciklamasi, 'Durumu' => 1, 'VaryantBasligi' => $VaryantBasligi,
            ]);
            if (isset($pruductUpdate)) {
                if (count($request->input('files')) > 0) {
                    $this->createImage($request);
                }
                $productVariat = $this->createVariant($request);
            }
            return response()->json(['message' => 'başarılı bir şekilde Güncellenmiştir..!']);
        } else {
            return response()->json(['message' => 'Güncelleme sırasında hata oluştu..!']);
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
        $deleteProduct = Product::find($id);
        if(isset($deleteProduct)){
          $deleteProduct->delete();
          return response()->json(['message' => 'Başarılı bir şekilde silinmiştir' , 'success'=> true]);
        } else {
          return response()->json(['message'=>'Silinme sırasında hata oluştu..!', 'success'=> false]);
        }
    }
    //Product Menus veritabanı get function
    public function getMenus($id = null)
    {
        $menus = Category::where('parentId', $id)->get();
        $d = [];
        foreach ($menus as $key => $value) {
            $d[$key] = $value;
            $d[$key]['chield'] = $this->getMenus($value->id);
        }
        return $d;
    }
    //Product Menus veritabanı get function
    public function getMenusProduct($id = null)
    {
        $menus = Category::where('id', $id)->get();
        $d = [];
        foreach ($menus as $key => $value) {
            $parentId = $value->parentId;
        }
        $menus2 = Category::where('id', $parentId)->get();
        foreach ($menus2 as $key2 => $value2) {
            $d[$key] = $value2;
            $d[$key]['chield'] = $value;
        }

        return $d;
    }
    //Product veritabanı get function
    public function getProduct($id = null)
    {

        if ($id !== null) {
            $getProducts = Product::where('id', $id)
                ->limit(1)
                ->first();

            return $getProducts;
        }

        $getProducts = Product::all();
        $d = [];
        foreach ($getProducts as $key => $value) {
            $d[$key] = $value;
            $d[$key]['images'] = $this->getImages($value->id);
            $d[$key]['menu'] = $this->getMenusProduct($value->MenuId);
        }
        return $d;
    }
    //Product Image veritabanı get function
    public function getImages($id = null)
    {

        if ($id !== null) {
            $getImages = Image::where('productId', $id)
                ->limit(10)
                ->get();

            return $getImages;
        }

        $getImages = Image::all();
        return $getImages;
    }

    //Product image update işlemi için resimkalsor yolu path function
    public function getResimKlasoru($id)
    {
        $parent_id = Category::where('id', $id)->first();
        $productMenuIdSelected = Category::where('id', $parent_id->parentId)->first();
        $ResimKlasoru = "UrunResimleri/" . Str::slug($productMenuIdSelected->name);
        return $ResimKlasoru;
    }
    //Product image public kalsorü için update function
    public function createImage($request)
    {
        $result = $request->input('files');

        foreach ($result as $key => $file) {

            $img = explode('data:image/jpeg;base64,', $file);

            if (!empty($img[1])) {
                $id = Product::all()->last()->id;

                $filename    = Str::of($request->UrunAdi)->slug('-') . time() . rand(1, 50) . '.jpg';

                $image_resize = Images::make($img[1])->resize(300, 500)->save(public_path('upload/' . $this->getResimKlasoru($request->MenuId) . '/' . $filename));

                $imagesCreate = Image::create(['productId' => $id, 'link' => $filename]);
            }
        }
        return $imagesCreate;
    }
    //product validate işlemi function
    public function productValidate($request)
    {

        $rules = [
            'MenuId'         => 'required',
            'UrunAdi'        => 'required',
            'UrunFiyati'     => 'required',
            'ParaBirimi'     => 'required',
            'KdvOrani'       => 'required',
            'UrunAciklamasi' => 'required',
            'VaryantBasligi' => 'required',
            'KargoUcreti'    => 'required',
        ];


        $input = $request->only([
            'MenuId', 'UrunAdi', 'UrunFiyati', 'ParaBirimi', 'KdvOrani', 'UrunAciklamasi', 'UrunResmiBir',
            'VaryantBasligi', 'KargoUcreti', 'StokAdedi', 'VaryantAdi', 'files'
        ]);


        $validator = Validator::make($input, $rules);

        return $validator;
    }

    //Product create işleminden sonra son Id yakalama function
    public $id;
    public function productLastId()
    {
        $this->id = Product::all()->last()->id;
        return $this->id;
    }


    //Product variant ekleme function
    public function createVariant($request)
    {

        $id = $this->productLastId();
        if ((count($request->StokAdedi) > 0) && (count($request->VaryantAdi))) {
            if (isset($request->StokAdedi) && isset($request->VaryantAdi)) {
                $variants1 = $request->StokAdedi;
                $variants2 = $request->VaryantAdi;
                if (!is_array($variants1) || !is_array($variants2)) {
                    $variants1 = explode(',', $variants1);
                    $variants2 = explode(',', $variants2);
                }

                for ($i = 0; $i < count($variants2); $i++) {

                    $prdouctVariantCreate = ProductVariant::create(['productId' => $id, 'VaryantAdi' => $variants2[$i], 'StokAdedi' => $variants1[$i]]);
                }
                return $prdouctVariantCreate;
            }
        }
        //güncelleme yapılcak kısım
        $result = $request->input('VariantUpdate');

        foreach ($result[0] as $variant) {


            $variantUpdate = ProductVariant::where('id', $variant['id'])->update([
                'VaryantAdi' => $variant['VaryantAdi'],
                'StokAdedi'  => $variant['StokAdedi']
            ]);
        }
        return $variantUpdate;
    }

    public function deleteProcess(Request $request)
    {
        $method = $request->method;
        $id     = $request->id;

        if ($method === 'variant') {
            $deleteVariant = ProductVariant::find($id);
            if (isset($deleteVariant)) {
                $deleteVariant->delete();
                return response()->json(['message' => 'Başarılı bir şekilde silinmiştir', 'success' => true]);
            } else {
                return response()->json(['message' => 'Silinme sırasında hata oluştu..!', 'success' => false]);
            }
        } elseif ($method === 'image') {
            $deleteImage = Image::find($id);
            if (isset($deleteImage)) {
                $deleteImage->delete();
                return response()->json(['message' => 'Başarılı bir şekilde silinmiştir', 'success' => true]);
            } else {
                return response()->json(['message' => 'Silinme sırasında hata oluştu..!', 'success' => false]);
            }
        }
    }
}
