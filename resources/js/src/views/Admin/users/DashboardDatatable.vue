<template>
  <v-card>
    <h1 class="text-center"> list Users </h1>
    <v-data-table 
      :headers="headers" 
      :items="users" 
      item-key="full_name" 
      class="table-rounded"
      >
      <!-- status -->
      <template #[`item.created_at`]="{ item }">
        <div class="d-flex align-center justify-center  ">
          <v-chip  class="font-weight-medium" outlined>
            {{ formatDate(item.created_at) }}
          </v-chip> 
        </div>
      </template>
      <template #[`item.updated_at`]="{ item }">
        <div class="d-flex align-center justify-center  ">
          <v-chip  class="font-weight-medium" outlined>
            {{ formatDate(item.updated_at) }}
          </v-chip> 
        </div>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
import { mdiSquareEditOutline, mdiDotsVertical } from '@mdi/js'

export default {
  props: {
    users: Array
  },
  setup() {
    const formatDate = (date) => {
      // let parsedata = parseInt(date)*1000;
      console.log(date);
      let d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
      if (month.length < 2)
        month = '0' + month;
      if (day.length < 2)
        day = '0' + day;
      return [year, month, day].join('/');
    }
    return {
      headers: [
        { text: 'Name', value: 'username', align: 'center', sortable: false, },
        { text: 'Create Date', value: 'created_at', align: 'center' },
        { text: 'Last Date', value: 'updated_at' , align: 'center'},
      ],
      formatDate,
      // icons
      icons: {
        mdiSquareEditOutline,
        mdiDotsVertical,
      },
    }
  },
}
</script>
