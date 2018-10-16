<template>
    <ul>
        <item class="item" :item="menu"></item>
    </ul>
</template>

<script>
  import item from './Item';

  export default {
    props: {
      menu: Object,
      selected: Array
    },
    components: {
      'item': item
    },
    mounted: function () {
      console.log(this.menu);
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
