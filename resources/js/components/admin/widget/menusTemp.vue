<template>
    <div>
        <tr>
            <select
             
                class="form-control"
                id="exampleFormControlSelect1"
                @change="onChange($event)"
                v-model="menuSelectData"
            >
              <option value="">{{menuSelectData}}</option>
                <option
                    v-for="item in menuData"
                    :key="item.id"
                    :value="item.id">{{item.MenuAdi}}
                    </option>
            </select>
        </tr>
    </div>
</template>

<script>
export default {
    name: "menusTemp",
    data() {
        return {
            
            options:[]
        };
    },
    props: {
        menus: {
            required: false,
            type: Array
        },
        menuSelectData: {
            required:false,
            type:Number,
            
            
        }
    },
    computed: {
        menuData() {
            return this.menus ? this.dataRender(this.menus,'') : false;
        },
    },
    methods: {
        onChange(event) {
            this.$emit("selectMenu", event.target.value);
        },
        dataRender(data,parentName){
            var d = [];
            if(data){
                data.forEach(element => {
                    d = element;
                    if(parentName){
                        d.MenuAdi = parentName+element.MenuAdi;
                    }
                    this.options.push(d);
                    this.dataRender(element.chield,parentName+'->');
                });
            }
            return this.options;
        }
    }
};
</script>

<style></style>
