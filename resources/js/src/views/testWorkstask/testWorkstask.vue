<template>
  <v-card>
  
    <div class="d-flex justify-center">
      <h1 class="text-center"> Test Work tasks </h1>
      <v-btn color="error" class="ml-5 " @click="Deleteall()">
        <v-icon>
          {{ icons.mdiCancel }}
        </v-icon>
        <span class="d-none d-sm-block">Delete all tasks</span>
      </v-btn>
    </div>
    <v-data-table 
      :headers="headers" 
      :items="$store.state.Workstask" 
      item-key="id" 
      class="table-rounded"
      disable-sort>
    </v-data-table>
  </v-card>
</template>
<script>

import store from '../../store'
import { mdiCancel } from '@mdi/js'

export default {
  store,
  setup() {
    const Deleteall = () => {
      store.dispatch('Deletealltasks');
    }
    return {
      Deleteall,
      headers: [
        {
          text: 'id', value: 'id', align: 'center',
          sortable: false,
        },
        { text: 'database_id', value: 'database_id' },
        { text: 'Status', value : 'status'},
        { text: 'Task type', value: 'task_type' },
        { text: "task_body", value : 'task_body'},
        { text: 'timestart', value : 'timestart'},
        { text: 'timefinish', value : 'timefinish'},
      ],
      icons: {
        mdiCancel
      }
    }
  },
  created: function () {
    store.dispatch('getTestWorks');
  }
}
</script>
