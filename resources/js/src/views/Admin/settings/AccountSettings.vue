<template>
  <v-card  >
    <!-- tabs -->
    <v-tabs v-model="tab" show-arrows>
      <v-tab v-for="tab in tabs" :key="tab.icon">
        <v-icon size="20" class="me-3">
          {{ tab.icon }}
        </v-icon>
        <span>{{ tab.title }}</span>
      </v-tab>
    </v-tabs>

    <!-- tabs item -->
    <v-tabs-items v-model="tab">
      <v-tab-item>
        <list-settings ></list-settings>
      </v-tab-item>

      <v-tab-item>
        <table-settings></table-settings>
      </v-tab-item>
 
    </v-tabs-items>
  </v-card>
</template>

<script>
import { mdiViewList , mdiTableCog } from '@mdi/js'
import { ref } from '@vue/composition-api'

// demos
import ListSettings from './ListSettings.vue' 
import TableSettings from './TableSettings.vue'

export default {
  components: {
    ListSettings,
    TableSettings
  },
  setup() {
    const tab = ref('')

    // tabs
    const tabs = [
      { title: 'list of setting', icon: mdiViewList }, 
      { title: 'table settings', icon: mdiTableCog },
    ]

    return {
      tab,
      tabs,
      icons: {
        mdiViewList, 
        mdiTableCog
      },
    }
  },
}
</script>
