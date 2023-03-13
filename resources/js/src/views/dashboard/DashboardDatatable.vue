<template>
  <v-card>
    <h1 class="text-center"> list of databases </h1>
    <v-data-table
      :headers="headers"
      :items="data"
      item-key="full_name"
      class="table-rounded"
      hide-default-footer
      disable-sort
    >
     
      <!-- name -->
      <template #[`item.full_name`]="{item}">
        <div class="d-flex flex-column">
          <span class="d-block font-weight-semibold text--primary text-truncate">{{ item.full_name }}</span> 
        </div>
      </template>
      <template #[`item.salary`]="{item}">
        {{ `$${item.salary}` }}
      </template>
      <!-- status -->
      <template #[`item.status`]="{item}">
        <v-chip
          small
          :color="statusColor[status[item.status]]"
          class="font-weight-medium"
        >
          {{ status[item.status] }}
        </v-chip>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
import { mdiSquareEditOutline, mdiDotsVertical } from '@mdi/js'

export default {
  props: ['data'],
  setup() {
    const statusColor = {
      /* eslint-disable key-spacing */
      new: 'info',
      progress: 'primary',
      checked: 'success',
      /* eslint-enable key-spacing */
    }

    return {
      headers: [
        { text: 'Name', value: 'name' , align: 'center'},
        { text: 'File', value: 'filename' , align: 'center'},
        { text: 'Comment', value: 'comment', align: 'center' },
        { text: 'status', value: 'status' , align: 'center'},
      ],
     
      status: {
        0: 'progress',
        1: 'new',
        2: 'checked', 
      },
      statusColor,

      // icons
      icons: {
        mdiSquareEditOutline,
        mdiDotsVertical,
      },
    }
  },
}
</script>
