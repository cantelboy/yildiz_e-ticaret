<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Products</h4>
                        <p class="card-category">
                            Yapmış olduğunuz değişikleri lütfen kontrol
                            ediniz..!
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <router-view></router-view>
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
            ExData:[],
        }
    },
    mounted(){
        /*axios.get("/api/admin/products").then(response => {
            this.ExData.push(response.data);
        });*/
        // Event.$on('productEditData', data => {
        //     //console.log(data);
        //     this.productEditData.push(data);

        // })
    }
};
</script>

<style></style>
