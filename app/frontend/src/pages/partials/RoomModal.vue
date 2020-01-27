<template>
  <q-dialog v-model="isOpen"
            transition-show="flip-down"
            transition-hide="flip-up"
  >
    <q-card
      class="bg-grey-10 text-white"
      style="width: 700px; max-width: 80vw;"
    >
      <q-bar>
        <q-space/>
        <q-btn dense flat icon="close" v-close-popup class="q-mr-sm">
          <q-tooltip content-class="bg-grey-8 text-white">Закрыть</q-tooltip>
        </q-btn>
      </q-bar>
      <q-card-section>
        <div class="text-h6">Создать комнату</div>
      </q-card-section>
      <q-card-section class="q-pt-none">
        <q-input
          ref="roomModalName"
          outlined
          standout="bg-white text-grey-7"
          v-model="roomCreatePopup.name"
          label="Название"
          bg-color="white"
          class="q-mb-md"
          :rules="[val => !!val || 'Поле обязательно']"
        />
        <div class="row justify-end">
          <q-btn outline label="Создать" class="login-button" @click="sendCreateRoom"/>
        </div>
      </q-card-section>
    </q-card>
  </q-dialog>
</template>

<script>
import { LocalStorage } from 'quasar'
const API_BASE_URL = process.env.API_BASE_URL

export default {
  name: 'RoomModal',
  data () {
    return {
      roomCreatePopup: {
        name: ''
      }
    }
  },
  computed: {
    isOpen: {
      get () {
        return this.$store.state.room.isOpen
      },
      set (val) {
        this.$store.commit('room/updateOpenState', val)
      }
    }
  },
  methods: {
    sendCreateRoom () {
      this.$refs.roomModalName.validate()
      if (this.$refs.roomModalName.hasError) {
        return false
      }

      this.$axios.get(`${API_BASE_URL}/users/rooms/created`, {
        name: this.roomCreatePopup.name,
        headers: {
          'Authorization': 'Bearer ' + LocalStorage.getItem('user-token')
        }
      }, {
        headers: {
          'Authorization': 'Bearer ' + LocalStorage.getItem('user-token')
        }
      }).then((response) => {
        console.log(response.data.data)
      })
        .catch((error) => {
          const errors = error.response.data.errors
          Object.keys(errors).forEach(item => {
            this.$q.notify({
              color: 'negative',
              message: errors[item].title,
              icon: 'report_problem',
              caption: errors[item].source
            })
          })
        })
    }
  }
}
</script>

<style scoped>

</style>
