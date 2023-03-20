<template>
  <v-card flat class="pa-3 mt-2">
    <v-card-text class="d-flex justify-center align-item-center">
      <v-row>
        <v-col :class="{ 'd-flex': !fileupload }">
          <v-img contain max-width="170" :src="require('@/assets/images/pro/uploadimage.png').default"
            class="security-character rounded">
          </v-img>
          <div class="d-flex flex-wrap align-content-end">
            <div v-if="fileupload == false">
              <v-btn color="primary" class="me-3 mt-5 " @click="$refs.refInputEl.click()">
                <v-icon class="d-sm-none">
                  {{ icons.mdiCloudUploadOutline }}
                </v-icon>
                <span class="d-none d-sm-block">Upload new txt</span>
              </v-btn>
              <p class="text-sm mt-5">
                Upload txt file here separator should be “:”
              </p>
              <input type="file" accept=".txt" ref="refInputEl" id="uploadtxt" v-on:change="importData"
                style="display: none;" />
            </div>
            <v-container v-else>
              <v-textarea color="primary" label="Comment" v-model="Comment"></v-textarea>
            </v-container>
          </div>
        </v-col>

        <div v-if="Comment">
          <v-progress-circular v-if="loading" :size="50" color="primary" indeterminate>
          </v-progress-circular>
          <v-btn color="success" class="me-3 mt-5 " @click="Upload()">
            <v-icon>
              {{ icons.mdiCloudUploadOutline }}
            </v-icon>
            <span class="d-none d-sm-block">Upload</span>
          </v-btn>
          <v-btn color="error" class="me-3 mt-5 " @click="UploadCancel()">
            <v-icon>
              {{ icons.mdiCancel }}
            </v-icon>
            <span class="d-none d-sm-block">Cancel</span>
          </v-btn>
        </div>
      </v-row>
    </v-card-text>
  </v-card>
</template>

<script>

import { mdiAlertOutline, mdiCloudUploadOutline, mdiCancel } from '@mdi/js'
import { ref } from '@vue/composition-api'
import store from '../../store'
import axios from 'axios'

export default {
  props: {
    accountData: {
      type: Object,
      default: () => { },
    },
  },
  store,
  setup(props, context) {

    let file = ref(null);
    let Comment = ref(null);

    let fileupload = ref(false); // file upload success
    let successupload = ref(false); // all 

    let loading = ref(false);

    const importData = (e) => {
      file = e.target.files[0] || e.dataTransfer.files[0];

      const reader = new FileReader();
      reader.readAsText(file);

      reader.onload = async () => {
        loading.value = true;
        const r = reader.result?.toString();
        if (r != null) {
          // console.log(r);
        }
        loading.value = false;
        fileupload.value = true;
      };

    };

    const Upload = () => {

      let data = new FormData();
      data.append('file', file);
      data.append('comment', JSON.stringify(Comment));

      axios.post('/uploadfile',
        data,
        {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }
      ).then(res => {

        let addtask = {
          name: file.name,
          filename: res.data,
          comment: Comment.value,
          status: 0
        }
        store.commit('addTaks', addtask)
        console.log("Successfull file upload");
        UploadCancel();
      }).catch(function () {
          // console.log('FAILURE!!');
        });

    }
    const UploadCancel = () => {
      file.value = '';
      fileupload.value = false;
      Comment.value = '';
      document.getElementById('uploadtxt').value = false;
    }

    return {
      Comment,
      loading,
      fileupload,
      successupload,
      importData,
      UploadCancel,
      Upload,
      icons: {
        mdiCancel,
        mdiAlertOutline,
        mdiCloudUploadOutline,
      },
    };
  },

}
</script>
