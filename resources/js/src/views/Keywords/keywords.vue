<template>
  <v-row>
    <v-col cols="12" class="mb-6">
      <keyword-input></keyword-input>
    </v-col>
    <v-col cols="12">
      <keywords-table></keywords-table>
    </v-col>
  </v-row>
</template>

<script>
import KeywordInput from './KeywordInput.vue'
import KeywordsTable from './KeywordsTable.vue'

export default {
  components: {
    KeywordInput,
    KeywordsTable,
  },
}
</script>
