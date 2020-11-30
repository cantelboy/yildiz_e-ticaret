<template>
    <div>
        <form id="SiteAyarForm">
            <table class="table">
                <thead class=" text-primary">
                    <th>
                        Title
                    </th>
                    <th>
                        Name
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td>Ürün Menüsü</td>
                        <td>
                            <select
                                class="form-control"
                                id="exampleFormControlSelect1"
                                v-model="productAdd.productMenu"
                            >
                                <option selected disabled
                                    >Lütfen Menü Seçiniz</option
                                >
                                <option
                                    :value="menu.id"
                                    v-for="(menu, index) in siteMenusData[0]"
                                    :key="index"
                                >
                                    {{ menu.UrunTuru +"-->"+menu.MenuAdi }}
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ürün Adı
                        </td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Ürün Adı Giriniz"
                                    class="form-control"
                                    v-model="productAdd.productName"
                                    
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ürün Fiyatı
                        </td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Ürün Fiyatı Giriniz"
                                    class="form-control"
                                    v-model="productAdd.productPrice"
                                    
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Para Birimi
                        </td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Para Birimi Girniz"
                                    class="form-control"
                                    v-model="productAdd.currency"
                                    
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Kdv Oranı
                        </td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Kdv Oranı Girniz"
                                    class="form-control"
                                    v-model="productAdd.productTax"
                                    
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Kargo Ücreti
                        </td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Kargo Ücreti Yazınız"
                                    class="form-control"
                                    v-model="productAdd.cargoPrice"
                                    
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ürün Açıklaması :</td>
                        <td>
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                v-model="productAdd.explanation"
                                rows="5"
                            ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Ürün Resim Yükleme :</td>
                        <td>
                            <div class="custom-file">
                                <input
                                    type="file"
                                    class="custom-file-input"
                                    id="customFile"
                                    @change="previewFiles"
                                    multiple
                                />
                                <label
                                    class="custom-file-label"
                                    for="customFile"
                                    >Choose file</label
                                >
                            </div>
                        </td>
                        <td>
                            <div id="blah" v-if="activeImg">
                                <!-- <img  src="#" alt="your image" /> -->
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Varyant Başlığı
                        </td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Varyant Başlığı Giriniz"
                                    v-model="productAdd.variantTitle"
                                    class="form-control"
                                    
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.varyant Adı
                        </td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Varyant Başlığı Giriniz"
                                    v-model="productAdd.variantName1"
                                    class="form-control"
                                    
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.varyant Stok Adeti
                        </td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Varyant Başlığı Giriniz"
                                    v-model="productAdd.variantStock1"
                                    class="form-control"
                                    
                                />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div class="text-center">
            <button
                @click.prevent="SiteProductAdded"
                class="btn btn-success col-4"
            >
                Kaydet
            </button>
        </div>
    </div>
</template>
<script></script>

<script>
export default {
  data(){
    return {
      activeImg:false,
      siteMenusData:[],
      productAdd:{
        productMenu    : "",  
        productName    : "",
        productPrice   : "",
        currency       : "",
        productTax     : "",
        cargoPrice     : "",
        explanation    : "",
        productPicture : [],
        variantTitle   : "",
        variantName1   : "",
        variantStock1  : "",
      }

    }
  },
  created(){
    axios.get("/api/admin/site-product")
    .then(response=>{
      this.siteMenusData.push(response.data);
     console.log(this.siteMenusData)
    });
  },
  methods:{
      previewFiles(event) {

        if (event.target.files && event.target.files[0]) {

          for(var i = 0; i < event.target.files.length; i++){
         
            this.productAdd.productPicture.push(event.target.files[i].name)
            this.activeImg = true
            var reader = new FileReader();

            reader.onload = function (e) {
            

                $('#blah').prepend('<img id="theImg" src="" />');
                $("img").attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(event.target.files[0]);

          }
        }
      //console.log(event.target.files);
   },

  SiteProductAdded(){
      console.log(this.productAdd);
      var data = this.productAdd
      axios.post("/api/admin/site-product",{ 
          MenuId         : this.productAdd.productMenu,
          UrunTuru       : this.productAdd.productMenu,
          UrunAdi        : this.productAdd.productName,
          UrunFiyati     : this.productAdd.productPrice,
          ParaBirimi     : this.productAdd.currency,
          KdvOrani       : this.productAdd.productTax,
          KargoUcreti    : this.productAdd.cargoPrice,
          UrunAciklamasi : this.productAdd.explanation,
          UrunResmiBir   : this.productAdd.productPicture[0],
          UrunResmiIki   : this.productAdd.productPicture[1],
          UrunResmiUc    : this.productAdd.productPicture[2],
          UrunResmiDort  : this.productAdd.productPicture[3],
          VaryantBasligi : this.productAdd.variantTitle,
          VaryantAdi     : this.productAdd.variantName1,
          StokAdedi      : this.productAdd.variantStock1,
       
      })
      .then(response=>{
          console.log(response);
      });

  }






  }


}
</script>

<style></style>
