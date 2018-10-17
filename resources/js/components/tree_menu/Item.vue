<template>
    <li>
        <div @click="toggle">
            <span v-if="isFolder" class="pr-2">{{ opening ? '-' : '+' }}</span>
            <a v-if="showLink" href="#">{{ item.name }}</a>
            <span v-else>{{ item.name }}</span>
        </div>
        <ul v-show="opening" v-if="isFolder" class="sub-items">
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
      },
      showLink: function () {
        return !this.isFolder && this.item.link;
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

<style scoped>
    .sub-items {
        list-style: none;
    }
</style>

