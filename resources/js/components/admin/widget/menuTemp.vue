<template>
    <optgroup :label="item.name" value="">
        <option v-for="altMenu in item.chield" :key="altMenu.id" :value="altMenu.id">{{altMenu.name}}</option>
    </optgroup>
</template>

<script>
export default {
    props: ["item"]
};
</script>

<style></style>
