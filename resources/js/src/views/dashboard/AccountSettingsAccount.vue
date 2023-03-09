<template>
  <v-card flat class="pa-3 mt-2">
    <v-card-text class="d-flex justify-center align-item-center">
      <!-- <v-avatar rounded size="120" class="me-6">
        <v-img :src="accountDataLocale.avatarImg"></v-img>
      </v-avatar> -->

      <!-- upload photo -->
      <div>
        <v-btn color="primary" class="me-3 mt-5" @click="$refs.refInputEl.click()">
          <v-icon class="d-sm-none">
            {{ icons.mdiCloudUploadOutline }}
          </v-icon>
          <span class="d-none d-sm-block">Upload new txt</span>
        </v-btn>

        <p class="text-sm mt-5">
          Upload txt file here separator should be “:”
        </p>
        <input ref="refInputEl" type="file" accept=".txt" :hidden="true" />

        <!-- <v-btn color="error" outlined class="mt-5">
          Reset
        </v-btn> -->

      </div>
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
