import Vue from 'vue'
import App from './App.vue'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import './assets/default.css'
import './assets/font-awesome.min.css'
// import { store } from './store'

Vue.config.productionTip = false

const app = new Vue({
  // store,
  render: h => h(App),
}).$mount('#app')

export default app;