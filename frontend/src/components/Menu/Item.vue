<template>
    <ul class="submenu">
        <li v-for="category in categories" v-bind:key="category.id">
            <a @click="e => Places(e, category.name)">{{category.name}} 
            <span class='submenu-indicator' v-if="category.categories.length>0">+</span>
        </a>
            <MenuItem :categories="category.categories" />
        </li>
    </ul>
</template>

<script>

import { store } from '../../store.js';

export default {
  name: 'MenuItem',
  props: ['categories'],
  data(){
      return {
          storeState: store.state
      };
  },
  methods: {
      Places(e, category) {
          // clear place list
          this.storeState.Places = null;
          // toggle menu if there is a submenu
          e.target.classList.toggle('active')
          // get place list
          store.getPlaces(category)
      }
  }
}
</script>
