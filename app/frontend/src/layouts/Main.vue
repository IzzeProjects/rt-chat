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
    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      :width="300"
      :breakpoint="600"
    >
      <q-scroll-area
        style="height: calc(100% - 150px); margin-top: 150px; border-right: 1px solid transparent"
        class="bg-grey-10 text-white"
      >
        <div class="row sidebar-rooms">
          <div class="text-body1 q-ml-md q-mt-md q-mb-md">Комнаты</div>
          <q-btn
            text-color="black"
            color="orange"
            class="sidebar-rooms__btn q-mr-lg"
            label="Создать комнату"
            @click="roomCreatePopupShow = true"
          />
        </div>
        <q-list padding>
          <q-item clickable v-ripple>
            <q-item-section>
              Комната 1
            </q-item-section>
          </q-item>

          <q-item active clickable v-ripple>
            <q-item-section>
              Комната 2
            </q-item-section>
          </q-item>

          <q-item clickable v-ripple>
            <q-item-section>
              Комната 3
            </q-item-section>
          </q-item>

          <q-item clickable v-ripple>
            <q-item-section>
              Комната 4
            </q-item-section>
          </q-item>
        </q-list>
      </q-scroll-area>

      <q-img class="absolute-top" src="https://cdn.quasar.dev/img/material.png" style="height: 150px">
        <div class="absolute-bottom bg-transparent">
          <q-avatar size="80px" class="q-mb-sm">
            <img src="https://cdn.quasar.dev/img/boy-avatar.png">
          </q-avatar>
          <div class="text-weight-bold">Анатолий Васильев</div>
        </div>
      </q-img>
    </q-drawer>
    <q-dialog v-model="roomCreatePopupShow"
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
            ref="roomCreate"
            outlined
            standout="bg-white text-grey-7"
            v-model="roomCreatePopup.name"
            label="Название"
            bg-color="white"
            class="q-mb-md"
            :rules="[val => !!val || 'Поле обязательно']"
          />
          <div class="row justify-end">
            <q-btn outline label="Создать" class="login-button" />
          </div>
        </q-card-section>
      </q-card>
    </q-dialog>
    <q-page-container>
      <router-view/>
    </q-page-container>
  </q-layout>
</template>

<script>
export default {
  name: 'Main',
  data () {
    return {
      leftDrawerOpen: true,
      roomCreatePopupShow: false,
      roomCreatePopup: {
        name: ''
      }
    }
  }
}
</script>

<style scoped>
  .q-list > .q-item--active {
    color: #F2C037;
  }

  .sidebar-rooms {
    align-items: center;
  }

  .sidebar-rooms__btn {
    margin-left: auto;
  }
</style>
