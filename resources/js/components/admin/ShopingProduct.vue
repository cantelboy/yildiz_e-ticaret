<template>
    <div>
        <form id="SiteAyarForm">
            <table class="table">
                <thead class=" text-primary"></thead>
                <tbody>
                    <tr v-for="(item, index) in ExData" :key="item.id">
                        <td>
                            <div class="card" style="width: 18rem;">
                                <img
                                    src="../static-public/1-1.jpg"
                                    alt="Card image cap"
                                    width="60"
                                    height="80"
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up the bulk of the
                                        card's content.
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <table class="table">
                                <thead class=" text-primary"></thead>
                                <tbody>
                                    <tr>
                                        <td>Ürün Türü :</td>
                                        <td>
                                            Erkek Ayakkabısı->Klasik Ayakkabılar
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ürün Adı :</td>
                                        <td>
                                            <div class="form-group">
                                                <input
                                                    alt="düzenleme için"
                                                    type="text"
                                                    class="form-control"
                                                    v-model="
                                                        ExData[index].urunadi
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
                                                        ExData[index].UrunFiyat
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
                                                        ExData[index]
                                                            .ToplamSatis
                                                    "
                                                    disabled
                                                />
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>
                                            <button
                                                :id="'btn_edit_' + index"
                                                @click="edit(index)"
                                                type="button"
                                                rel="tooltip"
                                                title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm"
                                            >
                                                <i class="material-icons"
                                                    >edit</i
                                                >
                                                Edit
                                            </button>
                                            <button
                                                :id="'btn_save_' + index"
                                                @click="save(index)"
                                                style="display:none"
                                                type="button"
                                                rel="tooltip"
                                                key="index"
                                                title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm"
                                            >
                                                <i class="material-icons"
                                                    >check_box</i
                                                >
                                            </button>
                                            <button
                                                @click="DeleteSiteAyarlari"
                                                type="button"
                                                rel="tooltip"
                                                title="Remove"
                                                class="btn btn-danger btn-link btn-sm"
                                            >
                                                Close
                                                <i class="material-icons"
                                                    >close</i
                                                >
                                            </button>
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
            ExData: [
                {
                    id: 1,
                    urunadi: "Kundura1",
                    ToplamSatis: 110,
                    UrunFiyat: "210 TRY"
                },
                {
                    id: 2,
                    urunadi: "Kundura2",
                    ToplamSatis: 120,
                    UrunFiyat: "220 TRY"
                },
                {
                    id: 3,
                    urunadi: "Kundura3",
                    ToplamSatis: 130,
                    UrunFiyat: "230 TRY"
                },
                {
                    id: 4,
                    urunadi: "Kundura4",
                    ToplamSatis: 140,
                    UrunFiyat: "240 TRY"
                },
                {
                    id: 5,
                    urunadi: "Kundura5",
                    ToplamSatis: 150,
                    UrunFiyat: "250 TRY"
                },
                {
                    id: 6,
                    urunadi: "Kundura6",
                    ToplamSatis: 160,
                    UrunFiyat: "260 TRY"
                },
                {
                    id: 7,
                    urunadi: "Kundura7",
                    ToplamSatis: 170,
                    UrunFiyat: "270 TRY"
                },
                {
                    id: 8,
                    urunadi: "Kundura8",
                    ToplamSatis: 180,
                    UrunFiyat: "280 TRY"
                },
                {
                    id: 9,
                    urunadi: "Kundura9",
                    ToplamSatis: 190,
                    UrunFiyat: "290 TRY"
                },
                {
                    id: 10,
                    urunadi: "Kundura10",
                    ToplamSatis: 200,
                    UrunFiyat: "300 TRY"
                }
            ]
        };
    },
    created() {
        console.log(this.ExData);
    },
    methods: {
        edit(id) {
            $("input").prop("disabled", false);
            $("#btn_edit_" + id).css("display", "none");
            $("#btn_save_" + id).css("display", "");
        },
        save(id) {
            $("input").prop("disabled", true);
            $("#btn_edit_" + id).css("display", "");
            $("#btn_save_" + id).css("display", "none");
        },
        DeleteSiteAyarlari() {
            alert("Silmek istdeğinizden Eminmisiniz?");
        }
    }
};
</script>

<style></style>
