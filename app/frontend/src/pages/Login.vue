<template>
    <q-page class="flex flex-center bg-black">
        <div class="q-pa-md row justify-center">
            <q-card dark bordered
                    class="bg-grey-10 my-card login-card"
            >
                <q-card-section>
                    <div class="text-h6">Вход</div>
                </q-card-section>

                <q-separator dark inset/>

                <q-card-section>
                    <q-input
                            ref="login"
                            outlined
                            standout="bg-white text-grey-7"
                            v-model="login"
                            label="Логин или Почта"
                            bg-color="white"
                            class="q-mb-md"
                            :rules="[val => !!val || 'Поле обязательно']"
                    />
                    <q-input
                            ref="password"
                            outlined
                            standout="bg-white text-grey-7"
                            v-model="password"
                            label="Пароль"
                            bg-color="white"
                            class="q-mb-md"
                            :rules="[
                val => !!val || 'Поле обязательно',
                val => val.length > 7 || 'Поле должно быть 8 символов'
              ]"
                    />
                    <div class="row justify-end">
                        <q-btn outline label="Войти" class="login-button" @click="sendLogin"/>
                    </div>
                </q-card-section>
            </q-card>
        </div>
    </q-page>
</template>

<script>
import { LocalStorage } from 'quasar'
import jwtDecode from 'jwt-decode'

const API_BASE_URL = process.env.API_BASE_URL

let token = LocalStorage.getItem('user-token') || null
const jwt = token ? jwtDecode(token) : { exp: 0 }
const expired = jwt.exp < Math.round(Date.now() / 1000)
if (expired) {
  LocalStorage.remove('user-token')
  token = null
}

export default {
  name: 'Login',
  data () {
    return {
      login: 'test@test.ru',
      password: '123123123'
    }
  },
  methods: {
    async sendLogin () {
      this.$refs.login.validate()
      this.$refs.password.validate()

      if (this.$refs.login.hasError || this.$refs.password.hasError) {
        console.log('inputs has errors')
        return
      }
      console.log(API_BASE_URL)

      const res = await this.$axios.post(`${API_BASE_URL}/auth/login`, {
        email: this.login,
        password: this.password
      }).catch(() => {
        console.warn('...Catched')
      })
      if (res.errors) {
        return false
      }
      const data = res.data.data
      const token = data.accessToken
      console.log(token)
      const jwt = token && jwtDecode(token)
      console.log(jwt)
      if (token && jwt) {
        this.token = token
        this.expired = false
        this.profile = Object.assign({}, jwt)
        LocalStorage.set('user-token', token)
        LocalStorage.set('user-data', jwt)
        this.$app.$router.push('/')
        return true
      }
      return false
    }

  }
}
</script>

<style scoped>
    .login-card {
        width: 300px;
    }

    .login-button {
        width: 100px;
    }
</style>
