<template>
  <v-card>
    <h1 class="text-center"> list of databases </h1>
    <v-data-table 
      :headers="headers" 
      :items="data" 
      item-key="full_name" 
      class="table-rounded"
      disable-sort
       >

      <!-- name -->
      <template #[`item.full_name`]="{ item }">
        <div class="d-flex flex-column">
          <span class="d-block font-weight-semibold text--primary text-truncate">{{ item.full_name }}</span>
        </div>
      </template>

      <!-- status -->
      <template #[`item.status`]="{ item }">
        <div class="d-flex align-center justify-center  ">
          <v-chip small :color="statusColor[status[item.status]]" class="font-weight-medium" outlined>
            {{ status[item.status] }}
          </v-chip> 
        </div>
      </template>
      <template #[`item.progress`]="{ item }">
        <div v-if="!item.status" >
            <v-btn color="info" rounded @click="Process(item.id)">
              Process
              <v-icon>
                {{ icons.mdiSendCircle }}
              </v-icon>
            </v-btn>
          </div>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
import { mdiSquareEditOutline, mdiDotsVertical, mdiSendCircle } from '@mdi/js'
import store from '../../store';

export default {
  props: ['data'],
  setup() {
    const statusColor = {
      new: 'info',
      progress: 'primary',
      checked: 'success',
    }
    const Process = (id) => {
      store.dispatch('setProcess', id );
    }
    return {
      headers: [
        { text: 'Name', value: 'name', align: 'center' },
        { text: 'File', value: 'filename', align: 'center' },
        { text: 'Comment', value: 'comment', align: 'center' },
        { text: 'status', value: 'status', align: 'center' },
        { text: '', value: 'progress', align: 'left' }
      ],
      Process,
      status: {
        0: 'new',
        1: 'Cron generates tasks',
        2: 'checked',
      },
      statusColor, 
      icons: {
        mdiSquareEditOutline,
        mdiDotsVertical,
        mdiSendCircle
      },
    }
  },
}
</script>
