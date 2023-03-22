<template>
  <v-container class="d-flex">

    <v-textarea 
      color="primary" 
      label="textarea to add list of keywords one keyword each line"
      v-model="keyInput"
      value
      >
    </v-textarea>

    <v-btn color="success" class="me-3 mt-5 " @click="KeyWordSave()">
      <v-icon>
        {{ icons.mdiCloudUploadOutline }}
      </v-icon>
      <span class="d-none d-sm-block">Save</span>
    </v-btn>
  </v-container>
</template>

<script>

import { mdiAlertOutline, mdiCloudUploadOutline, mdiCancel } from '@mdi/js'
import { ref } from '@vue/composition-api'
import store from '../../store';

export default {
  setup() {
    let keyInput = ref(null);
    const KeyWordSave = () => { 
      let keyarray = keyInput.value.split(/\r\n|\r|\n/);
      store.dispatch('addKeywords', { newkeys: keyarray });
      keyInput.value = null;
    }
    return {
      keyInput,
      KeyWordSave,
      icons: {
        mdiCancel,
        mdiAlertOutline,
        mdiCloudUploadOutline,
      },
    }
  }
}
</script>
