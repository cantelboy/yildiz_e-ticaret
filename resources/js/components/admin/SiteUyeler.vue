<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Customer Settings</h4>
                        <p class="card-category">
                            Please check the changes you have made...!
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table"
                                v-for="(customer, index) in CustomersData[0]"
                                :key="customer.id"
                            >
                                <thead class="text-primary"></thead>
                                <tbody>
                                    <tr>
                                        <table class="table">
                                            <thead class="text-primary"></thead>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="
                                                            font-weight: bold;
                                                        "
                                                    >
                                                        Adı Soyadı :
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input
                                                                alt="düzenleme için"
                                                                type="text"
                                                                class="form-control"
                                                                v-model="
                                                                    CustomersData[0][
                                                                        index
                                                                    ][
                                                                        'IsimSoyisim'
                                                                    ]
                                                                "
                                                                disabled
                                                            />
                                                        </div>
                                                    </td>
                                                    <td
                                                        style="
                                                            font-weight: bold;
                                                        "
                                                    >
                                                        E-Mail :
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input
                                                                alt="düzenleme için"
                                                                type="text"
                                                                class="form-control"
                                                                v-model="
                                                                    CustomersData[0][
                                                                        index
                                                                    ][
                                                                        'EmailAdresi'
                                                                    ]
                                                                "
                                                                disabled
                                                            />
                                                        </div>
                                                    </td>
                                                    <td
                                                        style="
                                                            font-weight: bold;
                                                        "
                                                    >
                                                        Telefon :
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input
                                                                alt="düzenleme için"
                                                                type="text"
                                                                class="form-control"
                                                                v-model="
                                                                    CustomersData[0][
                                                                        index
                                                                    ][
                                                                        'TelefonNumarasi'
                                                                    ]
                                                                "
                                                                disabled
                                                            />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="
                                                            font-weight: bold;
                                                        "
                                                    >
                                                        Cinsiyet :
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input
                                                                alt="düzenleme için"
                                                                type="text"
                                                                class="form-control"
                                                                v-model="
                                                                    CustomersData[0][
                                                                        index
                                                                    ][
                                                                        'Cinsiyet'
                                                                    ]
                                                                "
                                                                disabled
                                                            />
                                                        </div>
                                                    </td>
                                                    <td
                                                        style="
                                                            font-weight: bold;
                                                        "
                                                    >
                                                        Kayıt Tarihi :
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input
                                                                alt="düzenleme için"
                                                                type="text"
                                                                class="form-control"
                                                                v-model="
                                                                    CustomersData[0][
                                                                        index
                                                                    ][
                                                                        'KayitTarihi'
                                                                    ]
                                                                "
                                                                disabled
                                                            />
                                                        </div>
                                                    </td>
                                                    <td
                                                        style="
                                                            font-weight: bold;
                                                        "
                                                    >
                                                        Kayıt IP :
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input
                                                                alt="düzenleme için"
                                                                type="text"
                                                                class="form-control"
                                                                v-model="
                                                                    CustomersData[0][
                                                                        index
                                                                    ][
                                                                        'KayitIpAdresi'
                                                                    ]
                                                                "
                                                                disabled
                                                            />
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </tr>
                                </tbody>
                                <div class="text-right">
                                    <button
                                        @click="
                                            CustomerDelete(
                                                CustomersData[0][index]['id']
                                            )
                                        "
                                        class="btn btn-danger btn-sm"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            CustomersData: [],
        };
    },
    mounted() {
        this.loaded();
    },
    methods: {
        loaded() {
            console.log("Loaded");

            axios.get("/api/admin/site-uyeler").then((response) => {
                this.CustomersData.push(response.data);
            });
        },
        CustomerDelete(id) {
            axios
                .delete("/api/admin/site-uyeler/" + id, id)
                .then((response) => {
                    this.loaded();
                    if (response.data.success == true) {
                        console.log("Delete Success..!");
                    } else {
                        console.log("Error Silme sırsasında hata");
                    }
                });
        },
    },
};
</script>

<style></style>
