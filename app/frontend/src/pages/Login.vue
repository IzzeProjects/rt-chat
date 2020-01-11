<template>
  <q-page class="flex flex-center bg-black">
    <div class="q-pa-md row justify-center">
      <q-card dark bordered
              class="bg-grey-10 my-card login-card"
      >
        <q-card-section>
          <div class="text-h6">Вход</div>
        </q-card-section>

        <q-separator dark inset />

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
const API_BASE_URL = process.env.API_BASE_URL
export default {
  name: 'Login',
  data () {
    return {
      login: '',
      password: ''
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

      const res = await this.$http.post(`${API_BASE_URL}/auth/login`, { login: this.login, password: this.password }).catch(() => {
        console.warn('...Catched')
      })
      if (res) {
        console.log(res)
      }
      // this.$axios.post(
      //   `${API_BASE_URL}/auth/login`
      // )
      //   .then((response) => {
      //     this.data = response.data
      //   })
      //   .catch(() => {
      //     console.log(12321)
      //   })
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
