<template>
  <q-page class="flex bg-black chat-page">
    <div class="q-pa-md row chat-page__container">
      <div class="chat-page__container">
        <q-chat-message
          name="<span class='text-positive'>Trusted Source</span>"
          avatar="https://cdn.quasar.dev/img/avatar3.jpg"
          :text="['hey, how are <strong>you</strong>?']"
          stamp="7 minutes ago"
          bg-color="orange"
        />
        <q-chat-message
          name="<span class='text-negative'>Jane (untrusted text but trusted name)</span>"
          avatar="https://cdn.quasar.dev/img/avatar5.jpg"
          :text="[
          'doing fine, how r you?',
          'I just feel like typing a really, really, <strong>REALY</strong> long message to annoy you...'
        ]"
          text-sanitize
          stamp="4 minutes ago"
          text-color="white"
          bg-color="grey-10"
        />
        <q-chat-message
          name="<span class='text-negative'>Jao (untrusted)</span>"
          name-sanitize
          avatar="https://cdn.quasar.dev/img/avatar5.jpg"
          :text="['<strong>Did it work?</strong>']"
          text-sanitize
          stamp="1 minutes ago"
          text-color="white"
          bg-color="grey-10"
        />
        <q-input
          v-model="message"
          dark
          outlined
          autofocus
          type="textarea"
          @keydown.enter.exact.prevent
          @keyup.enter.exact="sendMessage"
          bg-color="grey-10"
          class="q-mt-lg"
          color="orange"
        />
      </div>
    </div>
  </q-page>
</template>

<script>
import io from 'socket.io-client'
import { LocalStorage } from 'quasar'

export default {
  name: 'PageIndex',
  data () {
    return {
      message: '',
      websocketConnection: null
    }
  },
  methods: {
    sendMessage () {
      console.log(this.message)
      this.message = ''
    }
  },
  mounted () {
    const token = LocalStorage.getItem('user-token')
    this.websocketConnection = io.connect('ws://rt-chat.local:9501', {
      transports: ['websocket'],
      query: { token: token }
    })
  }
}
</script>

<style scoped>
  .chat-page {
    align-items: end;
  }

  .chat-page__container {
    width: 100%;
  }
</style>
