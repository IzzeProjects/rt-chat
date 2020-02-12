<template>
  <q-drawer
    v-model="isLeftDrawerOpenLocal"
    :width="300"
    :breakpoint="600"
    show-if-above
  >
    <q-scroll-area
      style="height: calc(100% - 150px); margin-top: 150px; border-right: 1px solid transparent"
      class="bg-grey-10 text-white"
    >
      <q-tabs
        v-model="tab"
        dense
        class="text-grey"
        active-color="white"
        indicator-color="orange"
        align="justify"
        narrow-indicator
      >
        <q-tab name="dialogs" label="Диалоги"/>
        <q-tab name="rooms" label="Комнаты"/>
      </q-tabs>
      <q-tab-panels v-model="tab" animated class="bg-grey-10 text-white">
        <q-tab-panel name="dialogs">
          <q-select
            ref="userSearch"
            dark
            dense
            v-model="userSearch"
            use-input
            hide-selected
            fill-input
            input-debounce="500"
            label="Поиск"
            lazy-rules
            :options="usersList"
            @filter="filterFn"
            @filter-abort="abortFilterFn"
            style="width: 250px"
            hint="Начните вводить почту пользователя"
            color="orange"
            option-label="email"
          >
            <template v-slot:no-option>
              <q-item>
                <q-item-section class="text-grey">
                  No results
                </q-item-section>
              </q-item>
            </template>
          </q-select>
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
        </q-tab-panel>
        <q-tab-panel name="rooms">
          <q-btn
            text-color="black"
            color="orange"
            class="sidebar-rooms__btn q-mr-lg"
            label="Создать комнату"
            @click="isRoomOpen = true"
          />
        </q-tab-panel>
      </q-tab-panels>

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
</template>

<script>
export default {
  name: 'Drawer',
  props: {
    isLeftDrawerOpen: Boolean
  },
  data: () => ({
    isLeftDrawerOpenLocal: null,
    tab: 'dialogs',
    userSearch: null,
    usersList: []
  }),
  watch: {
    isLeftDrawerOpen: function () {
      this.isLeftDrawerOpenLocal = !this.isLeftDrawerOpenLocal
    },
    userSearch: function (value) {
      if (value) {
        this.dialogCreateModal = {
          isOpen: true,
          user: value
        }
        this.userSearch = null
      }
    }
  },
  mounted () {
    this.isLeftDrawerOpenLocal = this.isLeftDrawerOpen
  },
  computed: {
    isRoomOpen: {
      set (val) {
        this.$store.commit('room/updateOpenState', val)
      },
      get () {
        return this.$store.state.room.isOpen
      }
    },
    dialogCreateModal: {
      set (val) {
        this.$store.commit('dialog/updateCrateModalState', val)
      },
      get () {
        return this.$store.state.dialog.createModal
      }
    }
  },
  methods: {
    async filterFn (val, update, abort) {
      if (val === '') {
        abort()
        return
      }
      const response = await this.$http.get('/dialogs/users', {
        params: {
          email: val
        }
      })

      if (response) {
        update(() => {
          this.usersList = response.data.data
        })
        return
      }

      abort()
    },

    abortFilterFn () {
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
