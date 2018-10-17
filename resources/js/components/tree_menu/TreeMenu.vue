<template>
    <ul>
        <item class="item" :item="item" v-for="(item,index) in items" :key="index"></item>
    </ul>
</template>

<script>
  import item from './Item';

  export default {
    props: {
      items: Array,
      selected: Array
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

    .bold {
        font-weight: bold;
    }

    ul {
        padding-left: 1em;
        line-height: 1.5em;
        list-style-type: none;
    }
</style>
