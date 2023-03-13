<template>
  <v-card flat class="mt-5 text-center">
      Table 
  </v-card>
</template>

<script>
import { mdiAlertOutline, mdiCloudUploadOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'

export default {
  props: {
    accountData: {
      type: Object,
      default: () => { },
    },
  },
  setup(props) {
     
    return {
      
    }
  },
}
</script>
