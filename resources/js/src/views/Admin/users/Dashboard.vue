<template>
  <v-row> 
    <v-col cols="12">
      <add-user></add-user>
    </v-col>
    <v-col cols="12">
      <dashboard-datatable :users = "$store.state.users"></dashboard-datatable>
    </v-col>
  </v-row>
</template>

<script>

import AddUser from './adduser.vue';
import store from '../../../store';
import DashboardDatatable from './DashboardDatatable.vue';

export default {
  components: {
    AddUser,
    DashboardDatatable,
  },
  store,
  setup() {
    
    return {
      
    }
  },
  created: function () {
    store.dispatch('getusers');
  }
}
</script>
