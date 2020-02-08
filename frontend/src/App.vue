<template>
  <div id="app" class="container-fluid">
    <div class="row">
      <Menu />
      <Places />
    </div>
  </div>
</template>

<script>
import Places from './components/Places.vue'
import Menu from './components/Menu.vue'

export default {
  name: 'App',
  components: {
    Menu,
    Places
  }
}
</script>

