<template>
    <li>
        <div @click="toggle">
            {{ item.name }} <span v-if="isFolder">{{ opening ? '-' : '+' }}</span>
        </div>
        <ul v-show="opening" v-if="isFolder">
            <item class="item" v-for="(next, index) in item.children" :key="index" :item="next"></item>
        </ul>
    </li>
</template>

<script>
  export default {
    name: 'item',
    props: {
      item: Object
    },
    data: function () {
      return {
        opening: false
      };
    },
    computed: {
      isFolder: function () {
        return this.item.children && this.item.children.length > 0;
      }
    },
    methods: {
      toggle: function () {
        if (this.isFolder) {
          this.opening = !this.opening;
        }
      }
    }
  };
</script>

