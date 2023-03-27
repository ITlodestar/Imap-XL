<template>
  <v-card>
    <h1 class="text-center"> Test Work tasks </h1>
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

export default {
  store,
  setup() {
    return {
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
    }
  },
  created: function () {
    store.dispatch('getTestWorks');
  }
}
</script>
