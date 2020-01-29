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
          @click="leftDrawerOpen = !leftDrawerOpen"
          icon="menu"
          aria-label="Menu"
        />

        <q-toolbar-title>
          RT Chat
        </q-toolbar-title>

      </q-toolbar>
    </q-header>
    <drawer></drawer>

    <room-modal></room-modal>

    <q-page-container>
      <router-view/>
    </q-page-container>
  </q-layout>
</template>

<script>
import RoomModal from '../pages/partials/RoomModal'
import Drawer from '../pages/partials/Drawer'

export default {
  name: 'Main',
  components: {
    RoomModal,
    Drawer
  }
}
</script>
