<template>
    <ul class="p-0 m-0">
        <item class="item"
              :item="item"
              v-for="(item,index) in items"
              :key="index"
              :link="link"
              :selected="selected"
        ></item>
    </ul>
</template>

<script>
  import item from './Item';

  export default {
    props: {
      items: Array,
      selected: Array,
      link: String,
    },
    components: {
      'item': item
    }
  };
</script>

<style scoped>
    .item {
        cursor: pointer;
    }

    ul {
        list-style-type: none;
    }
</style>
