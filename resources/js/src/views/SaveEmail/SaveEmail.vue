<template>
      <v-card>
        <v-card-title>Basic</v-card-title>
        <save-email-table></save-email-table>
      </v-card>
</template>

<script>
import SaveEmailTable from './SaveEmailTable.vue'

export default {
  components: {
    SaveEmailTable,
  },
  setup() {
    return {}
  },
}
</script>
