<template>
  <v-row>
    <v-col cols="12">
      <add-user :account-data="accountSettingData.account"></add-user>
    </v-col>
    <v-col cols="12">
      <dashboard-datatable></dashboard-datatable>
    </v-col>
  </v-row>
</template>

<script>

import AddUser from './adduser.vue';
import DashboardDatatable from './DashboardDatatable.vue';

export default {
  components: {
    AddUser,
    DashboardDatatable,
  },
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
      information: {
        bio: 'The name’s John Deo. I am a tireless seeker of knowledge, occasional purveyor of wisdom and also, coincidentally, a graphic designer. Algolia helps businesses across industries quickly create relevant 😎, scaLabel 😀, and lightning 😍 fast search and discovery experiences.',
        birthday: 'February 22, 1995',
        phone: '954-006-0844',
        website: 'https://themeselection.com/',
        country: 'USA',
        languages: ['English', 'Spanish'],
        gender: 'male',
      },
    }

    return {
      accountSettingData
    }
  },
}
</script>
