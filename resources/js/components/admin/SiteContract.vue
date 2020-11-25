<template>
      <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title ">Site Contract</h4>
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
                                     
                                    </thead>
                                    <tbody>
                                        <tr  v-for="(contract, index) in this.SiteContractData[0]" :key="index">
                                            <td>
                                             {{index}} :
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{index}} Metni için içerik alanı</label>
                                                    <textarea :disabled="index=='id'" class="form-control" id="exampleFormControlTextarea1" rows="3" cols="50" v-model="SiteContractData[0][index]"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                             <div class="text-center">
                                <button
                                    @click.prevent="SiteContractUpdated"
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
export default {
    data(){
        return {
            SiteContractData:[]
        }
    },
    created(){
          axios.get("/api/admin/site-contract").then(response => {
            //console.log(this.SiteContractData[0]);
            //console.log(response.data.data[0]);
            this.SiteContractData.push(response.data.data[0]);
        });
    },
    methods:{
        SiteContractUpdated(){
            //console.log(this.SiteContractData[0])
            
            var data =this.SiteContractData[0];
            axios.put("/api/admin/site-contract/1", data).then(response => {
                console.log(response);
            });
            
        }
    }

}
</script>

<style>

</style>