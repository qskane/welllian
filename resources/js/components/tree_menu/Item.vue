<template>
    <li>
        <div class="name" @click="toggle">
            <a v-if="showLink" :href="href">{{ item.name }}</a>
            <span v-else>{{ item.name }}</span>
            <span v-if="isFolder" class="pr-2">{{ opening ? '-' : '+' }}</span>
        </div>
        <ul v-show="opening" v-if="isFolder" class="sub-items pl-2">
            <item class="item"
                  v-for="(next, index) in children"
                  :key="index"
                  :item="next"
                  :link="link"
                  :selected="selected"
            ></item>
        </ul>
    </li>
</template>

<script>
  export default {
    name: 'item',
    props: ['item', 'link', 'selected'],
    data: function () {
      return {
        opening: _.indexOf(this.selected, this.item.id) >= 0
      };
    },
    computed: {
      isFolder: function () {
        return this.children && this.children.length > 0;
      },
      showLink: function () {
        return !this.isFolder && this.link;
      },
      href: function () {
        return this.link + '/' + this.item.id;
      },
      children: function () {
        return _.isArray(this.item.children) ? this.item.children : _.values(this.item.children);
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

    .name {
        white-space: nowrap;
    }

</style>

