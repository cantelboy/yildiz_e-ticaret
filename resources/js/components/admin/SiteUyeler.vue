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
                                :key="CustomersData[0][index]['id']"
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
                                                                    CustomersData[0][index][
                                                                        'name'
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
                                                                        'email'
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
                                                                        'created_at'
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
            axios.get("/api/admin/customers").then((response) => {
                this.CustomersData.push(response.data);
              setTimeout(()=> {
                console.log('data2',this.CustomersData2)
              },1500)
            }).catch((error)=> {
              console.log('error',error)
            });
        },
        CustomerDelete(id) {
           axios.delete("/api/admin/customers/" + id, id)
                .then((response) => {
                    if (response.data.success == true) {
                        console.log("Delete Success..!");
                      this.loaded();
                      this.$router.go();

                    } else {
                        console.log("Error Silme sırsasında hata");
                    }
                }).catch((error)=> {
             console.log('errorDeleteUser',error)
           });
        },
    },
};
</script>

<style></style>
