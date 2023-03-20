<template>
  <v-card>
    <v-data-table 
      :headers="headers" 
      :items="keywords" 
      item-key="id" 
      class=" " 
      style="text-align: center !important;"
      hide-default-footer
      disable-sort>
      <!-- name -->
      <template #[`item.keyword`]="{ item }">
        <div class="d-flex align-center  justify-center">
          <span>{{ item.keyword }}</span>
        </div>
      </template>
      <template #[`item.delete`] >
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
 

export default {
  props: [
    'keywords'
  ],
  setup() {
    return {
      headers: [
        { text: 'keyword', value: 'keyword', align: 'center'},
        { text: ' ', value: 'delete' }
      ],
    }
  }
}
</script>
