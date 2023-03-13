<template>
  <v-row>
    <v-col cols="12" class="mb-6">
      <keyword-input></keyword-input>
    </v-col>
    <v-col cols="12">
      <keywords-table :keywords="this.keywords"></keywords-table>
    </v-col>
  </v-row>
</template>

<script>
import { mapState, mapActions } from 'vuex';
import KeywordInput from './KeywordInput.vue'
import KeywordsTable from './KeywordsTable.vue'

export default {
  components: {
    KeywordInput,
    KeywordsTable,
  },
  setup() {
    return { }
  },
  created: function () { 
    this.getKeywords();
  },
  methods: {
    ...mapActions({
      getKeywords: 'getKeywords'
    }),
  },
  computed: {
    ...mapState([
      'keywords'
    ])
  }
}
</script>
