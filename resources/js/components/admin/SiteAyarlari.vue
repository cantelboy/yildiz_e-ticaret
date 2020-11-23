<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Site Ayarları</h4>
                        <p class="card-category">
                            Yapmış olduğunuz değişikleri lütfen kontrol
                            ediniz..!
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                                        <tr
                                            v-for="(name,
                                            index) in SiteAyarlariData[0]"
                                            :key="index"
                                        >
                                            <td>
                                                {{ index }}
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input
                                                        alt="düzenleme için"
                                                        type="text"
                                                        :id="index"
                                                        :name="index"
                                                        class="form-control"
                                                        v-model="
                                                            SiteAyarlariData[0][
                                                                index
                                                            ]
                                                        "
                                                        disabled
                                                    />
                                                </div>
                                            </td>
                                            <td class="td-actions text-right">
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
                                                </button>
                                                <button
                                                    :id="'btn_save_' + index"
                                                    @click="save(index, name)"
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
                                                    <i class="material-icons"
                                                        >close</i
                                                    >
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div class="text-center">
                                <button
                                    @click.prevent="SiteAyarlariUpdated"
                                    class="btn btn-success col-4"
                                >
                                    Kaydet
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            SiteAyarlariData: [],
            sayi: 1,
            SiteAyarlariSend: [],
            EditandOK: true
        };
    },
    created() {
        axios.get("/api/admin/site-ayarlari").then(response => {
            //console.log(this.SiteAyarlariData);
            this.SiteAyarlariData.push(response.data.data[0]);
        });
    },
    methods: {
        SiteAyarlariUpdated(event) {
            //  console.log(this.SiteAyarlariData[0])
            var data = this.SiteAyarlariData[0];
            axios.put("/api/admin/site-ayarlari/1", data).then(response => {
                console.log(response);
            });
        },
        edit(id) {
            $("#" + id).prop("disabled", false);
            $("#btn_edit_" + id).css("display", "none");
            $("#btn_save_" + id).css("display", "");
        },
        save(id) {
            $("#" + id).prop("disabled", true);
            $("#btn_edit_" + id).css("display", "");
            $("#btn_save_" + id).css("display", "none");
        },
        DeleteSiteAyarlari() {
            alert("silmek istediğinizdn eminmisinz ?");
        }
    }
};
</script>

<style></style>
