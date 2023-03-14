<template>
  <v-card flat class="pa-3 mt-2">

    <v-card-text class="d-flex justify-center align-item-center">
      <v-row>
        <v-col cols="12" md="6" class="d-sm-flex justify-end position-relative">
          <v-img contain max-width="170"  :src="require('@/assets/images/pro/uploadimage.png').default"
            class="security-character rounded"></v-img>
        </v-col>
        <v-col cols="12" md="6">
          <v-btn color="primary" class="me-3 mt-5 " @click="$refs.refInputEl.click()">
            <v-icon class="d-sm-none">
              {{ icons.mdiCloudUploadOutline }}
            </v-icon>
            <span class="d-none d-sm-block">Upload new txt</span>
          </v-btn>
          <p class="text-sm mt-5">
            Upload txt file here separator should be “:”
          </p>
          <input ref="refInputEl" type="file" accept=".txt" :hidden="true" />
        </v-col>
      </v-row>
    </v-card-text>
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
    const status = ['Active', 'Inactive', 'Pending', 'Closed']

    const accountDataLocale = ref(JSON.parse(JSON.stringify(props.accountData)))

    const resetForm = () => {
      accountDataLocale.value = JSON.parse(JSON.stringify(props.accountData))
    }
    return {
      status,
      accountDataLocale,
      resetForm,
      icons: {
        mdiAlertOutline,
        mdiCloudUploadOutline,
      },
    }
  },
}
</script>
