<template>
  <div>
    <tr>
      <select
          class="form-control"
          id="exampleFormControlSelect1"
          @change="onChange($event)"
          v-model="menuSelectDataComp"
      >
        <option value="">{{ menuSelectDataComp }}</option>
        <option
            v-for="item in menuData"
            :key="item.id"
            :value="item.id">{{ item.name }}
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
      options: [],
      menuSelectDataComp: this.menuSelectData
    };
  },
  props: {
    menus: {
      required: false,
      type: Array
    },
    menuSelectData: {
      required: false,
      type: Number,

    }
  },
  computed: {
    menuData() {
      return this.menus ? this.dataRender(this.menus, '') : false;
    },
  },
  methods: {
    onChange(event) {
      this.$emit("selectMenu", event.target.value);
    },
    dataRender(data, parentName) {
      var d = [];
      if (data) {
        data.forEach(element => {
          d = element;
          if (parentName) {
            d.name = parentName + element.name;
          }
          this.options.push(d);
          this.dataRender(element.chield, parentName + '->');
        });
      }
      return this.options;
    }
  }
};
</script>

<style></style>
