<template>
  <v-card>
    <v-data-table 
      :headers="headers" 
      :items="keylist" 
      item-key="id" 
      class="table-rounded" hide-default-footer
      disable-sort>
      <!-- name -->
      <template #[`item.keyword`]="{ item }">
        <div class="d-flex flex-column">
          <span>{{ item.keyword }}</span>
        </div>
      </template>
      <template #[`item.delete`]="{ item }" >
        <div class="d-flex align-center justify-center">
          <v-btn variant="flat" color="error">
            Delete
          </v-btn>
        </div>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
import data from './keyword';

export default {
  setup() {
    return {
      headers: [
        { text: 'keyword', value: 'keyword' },
        { text: ' ', value: 'delete' }
      ],
      keylist: data
    }
  }
}
</script>
