<template>
     <div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Site Ayarları</h4>
          <p class="card-category">Yapmış olduğunuz değişikleri lütfen kontrol ediniz..!</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <form>
              <table class="table">
              <thead class=" text-primary">
                <th>
                  S.Num
                </th>
                <th>
                  Name
                </th>
                  <th>
                  Value
                </th>
              </thead>
              <tbody>
                <tr v-for="(settings, name, index) in SiteAyarlariData[0]" :key="index"> 
                  <td>
                    {{ index }}
                  </td>
                  <td>
                      {{ name }}
                  </td>
                  <td>
                    <div class="form-group">
                        <input alt="düzenleme için" type="text" :id="'val_'+index" :name="name" class="form-control" :value="SiteAyarlariData[0][index]" disabled>
                    </div>
                  </td>
                  <td class="td-actions text-right">
                      <button :id="'btn_edit_'+index" @click="edit(index)" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </button>
                        <button :id="'btn_save_'+index" @click="save(index,name)" style="display:none" type="button" rel="tooltip" key="index" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">check_box</i>
                      </button>
                      <button @click="DeleteSiteAyarlari" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                </tr>
              </tbody>
            </table>
            </form>
            <div class="text-center">
                <button @click.prevent="SiteAyarlariPost" class="btn btn-success col-4" >Kaydet</button>
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

}
</script>

<style>

</style>