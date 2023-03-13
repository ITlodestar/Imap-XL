<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent width="1024">
      <template v-slot:activator="{ props }">
        <div class="d-flex w-full justify-start">
          <v-btn color="primary" v-bind="props" @click="dialog = true">
            Add User
          </v-btn>
        </div>

      </template>
      <v-card>
        <v-card-title>
          <span class="text-h5">Input new user name</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="6">
                <v-text-field label="Full name*" required></v-text-field>
              </v-col>
              <v-col cols="12" sm="4" md="6" class="d-none d-sm-flex justify-center position-relative">
                <v-img contain max-width="170" :src="require('@/assets/images/3d-characters/pose-m-1.png').default"
                  class="security-character"></v-img>
              </v-col>
            </v-row>
          </v-container> 
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="info" variant="text" @click="dialog = false">
            Close
          </v-btn>
          <v-btn color="success" variant="text" @click="dialog = false">
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
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
    const dialog = ref(false)
    const status = ['Active', 'Inactive', 'Pending', 'Closed']

    const accountDataLocale = ref(JSON.parse(JSON.stringify(props.accountData)))

    const resetForm = () => {
      accountDataLocale.value = JSON.parse(JSON.stringify(props.accountData))
    }
    return {
      dialog,
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
