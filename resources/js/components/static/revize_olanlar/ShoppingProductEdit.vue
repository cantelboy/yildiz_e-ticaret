<template>
    <div>
{{data}}
        <form id="SiteAyarForm">
            <h3 style="color:red;">Product Edit sayfası</h3>
            <table class="table col-md-12">
                <thead class="text-primary">
                    <th>Title</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Ürün Menüsü</td>
                        <td>
                            <select
                                class="form-control"
                                id="exampleFormControlSelect1"
                                v-model="productAdd.productMenuSelect"

                            >
                                <option selected disabled
                                    >Lütfen Menü Seçiniz</option
                                >
                                <option v-if="productAdd.productCategory" selected
                                    > {{ productAdd.productCategory }} --> {{ productAdd.productMenuName }}</option
                                >
                                <option
                                    :value="product.menu_Id + '-' + product.UrunTuru"
                                    v-for="(product,index) in productAdd.productMenu[0]" :key="index"
                                >
                                    {{ product.UrunTuru }} --> {{ product.name }}
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ürün Adı</td>
                        <td>
                            <div class="form-group">
                                <input
                                    v-model="productAdd.productName"
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Ürün Adı Giriniz"
                                    class="form-control"
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ürün Fiyatı</td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Ürün Fiyatı Giriniz"
                                    v-model="productAdd.productPrice"
                                    class="form-control"
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Para Birimi</td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Para Birimi Girniz"
                                    v-model="productAdd.currency"
                                    class="form-control"
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kdv Oranı</td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Kdv Oranı Girniz"
                                    v-model="productAdd.productTax"
                                    class="form-control"
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kargo Ücreti</td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Kargo Ücreti Yazınız"
                                    v-model="productAdd.cargoPrice"
                                    class="form-control"
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
                                rows="5"
                                v-model="productAdd.explanation"
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
                            <div v-for="(image, index) in productAdd.productImages"
                                :key="index">
                                <img
                                    v-if="productAdd.productImages.length <= 4"
                                    id="iamge1"
                                    :src="getProductImage(productAdd.productImages[index])"

                                    width="50"
                                    height="100"
                                    class="preview"
                                />
                                <button
                                    @click="imageDelete(index)"
                                    type="button"
                                    rel="tooltip"
                                    title="Remove"
                                    class="btn btn-danger btn-link btn-sm"
                                >
                                    Delete
                                    <i class="material-icons"
                                        >close</i
                                    >
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Varyant Başlığı</td>
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
                                @click.prevent="variantNewAdd"
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
                            <thead class="text-primary"></thead>
                            <tbody
                                v-for="(variant, key, index) in productAdd.variantName"
                                :key="index"
                            >
                                <tr style="float: left">
                                    <td>{{ key + 1 }}.varyant Adı</td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                alt="düzenleme için"
                                                type="text"
                                                placeholder="Varyant Başlığı Giriniz"
                                                v-model="productAdd.variantName[key]"
                                                class="form-control"
                                            />
                                        </div>
                                    </td>
                                </tr>
                                <tr style="float: left">
                                    <td>{{ key + 1 }}.varyant Stok Adeti</td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                alt="düzenleme için"
                                                type="text"
                                                placeholder="Varyant Başlığı Giriniz"
                                                v-model="productAdd.variantStock[key]"
                                                class="form-control"
                                            />
                                        </div>
                                    </td>
                                </tr>
                                <button
                                    @click="variantDelete(index)"
                                    type="button"
                                    rel="tooltip"
                                    title="Remove"
                                    class="btn btn-danger btn-link btn-sm"
                                >
                                    Delete
                                    <i class="material-icons"
                                        >close</i
                                    >
                                </button>
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

<script>

export default {
    props:['data'],
    data() {
        return {
            activeImg: false,
            siteMenusData: [],
            productAdd: {
                productMenu: [],
                productMenuSelect:"",
                productName: "",
                productCategory:"",
                productMenuName:"",
                productPrice: "",
                currency: "",
                productTax: "",
                cargoPrice: "",
                explanation: "",
                variantTitle: "",
                variantName: [],
                variantStock: [],
                productImages:[],
                file: ""
            },
            attachment: [],
            images: [],
            increments: 1,
            imageShow:true,
            productEditData:[],


        };
    },

    created() {
       if(this.$route.params.id){
            axios.post("/api/site-product/variants", {
                id: this.$route.params.id
            })
            .then(response => {

                 // console.log(response);
                this.productEditData.push(response.data.product);

                //product data response fetch
                this.productAdd.productName      = response.data.product.UrunAdi;
                this.productAdd.productCategory  = response.data.product.UrunTuru;
                this.productAdd.productPrice     = response.data.product.UrunFiyati;
                this.productAdd.currency         = response.data.product.ParaBirimi;
                this.productAdd.productTax       = response.data.product.KdvOrani;
                this.productAdd.explanation      = response.data.product.UrunAciklamasi;
                this.productAdd.variantTitle     = response.data.product.VaryantBasligi;
                this.productAdd.variantTitle     = response.data.product.VaryantBasligi;
                this.productAdd.productMenuName  = response.data.product.name;
                this.productAdd.cargoPrice       = response.data.product.KargoUcreti;

                //product Image push process
                this.productAdd.productImages.push(
                this.productEditData[0].UrunResmiBir,
                this.productEditData[0].UrunResmiIki,
                this.productEditData[0].UrunResmiUc,
                this.productEditData[0].UrunResmiDort,
                  )

                //variant data forEach loop
                response.data[0].forEach((data,index)=>{
                    this.productAdd.variantStock.push(parseInt(data.StokAdedi));
                    this.productAdd.variantName.push(parseInt(data.VaryantAdi));
                })
                //product menu push process
                this.productAdd.productMenu.push(response.data[1]);

            });
       }

    },

    methods: {
        previewFiles(e) {

            if(this.productAdd.productImages.length < 4){
                this.productAdd.productImages.push(event.target.files)

                 let fileData = [];

                fileData.push(event.target.files);

                for(let i = 0; i < fileData[0].length; i++){
                    console.log(fileData[0][i].name)
                }
            }else{
                alert('Enfazla 4 resim ekleyebilirsiniz')
            }


           //console.log(event.target.files);

           //console.log(fileData[0].length);

            this.images = [];
            let fileList = Array.prototype.slice.call(e.target.files);


            //this.productAdd.productImages.push()

            fileList.forEach(f => {
                if (!f.type.match("image.*")) {
                    return;
                }
                let reader = new FileReader();
                let that = this;

                reader.onload = function(e) {
                    that.images.push(e.target.result);
                };
                reader.readAsDataURL(f);

            });
        },

        SiteProductAdded() {


           // console.log(this.productAdd);
            //console.log(this.attachment);

        //    let menusData = this.productAdd.productMenuSelect.split('-');

        //     var data = {
        //         MenuId: menusData[0],
        //         UrunTuru: this.productAdd.productCategory,
        //         UrunAdi: this.productAdd.productName,
        //         UrunFiyati: this.productAdd.productPrice,
        //         ParaBirimi: this.productAdd.currency,
        //         KdvOrani: this.productAdd.productTax,
        //         KargoUcreti: this.productAdd.cargoPrice,
        //         UrunAciklamasi: this.productAdd.explanation,
        //         VaryantBasligi: this.productAdd.variantTitle,
        //         VaryantAdi: this.productAdd.variantName,
        //         StokAdedi: this.productAdd.variantStock
        //     };
        //     var form = new FormData();
        //     form.append("Content-Type", "multipart/form-data");
        //     if (this.attachment.length > 0) {
        //         for (var i = 0; i < this.attachment[0].length; i++) {
        //             form.append("files[" + i + "]", this.attachment[0][i]);
        //             form.append("name[" + i + "]", this.attachment[0][i].name);
        //         }
        //     }
        //     for (var key in data) {
        //         form.append(key, data[key]);
        //     }
        //     axios.post("/api/admin/products", form).then(response => {
        //         console.log(response);
        //     });
        },
        ControlFunction(e) {
            e.preventDefault();
        },

        variantDelete(index){
            this.productAdd.variantName.splice(this.productAdd.variantName[index], 1)
            this.productAdd.variantStock.splice(this.productAdd.variantStock[index], 1)
        },
        variantNewAdd(){
            this.productAdd.variantName.push(' ');
            this.productAdd.variantStock.push(' ');
        },
        getProductImage(img){

            console.log(typeof img);


            var base_url = window.location.origin;
            if(img !== null){
                 let ResimKlasoru;

                 let UrunTuru = this.productEditData[0].UrunTuru;

                if (UrunTuru == "Erkek Ayakkabısı") {
                    ResimKlasoru    =    "UrunResimleri/Erkek/";
                } else if (UrunTuru == "Kadın Ayakkabısı") {
                    ResimKlasoru    =    "UrunResimleri/Kadin/";
                } else if (UrunTuru == "Çocuk Ayakkabısı") {
                    ResimKlasoru    =    "UrunResimleri/Cocuk/";
                }
                return base_url + "/upload/"+ ResimKlasoru + img
            }else{
                img = "1-1.jpg";
            }
        },
        imageDelete(index)
        {
          this.productAdd.productImages.splice(this.productAdd.productImages[index], 1);

        }
    }
};
</script>

<style></style>


//src="../../../../public/upload/UrunResimleri/Cocuk/1-1.jpg"


//Bu kısma bakılacak browser kısmında eklenen resim gözükmüyor kontrol yazılmalı
 src="{ id: someProp, 'other-attr': otherProp }"
