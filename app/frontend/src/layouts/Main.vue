<template>
  <q-layout view="lHh Lpr lFf">
    <q-header
      elevated
      class="bg-grey-10"
    >
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          @click="isLeftDrawerOpen = !isLeftDrawerOpen"
          icon="menu"
          aria-label="Menu"
        />

        <q-toolbar-title>
          RT Chat
        </q-toolbar-title>

      </q-toolbar>
    </q-header>
    <drawer :isLeftDrawerOpen='isLeftDrawerOpen'></drawer>

    <room-modal></room-modal>
    <create-dialog-modal></create-dialog-modal>

    <q-page-container>
      <router-view/>
    </q-page-container>
  </q-layout>
</template>

<script>
import RoomModal from '../pages/partials/RoomModal'
import Drawer from '../pages/partials/Drawer'
import CreateDialogModal from '../pages/partials/CreateDialogModal'

export default {
  name: 'Main',
  data: () => ({
    isLeftDrawerOpen: true
  }),
  components: {
    CreateDialogModal,
    RoomModal,
    Drawer
  }
}
</script>
