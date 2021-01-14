<template>
    <optgroup :label="item.MenuAdi" value="">
        <option v-for="altMenu in item.chield" :key="altMenu.id" :value="altMenu.id">{{altMenu.MenuAdi}}</option>
    </optgroup>
</template>

<script>
export default {
    props: ["item"]
};
</script>

<style></style>
