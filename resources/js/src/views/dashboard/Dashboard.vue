<template>
  <v-row>
    
    <v-col cols="12">
      <account-settings-account :account-data="accountSettingData.account"></account-settings-account>
    </v-col>
    <v-col v-if="$store.state.database" cols="12">
      <dashboard-datatable :data="$store.state.database"></dashboard-datatable>
    </v-col>
  </v-row>
</template>

<script>

import AccountSettingsAccount from './upload.vue';
import DashboardDatatable from './DashboardDatatable.vue';
import store from '../../store';

export default {
  components: {
    AccountSettingsAccount,
    DashboardDatatable,
  },
  store,
  setup() { 
    const accountSettingData = {
      account: {
        avatarImg: require('@/assets/images/avatars/1.png').default,
        username: 'johnDoe',
        name: 'john Doe',
        email: 'johnDoe@example.com',
        role: 'Admin',
        status: 'Active',
        company: 'Google.inc',
      },
    }
    return { 
      accountSettingData
    }
  },
  created: function () {
    store.dispatch('getDatabase'); 
  }
}
</script>
