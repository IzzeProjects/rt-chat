<template>
  <q-dialog v-model="dialogCreateModal.isOpen"
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
        <div class="text-h6">Новый даилог с пользователем {{ user.email }}</div>
      </q-card-section>
      <q-card-section class="q-pt-none">
        <ul>
          <li>Имя: {{ user.name }}</li>
          <li>Здесь с: {{ user.createdAt }}</li>
        </ul>
        <div class="row justify-end">
          <q-btn outline label="Начать" class="login-button" @click="sendCreateRoom"/>
        </div>
      </q-card-section>
    </q-card>
  </q-dialog>
</template>

<script>
export default {
  name: 'CreateDialogModal',
  data: () => ({
    dialogCreatePopup: ''
  }),
  computed: {
    dialogCreateModal: {
      set (val) {
        this.$store.commit('dialog/updateCrateModalState', val)
      },
      get () {
        return this.$store.state.dialog.createModal
      }
    },
    user () {
      return this.dialogCreateModal.user
    }
  },
  methods: {
    sendCreateRoom () {
      // TODO метод создания диалога
      console.log(this.user)
    }
  }
}
</script>
