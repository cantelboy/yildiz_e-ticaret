<template>
    <div>
        
        <form id="SiteAyarForm">
            <p>
                {{ $v.productAdd.productMenu }}
            </p>
            <table class="table col-md-12">
                <thead class="text-primary">
                    <th>Title</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    <tr>
                            <td>Ürün Kategorileri</td>
                            <menusTemp @selectMenu="gelenMenu" :menus="siteMenusData[0]" :menuSelectData="parseInt(productAdd.productMenuSelect)" />
                        
                    </tr>
                    
                    <tr>
                        <td>Ürün Adı</td>
                        <td>
                            <div class="form-group">
                                <input
                                    alt="düzenleme için"
                                    type="text"
                                    placeholder="Ürün Adı Giriniz"
                                    class="form-control"
                                    v-model.lazy="
                                        $v.productAdd.productName.$model
                                    "
                                />
                            </div>

                            <div
                                class="alert-danger"
                                v-if="!$v.productAdd.productName.minLength"
                            >
                                Name must have at least
                                {{
                                    $v.productAdd.productName.$params.minLength
                                        .min
                                }}
                                letters.
                            </div>
                            <div
                                class="alert-danger"
                                v-if="!$v.productAdd.productName.required"
                            >
                                Field is required
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
                                    class="form-control"
                                    v-model.lazy="
                                        $v.productAdd.productPrice.$model
                                    "
                                />
                            </div>
                            <div
                                class="alert-danger"
                                v-if="!$v.productAdd.productPrice.required"
                            >
                                Field is required
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
                                    class="form-control"
                                    v-model="$v.productAdd.currency.$model"
                                />
                            </div>
                            <div
                                class="alert-danger"
                                v-if="!$v.productAdd.currency.required"
                            >
                                Field is required
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
                                    class="form-control"
                                    v-model="$v.productAdd.productTax.$model"
                                />
                            </div>
                            <div
                                class="alert-danger"
                                v-if="!$v.productAdd.productTax.required"
                            >
                                Field is required
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
                                    class="form-control"
                                    v-model="$v.productAdd.cargoPrice.$model"
                                />
                            </div>
                            <div
                                class="alert-danger"
                                v-if="!$v.productAdd.cargoPrice.required"
                            >
                                Field is required
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ürün Açıklaması :</td>
                        <td>
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                v-model="$v.productAdd.explanation.$model"
                                rows="5"
                            ></textarea>
                            <div
                                class="alert-danger"
                                v-if="!$v.productAdd.explanation.required"
                            >
                                Field is required
                            </div>
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
                            <div class="alert-danger" v-if="true">
                                Field is required
                            </div>
                            <div v-if="!activeButton" class="images">
                                <div
                                    v-for="(image, index) in productAdd
                                        .productImages[0]"
                                    :key="index"
                                >
                                    <img
                                        v-if="
                                            productAdd.productImages.length <= 4
                                        "
                                        id="iamge1"
                                        :src="imageUrl + image.link"
                                        width="50"
                                        height="100"
                                        class="preview"
                                    />
                                    <button
                                        @click="imageDelete(image, index)"
                                        type="button"
                                        rel="tooltip"
                                        title="Remove"
                                        class="btn btn-danger btn-link btn-sm"
                                    >
                                        Delete
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                            </div>

                            <div class="images">
                                <div
                                    v-for="(image,
                                    index) in productAdd.attachment"
                                    :key="image.id"
                                >
                                    <img
                                        :src="image"
                                        width="50"
                                        height="100"
                                        class="preview"
                                    />
                                    <button
                                        @click="imageDelete2(index)"
                                        type="button"
                                        rel="tooltip"
                                        title="Remove"
                                        class="btn btn-danger btn-link btn-sm"
                                    >
                                        Delete
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
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
                                    v-model="$v.productAdd.variantTitle.$model"
                                    class="form-control"
                                />
                            </div>
                            <div
                                class="alert-danger"
                                v-if="!$v.productAdd.variantTitle.required"
                            >
                                Field is required
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

                        <div>
                            <div v-if="!activeButton">
                                <table class="table col-md-12">
                                    <thead class="text-primary"></thead>
                                    <tbody
                                        v-for="(variant, key, index) in this
                                            .variantDbData[0]"
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
                                                        v-model="
                                                            variantDbData[0][
                                                                key
                                                            ].VaryantAdi
                                                        "
                                                        class="form-control"
                                                    />
                                                </div>
                                                <div
                                                    class="alert-danger"
                                                    v-if="true"
                                                >
                                                    Field is required
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="float: left">
                                            <td>
                                                {{ key + 1 }}.varyant Stok Adeti
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input
                                                        alt="düzenleme için"
                                                        type="text"
                                                        placeholder="Varyant Başlığı Giriniz"
                                                        v-model="
                                                            variantDbData[0][
                                                                key
                                                            ].StokAdedi
                                                        "
                                                        class="form-control"
                                                    />
                                                </div>
                                                <div
                                                    class="alert-danger"
                                                    v-if="true"
                                                >
                                                    Field is required
                                                </div>
                                            </td>
                                        </tr>
                                        <button
                                            @click="variantDelete(variant)"
                                            type="button"
                                            rel="tooltip"
                                            title="Remove"
                                            class="btn btn-danger btn-link btn-sm"
                                        >
                                            Delete
                                            <i class="material-icons">close</i>
                                        </button>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <table class="table col-md-12">
                                    <thead class="text-primary"></thead>
                                    <tbody
                                        v-for="(variant,
                                        key,
                                        index) in productAdd.variantName"
                                        :key="index"
                                    >
                                        <tr style="float: left">
                                            <td v-if="variantDbData[0]">
                                                {{
                                                    variantDbData[0].length +
                                                        key +
                                                        1
                                                }}.varyant Adı
                                            </td>
                                            <td v-else>
                                                {{ key + 1 }}.varyant Adı
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input
                                                        alt="düzenleme için"
                                                        type="text"
                                                        placeholder="Varyant Başlığı Giriniz"
                                                        v-model="
                                                            productAdd
                                                                .variantName[
                                                                key
                                                            ]
                                                        "
                                                        class="form-control"
                                                    />
                                                </div>
                                                <div
                                                    class="alert-danger"
                                                    v-if="true"
                                                >
                                                    Field is required
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="float: left">
                                            <td v-if="variantDbData[0]">
                                                {{
                                                    variantDbData[0].length +
                                                        key +
                                                        1
                                                }}.varyant Stok Adeti
                                            </td>
                                            <td v-else>
                                                {{ key + 1 }}.varyant Stok Adeti
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input
                                                        alt="düzenleme için"
                                                        type="text"
                                                        placeholder="Varyant Başlığı Giriniz"
                                                        v-model="
                                                            productAdd
                                                                .variantStock[
                                                                key
                                                            ]
                                                        "
                                                        class="form-control"
                                                    />
                                                </div>
                                                <div
                                                    class="alert-danger"
                                                    v-if="true"
                                                >
                                                    Field is required
                                                </div>
                                            </td>
                                        </tr>
                                        <button
                                            @click="variantDelete(key)"
                                            type="button"
                                            rel="tooltip"
                                            title="Remove"
                                            class="btn btn-danger btn-link btn-sm"
                                        >
                                            Delete
                                            <i class="material-icons">close</i>
                                        </button>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </tr>
                </tbody>
            </table>
        </form>
        <div class="text-center">
            <button
                v-if="activeButton"
                @click.prevent="SiteProductAdded"
                class="btn btn-success col-4"
            >
                Kaydet
            </button>
            <button
                v-else
                @click.prevent="SiteProductUpdate"
                class="btn btn-success col-4"
            >
                Update
            </button>
        </div>
    </div>
</template>

<script>
import { required, minLength, between } from "vuelidate/lib/validators";
import menusTemp from "./widget/menusTemp"

export default {
    data() {
        return {
            activeImg: false,
            siteMenusData: [],
            productAdd: {
                productMenu: [],
                productMenuSelect: "",
                productCategory: "",
                productMenuName: "",
                productName: "",
                productPrice: "",
                currency: "",
                productTax: "",
                cargoPrice: "",
                explanation: "",
                variantTitle: "",
                variantName: [],
                variantStock: [],
                productImages: [],
                attachment: [],
                variantStockUpdate: [],
                variantNameUpdate: []
            },
            images: [],
            increments: 1,
            mageShow: true,
            productEditData: [],
            activeButton: true,
            menuDatas: [],
            imageUrl:
                "http://yildizeticaret.pw/upload/UrunResimleri/erkek-ayakkabisi/",
            variantData: [],
            variantDbData: []
        };
    },
      components: {
        menusTemp
    },

    //Validations process
    validations: {
        productAdd: {
            productName: {
                required,
                minLength: minLength(4)
            },
            productPrice: {
                required
            },
            currency: {
                required
            },
            productTax: {
                required
            },
            cargoPrice: {
                required
            },
            explanation: {
                required
            },
            attachment: {
                required
            },
            variantTitle: {
                required
            },
            variantName: {
                required
            },
            variantStock: {
                required
            }
        }
    },
    props: ["data"],
    created() {
        //Edit axios process
        if (this.$route.params.id) {
            this.activeButton = false;
            axios
                .get("/api/admin/site-product/" + this.$route.params.id)
                .then(response => {
                    // console.log(response);
                    this.productEditData.push(response.data.product);

                    //product data response fetch
                    this.productAdd.productName = response.data.product.UrunAdi;
                    this.productAdd.productMenuSelect =response.data.product.MenuId;
                    this.productAdd.productPrice =response.data.product.UrunFiyati;
                    this.productAdd.currency = response.data.product.ParaBirimi;
                    this.productAdd.productTax = response.data.product.KdvOrani;
                    this.productAdd.explanation =response.data.product.UrunAciklamasi;
                    this.productAdd.variantTitle = response.data.product.VaryantBasligi;
                    this.productAdd.productMenuName =response.data.product.MenuAdi;
                    this.productAdd.cargoPrice =response.data.product.KargoUcreti;

                     console.log("Menuid",this.productAdd.productMenuSelect);
                    //product Image push process
                    this.productAdd.productImages.push(response.data.image);

                    //variant data forEach loop
                    this.variantDbData.push(response.data.variants);
                   

                    // response.data.variants.forEach((data, index) => {
                    //     this.productAdd.variantStock.push(
                    //         parseInt(data.StokAdedi)
                    //     );
                    //     this.productAdd.variantName.push(
                    //         parseInt(data.VaryantAdi)
                    //     );
                    // });
                    //product menu push process
                    this.variantData.push(response.data.variants);
                    this.siteMenusData.push(response.data.menu);
                    console.log("siteMenu", this.siteMenusData);
                    this.menuData;
                });
        } else {
            axios.get("/api/admin/site-product").then(response => {
                this.siteMenusData.push(response.data.menu);
                console.log("siteMenu", this.siteMenusData[0]);
                this.menuData;
            });
        }
    },

    methods: {
        previewFiles(e) {
            this.activeImg = true;
            let fileList = Array.prototype.slice.call(e.target.files);
            fileList.forEach(f => {
                if (!f.type.match("image.*")) {
                    return;
                }

                let reader = new FileReader();
                let that = this;

                reader.onload = function(e) {
                    that.productAdd.attachment.push(e.target.result);
                };
                reader.readAsDataURL(f);
            });
        },

        SiteProductAdded() {
            console.log(this.productAdd);
            var data = {
                MenuId: this.productAdd.productMenuSelect,
                UrunAdi: this.productAdd.productName,
                UrunFiyati: this.productAdd.productPrice,
                ParaBirimi: this.productAdd.currency,
                KdvOrani: this.productAdd.productTax,
                KargoUcreti: this.productAdd.cargoPrice,
                UrunAciklamasi: this.productAdd.explanation,
                VaryantBasligi: this.productAdd.variantTitle,
                VaryantAdi: this.productAdd.variantName,
                StokAdedi: this.productAdd.variantStock,
                files: this.productAdd.attachment
            };

            // this.productAdd.attachment.forEach((file,index) => {
            //     data['files['+index+']'] = file;
            // });
            // console.log(data);




            axios.post("/api/admin/site-product", data).then(response => {
                console.log(response);
            });
        },
        ControlFunction(e) {
            e.preventDefault();
            console.log(this.productAdd);
        },

        //Variant newAdd Delete process

        variantDelete(variant) {
            console.log("varinatID", variant.id);
            //console.log("splice",this.variantDbData[0].splice(this.variantDbData[0].indexOf(variant),1));
            // console.log(this.variantDbData[0].length);

            if (
                this.variantDbData[0].length > 0 &&
                typeof variant.id !== "undefined"
            ) {
                let variantId = variant.id;
                var data = {
                    id: variantId,
                    method: "variant"
                };
                axios.post("/api/site-product/delete", data).then(response => {
                    this.variantDbData[0].splice(
                        this.variantDbData[0].indexOf(variant),
                        1
                    );
                    console.log(response);
                });
            } else {
                this.variantDbData[0].splice(
                    this.variantDbData[0].indexOf(variant),
                    1
                );
            }
        },
        //Variant newAdd Edit process
        variantNewAdd() {
            //this.variantDbData[0].push({});
            this.productAdd.variantName.push(" ");
            this.productAdd.variantStock.push(" ");
        },

        //Edit image get process

        getProductImage(img) {
            console.log(typeof img);

            var base_url = window.location.origin;
            if (img !== null) {
                let ResimKlasoru;

                let UrunTuru = this.productEditData[0].UrunTuru;

                if (UrunTuru == "Erkek Ayakkabısı") {
                    ResimKlasoru = "UrunResimleri/Erkek/";
                } else if (UrunTuru == "Kadın Ayakkabısı") {
                    ResimKlasoru = "UrunResimleri/Kadin/";
                } else if (UrunTuru == "Çocuk Ayakkabısı") {
                    ResimKlasoru = "UrunResimleri/Cocuk/";
                }
                return base_url + "/upload/" + ResimKlasoru + img;
            } else {
                img = "1-1.jpg";
            }
        },

        //Image index delete process Edit

        imageDelete(image, index) {
            console.log(image.id);
            console.log(this.activeButton);
            console.log(index);

            if (
                this.productAdd.productImages[0].length > 0 &&
                typeof variant !== "string"
            ) {
                let imageId = image.id;
                var data = {
                    id: imageId,
                    method: "image"
                };
                axios.post("/api/site-product/delete", data).then(response => {
                    console.log(response);

                    this.productAdd.productImages[0].splice(
                        this.productAdd.productImages[0].indexOf(image),
                        1
                    );
                });
            } else {
                this.productAdd.productImages[0].splice(
                    this.productAdd.productImages[0].indexOf(image),
                    1
                );
            }
        },
        imageDelete2(index) {
            if (this.productAdd.attachment.length > 0) {
                this.productAdd.attachment.splice(
                    this.productAdd.attachment[index],
                    1
                );
            }
        },
        SiteProductUpdate() {
            console.log(this.productAdd.productMenuSelect);
            var data = {
                MenuId: this.productAdd.productMenuSelect,
                UrunAdi: this.productAdd.productName,
                UrunFiyati: this.productAdd.productPrice,
                ParaBirimi: this.productAdd.currency,
                KdvOrani: this.productAdd.productTax,
                KargoUcreti: this.productAdd.cargoPrice,
                UrunAciklamasi: this.productAdd.explanation,
                VaryantBasligi: this.productAdd.variantTitle,
                VaryantAdi: this.productAdd.variantName,
                VariantUpdate: this.variantDbData,
                StokAdedi: this.productAdd.variantStock,
                files: this.productAdd.attachment
            };
            let id = this.$route.params.id;
            axios.put("/api/admin/site-product/" + id, data).then(response => {
                console.log(response);
            });
        },
        indexİnc(index) {
            return index;
        },  
        gelenMenu(event){
            this.productAdd.productMenuSelect = event
            console.log('this.productAdd.productMenuSelect',this.productAdd.productMenuSelect)
        }
    },
    computed: {
        menuData() {
            setTimeout(() => {
                const total = this.siteMenusData[0].reduce((acc, menus) => {
                    acc[menus.parentId] = acc[menus.parentId] || [];
                    acc[menus.parentId].push(menus);

                    return acc;
                }, {});
                this.menuDatas.push(total);
            }, 700);
        },
        attrs() {
            return function(index) {
                // computed can also return a function, so you can use args
                return index !== "null" ? index : "";
            };
        }
      
    }
};
</script>

<style scoped>
.images {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>

/*

<select
    class="form-control"
    id="exampleFormControlSelect1"
    v-model="productAdd.productMenuSelect"
>
                                <option disabled>Lütfen Menü Seçiniz</option>
                                <option
                                    v-for="(menu, index) in siteMenusData[0]"
                                    :value="menu.id"
                                    :key="index"
                                    :disabled="menu.parentId === null"
                                >
                                    <h6 v-if="menu.parentId === null">**********{{menu.MenuAdi}}**********</h6>
                                    <h6 v-else>{{menu.MenuAdi}}+ {{menu.id}}</h6>
                                   
                                   
                                </option>
                            </select>
//images src attrbute için function getProductImage(
productAdd.productImages[index] ) 

//menu template

          <tr>
                        <td>Ürün Menüsü</td>
                        <td>
                            <select v-model="productAdd.productMenuSelect">
                                <option disabled value=""
                                    >Menu Seçimi yapınız</option
                                >

                                <optgroup
                                    v-for="(menu, index) in siteMenusData[0]"
                                    :key="index"
                                    :value="menu"
                                    :label="menu.MenuAdi"
                                >
                                    <option
                                        v-for="(item, key) in menu.chield"
                                        :key="key"
                                        :value="item.id"
                                        >{{ item.MenuAdi }}</option
                                    >
                                </optgroup>
                            </select>
                        </td>
                    </tr>









*/
