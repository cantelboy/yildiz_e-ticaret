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
            <td>Ürün Menüsü</td>
            <td>
              <select
                class="form-control"
                id="exampleFormControlSelect1"
                v-model.lazy="$v.productAdd.productMenu.$model"
              >
                <option selected disabled>Lütfen Menü Seçiniz</option>
                <option
                  :value="menu.id"
                  v-for="(menu, index) in siteMenusData[0]"
                  :key="index"
                >
                  {{ menu.UrunTuru + "-->" + menu.MenuAdi }}
                </option>
              </select>
              <div
                class="alert-danger"
                v-if="!$v.productAdd.productMenu.required"
              >
                Field is required
              </div>
            </td>
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
                  v-model.lazy="$v.productAdd.productName.$model"
                />
              </div>

              <div
                class="alert-danger"
                v-if="!$v.productAdd.productName.minLength"
              >
                Name must have at least
                {{ $v.productAdd.productName.$params.minLength.min }}
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
                  v-model.lazy="$v.productAdd.productPrice.$model"
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
              <div class="alert-danger" v-if="!$v.productAdd.currency.required">
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
                <label class="custom-file-label" for="customFile"
                  >Choose file</label
                >
              </div>
              <div class="alert-danger" v-if="true">Field is required</div>
            </td>
            <td>
              <div>
                <img
                  v-for="image in images"
                  :key="image.id"
                  :src="image"
                  width="50"
                  height="100"
                  class="preview"
                />
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
              <thead class="text-primary"></thead>
              <tbody v-for="(item, index) in increments" :key="index">
                <tr style="float: left">
                  <td>{{ index + 1 }}.varyant Adı</td>
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
                    <div class="alert-danger" v-if="true">
                      Field is required
                    </div>
                  </td>
                </tr>
                <tr style="float: left">
                  <td>{{ index + 1 }}.varyant Stok Adeti</td>
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
                    <div class="alert-danger" v-if="true">
                      Field is required
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
      <button @click.prevent="SiteProductAdded" class="btn btn-success col-4">
        Kaydet
      </button>
    </div>
  </div>
</template>

<script>
import { required, minLength, between } from "vuelidate/lib/validators";

export default {
  data() {
    return {
      activeImg: false,
      siteMenusData: [],
      productAdd: {
        productMenu: "",
        productName: "",
        productPrice: "",
        currency: "",
        productTax: "",
        cargoPrice: "",
        explanation: "",
        variantTitle: "",
        variantName: [],
        variantStock: [],
        file: "",
      },
      attachment: [],
      images: [],
      increments: 1,
    };
  },

  validations: {
    productAdd: {
      productName: {
        required,
        minLength: minLength(4),
      },
      productMenu: {
        required,
      },
      productPrice: {
        required,
      },
      currency: {
        required,
      },
      productTax: {
        required,
      },
      cargoPrice: {
        required,
      },
      explanation: {
        required,
      },
      attachment: {
        required,
      },
      variantTitle: {
        required,
      },
      variantName: {
        required,
      },
      variantStock: {
        required,
      },
    },
  },
  created() {
    axios.get("/api/admin/site-product").then((response) => {
      this.siteMenusData.push(response.data);
      //console.log(this.siteMenusData)
    });
  },

  methods: {
    previewFiles(e) {
      this.activeImg = true;
      this.attachment.push(event.target.files);
      this.images = [];
      let fileList = Array.prototype.slice.call(e.target.files);
      fileList.forEach((f) => {
        if (!f.type.match("image.*")) {
          return;
        }

        let reader = new FileReader();
        let that = this;

        reader.onload = function (e) {
          that.images.push(e.target.result);
        };
        reader.readAsDataURL(f);
      });
    },

    SiteProductAdded() {
      var data = {
        MenuId: this.productAdd.productMenu,
        UrunTuru: this.productAdd.productMenu,
        UrunAdi: this.productAdd.productName,
        UrunFiyati: this.productAdd.productPrice,
        ParaBirimi: this.productAdd.currency,
        KdvOrani: this.productAdd.productTax,
        KargoUcreti: this.productAdd.cargoPrice,
        UrunAciklamasi: this.productAdd.explanation,
        VaryantBasligi: this.productAdd.variantTitle,
        VaryantAdi: this.productAdd.variantName,
        StokAdedi: this.productAdd.variantStock,
      };

      var form = new FormData();
      form.append("Content-Type", "multipart/form-data");
      if (this.attachment.length > 0) {
        for (var i = 0; i < this.attachment[0].length; i++) {
          form.append("files[" + i + "]", this.attachment[0][i]);
          form.append("name[" + i + "]", this.attachment[0][i].name);
        }
      }

      for (var key in data) {
        form.append(key, data[key]);
      }

      axios.post("/api/admin/site-product", form).then((response) => {
        console.log(response);
      });
    },
    ControlFunction(e) {
      e.preventDefault();

      console.log(this.$v.productAdd.productName);
    },
  },
};
</script>

<style></style>
