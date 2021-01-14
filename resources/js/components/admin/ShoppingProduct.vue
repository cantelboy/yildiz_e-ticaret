<template>
    <div>
        <form id="SiteAyarForm">
            <div class="text-right">
                <router-link
                    tag="button"
                    to="/admin/site-product/add"
                    class="btn btn-success btn-sm"
                >
                    <i class="material-icons">shopping_basket</i>
                    <p>New Products Add</p>
                </router-link>
            </div>
            <table class="table">
                <thead class="text-primary"></thead>
                <tbody>
                    <tr v-for="(item, index) in ExData[0]" :key="index">
                        <td>
                            <div class="cards" style="width: 18rem">
                                <div
                                    class="productImage"
                                    v-for="image in item.images"
                                    :key="image.id"
                                >
                                    <img
                                        v-if="image.productId === item.id"
                                        :src="
                                            getProductImage(
                                                ExData[0][index].menu,
                                                image.link
                                            )
                                        "
                                        alt="Card image cap"
                                        width="60"
                                        height="80"
                                    />
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        {{ item.UrunAciklamasi }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <table class="table">
                                <thead class="text-primary"></thead>
                                <tbody>
                                    <tr>
                                        <td>Ürün Adı :</td>
                                        <td>
                                            <div class="form-group">
                                                <input
                                                    alt="düzenleme için"
                                                    type="text"
                                                    class="form-control"
                                                    v-model="
                                                        ExData[0][index].UrunAdi
                                                    "
                                                    disabled
                                                />
                                            </div>
                                        </td>
                                        <td>Ürün Fiyatı :</td>
                                        <td>
                                            <div class="form-group">
                                                <input
                                                    alt="düzenleme için"
                                                    type="text"
                                                    class="form-control"
                                                    v-model="
                                                        ExData[0][index]
                                                            .UrunFiyati
                                                    "
                                                    disabled
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Toplam Satış Sayısı :</td>
                                        <td>
                                            <div class="form-group">
                                                <input
                                                    alt="düzenleme için"
                                                    type="text"
                                                    class="form-control"
                                                    v-model="
                                                        ExData[0][index]
                                                            .ToplamSatisSayisi
                                                    "
                                                    disabled
                                                />
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>
                                            <ul class="productAction">
                                                <li>
                                                    <button
                                                        :id="'btn_edit' + index"
                                                        @click="edit(index)"
                                                        type="button"
                                                        rel="tooltip"
                                                        title="Edit Task"
                                                        class="btn btn-primary btn-link btn-sm"
                                                    >
                                                        <i
                                                            class="material-icons"
                                                            >edit</i
                                                        >
                                                        Hızlı Düzenle
                                                    </button>
                                                </li>
                                                <li>
                                                    <router-link
                                                        tag="li"
                                                        to="/admin/site-product/edit"
                                                        class="btn btn-primary btn-link btn-sm"
                                                    >
                                                        <p>Contacts</p>
                                                    </router-link>
                                                </li>
                                                <li>
                                                    <button
                                                        @click.prevent="
                                                            productEdit(item.id)
                                                        "
                                                    >
                                                        <i
                                                            class="material-icons"
                                                            >edit</i
                                                        >
                                                        Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button
                                                        type="button"
                                                        rel="tooltip"
                                                        title="Edit Task"
                                                        class="btn btn-primary btn-link btn-sm"
                                                    ></button>
                                                </li>
                                                <li>
                                                    <button
                                                        :id="'btn_save' + index"
                                                        @click="save(index)"
                                                        style="display: none"
                                                        type="button"
                                                        rel="tooltip"
                                                        key="index"
                                                        title="Edit Task"
                                                        class="btn btn-primary btn-link btn-sm"
                                                    >
                                                        <i
                                                            class="material-icons"
                                                            >check_box</i
                                                        >
                                                    </button>
                                                </li>
                                                <li>
                                                    <button
                                                        @click="
                                                            DeleteSiteAyarlari(
                                                                item.id
                                                            )
                                                        "
                                                        type="button"
                                                        rel="tooltip"
                                                        title="Remove"
                                                        class="btn btn-danger btn-link btn-sm"
                                                    >
                                                        Delete
                                                        <i
                                                            class="material-icons"
                                                            >close</i
                                                        >
                                                    </button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            ExData: [],
            menuData: [],
            imageData: [],
            imageUrl: "http://yildizeticaret.pw/upload/UrunResimleri/"
        };
    },
    created() {
        axios.get("/api/admin/site-product").then(response => {
            this.ExData.push(response.data.product);
            this.menuData.push(response.data.menu);
            this.imageData.push(response.data.image);
            console.log("product", this.ExData[0]);
        });
        //this.test();
    },
    methods: {
        edit(id) {
            $("input").prop("disabled", false);
            $("#btn_edit" + id).css("display", "none");
            $("#btn_save" + id).css("display", "");
        },
        save(id) {
            $("input").prop("disabled", true);
            $("#btn_edit" + id).css("display", "");
            $("#btn_save" + id).css("display", "none");
        },
        DeleteSiteAyarlari(id) {
            axios.delete("/api/admin/site-product/" + id)
            .then(response=> {
                console.log("response",response);
            })
            console.log("delete",id);
        },
        productEdit(id) {
            this.$router.push("/admin/site-product/edit/" + id);
            console.log(id);
        },
        getProductImage(productIndex, link) {
            let data = productIndex.map(item => {
                return (
                    this.imageUrl +
                    item.MenuAdi.toLowerCase()
                        .replace(/ /g, "-")
                        .replace(/[^\w-]+/g, "") +
                    "/" +
                    link
                );
            });

            return data;
        }
    }
};
</script>

<style scoped>
.cards {
    display: flex;
    flex-wrap: wrap;
}
.productAction {
    display: flex;
   
}
.productAction li {
    list-style: none;
    margin-left: 10px;
}
.productAction li:first-child {
   
    margin-left: 0px;
}
</style>
