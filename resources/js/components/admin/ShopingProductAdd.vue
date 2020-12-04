<template>
    <div>
        <form id="SiteAyarForm">
            <table class="table col-md-12">
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
                                    @change="previewFiles"
                                    accept="image/*"
                                    name="images"
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
                            <div>
                                <img v-for="image in images" :key="image.id" :src="image" width="50" height="100" class="preview">
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
                          <div class="text-center">
                            <button
                                @click.prevent="increments++"
                                class="btn btn-warning btn-sm"
                            >
                                Variant Add
                            </button>
                        </div>
                          <div class="text-center">
                            <button
                                @click.prevent="ControlFunction"
                                class="btn btn-danger btn-sm"
                            >
                                ControlFunction
                            </button>
                        </div>
                        <table class="table col-md-12">
                            <thead class=" text-primary">
                            </thead>
                            <tbody v-for="(item,index) in increments" :key="index">
                            <tr style="float:left;">
                                <td>
                                    {{ index+1 }}.varyant Adı
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input
                                            alt="düzenleme için"
                                            type="text"
                                            placeholder="Varyant Başlığı Giriniz"
                                            v-model="productAdd.variantName[index]"
                                            class="form-control"
                                            
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr style="float:left;">
                                <td>
                                    {{ index+1 }}.varyant Stok Adeti
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input
                                            alt="düzenleme için"
                                            type="text"
                                            placeholder="Varyant Başlığı Giriniz"
                                            v-model="productAdd.variantStock[index]"
                                            class="form-control"
                                        />
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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
        variantTitle   : "",
        variantName    : [],
        variantStock   : [],
        file           : "",
      },
      attachment : [],
      images:[],
      increments:1,

    }
  },
  created(){
    axios.get("/api/admin/site-product")
    .then(response=>{
      this.siteMenusData.push(response.data);
     //console.log(this.siteMenusData)
    });
  },

  methods:{

   previewFiles(e) {

      this.activeImg = true;  
      this.attachment.push(event.target.files); 
      this.images = [];
      let fileList = Array.prototype.slice.call(e.target.files);
      fileList.forEach(f => {

        if(!f.type.match("image.*")) {
          return;
        }

        let reader = new FileReader();
        let that = this;

        reader.onload = function (e) {
          that.images.push(e.target.result);
        }
        reader.readAsDataURL(f); 
      });
    },

  SiteProductAdded(){
      console.log(this.productAdd.variantName);
   
      var data =       {
          MenuId         : this.productAdd.productMenu,
          UrunTuru       : this.productAdd.productMenu,
          UrunAdi        : this.productAdd.productName,
          UrunFiyati     : this.productAdd.productPrice,
          ParaBirimi     : this.productAdd.currency,
          KdvOrani       : this.productAdd.productTax,
          KargoUcreti    : this.productAdd.cargoPrice,
          UrunAciklamasi : this.productAdd.explanation,
          VaryantBasligi : this.productAdd.variantTitle,
       
      }

     var variant = 
      {
       VaryantAdi  : this.productAdd.variantName,
       StokAdedi   : this.productAdd.variantStock
      }
      
     


         var form = new FormData();   
    //   form.append('Content-Type', 'multipart/form-data');  
   
    //   for (var i = 0; i< this.attachment[0].length; i++ ) {
    //     form.append('files[' + i + ']', this.attachment[0][i]);
    //     form.append('name[' + i + ']', this.attachment[0][i].name);
    //   }
 
      for (var key in data) {
        form.append(key, data[key]);
      }
      for (var key in variant) {
        form.append(key, variant[key]);
      }
      
    
      axios.post("/api/admin/site-product", form)
      .then(response=>{
          //console.log(response);
      });

  },
  ControlFunction(){
      this.productAdd.variantName.forEach((value,key) => {
            console.log(value)
      });
       this.productAdd.variantStock.forEach((value,key) => {
           console.log(value)
      });

  
  
  }

  }

}
</script>

<style></style>



