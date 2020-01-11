import axios from 'axios'
import Vue from 'vue'

const config = {}
const instance = axios.create(config)

instance.interceptors.request.use(config => config, error => Promise.reject(error))
instance.interceptors.response.use(response => response, error => Promise.reject(error))

Plugin.install = (Vue, option) => {
  Vue.$http = instance
  window.$http = instance
  Object.defineProperty(Vue.prototype, '$http', {
    get () { return instance }
  })
}

Vue.use(Plugin)

export default Plugin
