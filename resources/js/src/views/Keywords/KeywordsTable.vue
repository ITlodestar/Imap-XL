<template>
  <v-card>
    <v-data-table 
      :headers="headers" 
      :items="keywords" 
      item-key="id" 
      class=" "
      disable-sort>
      <!-- name -->
      <template #[`item.keyword`]="{ item }">
        <div class="d-flex align-center  justify-center">
          <span>{{ item.keyword }}</span>
        </div>
      </template>
      <template #[`item.delete`] = "{ item }" >
        <div class="d-flex align-center justify-center">
          <v-btn variant="flat" color="error" @click="$emit('deleteKeyword', { id : item.id})">
            Delete
          </v-btn>
        </div>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
 
export default {
  props: {
    keywords: Array,
    deleteKeyword: Function
  },
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
