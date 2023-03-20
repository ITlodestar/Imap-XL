<template>
  <v-card>
    <h1 class="text-center"> list Users </h1>
    <v-data-table :headers="headers" :items="userList" item-key="full_name" class="table-rounded" hide-default-footer
      disable-sort> 
    </v-data-table>
  </v-card>
</template>

<script>
import { mdiSquareEditOutline, mdiDotsVertical } from '@mdi/js'
import data from './datatable-data'

export default {
  setup() {
    return {
      headers: [
        { text: 'Name', value: 'full_name' ,  align: 'center',
    sortable: false,},
        { text: 'Create Date', value: 'createdate' },
        { text: 'Last Date', value: 'lastdate' },
      ],
      userList: data,
      // icons
      icons: {
        mdiSquareEditOutline,
        mdiDotsVertical,
      },
    }
  },
}
</script>
