import Vue from 'vue'
import axios from 'axios'
axios.defaults.headers.post['Content-Type'] = 'application/json'
axios.defaults.headers.post['Access-Control-Allow-Headers'] = '*'
Vue.prototype.$axios = axios
