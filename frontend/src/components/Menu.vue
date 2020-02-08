<template>
  <div class="col-5 col-sm-5 col-lg-4 col-xl-3 p-0">
    
    <div id="jquery-accordion-menu" class="jquery-accordion-menu">
        <ul v-for="category in storeState.Categories" v-bind:key="category.id">
            <li class="text-left">
                <a @click="activate">
                    <img :src="category.icon.prefix+'32'+category.icon.suffix" />
                    {{category.name}} 
                    <span class='submenu-indicator' v-if="category.categories.length > 0">+</span>
            </a>
                <MenuItem :categories="category.categories" />
            </li>
        </ul>
    </div>

  </div>
</template>

<script>
import MenuItem from './Menu/Item.vue';
import { store } from '../store.js';

export default {
  name: 'Menu',
  components: {
      MenuItem
  },
  data(){
      return {
          storeState: store.state
      };
  },
  beforeMount(){
      store.getCategories()
  },
  methods: {
      activate: function(e){
          e.target.classList.toggle('active')
      }
  }
}
</script>
