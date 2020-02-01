import axios from 'axios'
import Vue from 'vue'
import { LocalStorage, Notify } from 'quasar'

const config = {
  baseURL: process.env.API_BASE_URL
}
const instance = axios.create(config)

instance.interceptors.request.use(config => {
  const token = LocalStorage.getItem('user-token')
  if (token) {
    config.headers.common['Authorization'] = `Bearer ${token}`
  }
  return config
}, error => Promise.reject(error))
instance.interceptors.response.use(response => response, error => {
  const response = error.response
  if (response) {
    switch (response.status) {
      case 401:
      case 403:
        LocalStorage.remove('user-token')
        LocalStorage.remove('user-data')
        break
      case 400:
      case 409:
      case 422:
      case 429:
        const errors = response.data.errors
        if (errors) {
          Object.keys(errors).forEach(item => {
            Notify.create({
              color: 'negative',
              message: errors[item].title,
              icon: 'report_problem',
              caption: errors[item].source,
              position: 'bottom-right'
            })
          })
        }
        break
    }
    return response
  }
  return Promise.reject(error)
})

Plugin.install = (Vue, option) => {
  Vue.$http = instance
  window.$http = instance
  Object.defineProperty(Vue.prototype, '$http', {
    get () { return instance }
  })
}

Vue.use(Plugin)

export default Plugin
