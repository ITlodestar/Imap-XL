<template>
  <v-navigation-drawer
    :value="isDrawerOpen"
    app
    floating
    width="260"
    class="app-navigation-menu"
    :right="$vuetify.rtl"
    @input="val => $emit('update:is-drawer-open', val)"
  >
    <!-- Navigation Header -->
    <div class="vertical-nav-header d-flex items-center ps-6 pe-5 pt-5 pb-2">
      <router-link to="/" class="d-flex align-center text-decoration-none">
        <!-- <v-img
          :src="require('@/assets/images/logos/logo.svg').default"
          max-height="30px"
          max-width="30px"
          alt="logo"
          contain
          eager
          class="app-logo me-3"
        ></v-img> -->
        <v-slide-x-transition>
          <h2 class="app-title text--primary">Imap</h2>
        </v-slide-x-transition>
      </router-link>
    </div>

    <!-- Navigation Items -->
    <v-list expand shaped class="vertical-nav-menu-items pr-5">
      <nav-menu-section-title title="Use Interface"></nav-menu-section-title>
      <nav-menu-link title="Databases" :to="{ name: 'dashboard' }" :icon="icons.mdiHomeOutline"></nav-menu-link> 
      <nav-menu-link title="Keywords" :to="{ name: 'keywords' }" :icon="icons.mdiAlphaTBoxOutline"></nav-menu-link>
      <nav-menu-link title="Saved Emails" :to="{ name: 'saveemail' }" :icon="icons.mdiEmailEditOutline"></nav-menu-link>
    </v-list>
    <v-list expand shaped class="vertical-nav-menu-items pr-5" v-if="role == 1">
      <nav-menu-section-title title="Admin Panel"></nav-menu-section-title>
      <nav-menu-link title="Users" :to="{ name: 'adminusers' }" :icon="icons.mdiAccountCogOutline"></nav-menu-link> 
      <nav-menu-link title="Settings" :to="{ name: 'adminsettings' }" :icon="icons.mdiCogOutline"></nav-menu-link> 
    </v-list>
    <v-list expand shaped class="vertical-nav-menu-items pr-5">
      <nav-menu-section-title title="Test"></nav-menu-section-title>
      <nav-menu-link title="Test for Work tasks" :to="{ name: 'testWorkstask' }" ></nav-menu-link>
      <nav-menu-link title="login page" :to="{ name: 'pages-login' }"  ></nav-menu-link> 
    </v-list>
  </v-navigation-drawer>
</template>

<script>
// eslint-disable-next-line object-curly-newline
import {
  mdiHomeOutline,
  mdiAlphaTBoxOutline,
  mdiEmailEditOutline,
  mdiAccountCogOutline,
  mdiCogOutline
} from '@mdi/js'

import NavMenuSectionTitle from './components/NavMenuSectionTitle.vue'
import NavMenuGroup from './components/NavMenuGroup.vue'
import NavMenuLink from './components/NavMenuLink.vue'
import { ref } from '@vue/composition-api'

export default {
  components: {
    NavMenuSectionTitle,
    NavMenuGroup,
    NavMenuLink,
  },
  props: {
    isDrawerOpen: {
      type: Boolean,
      default: null,
    },
  },
  setup() {
    const role = ref(localStorage.getItem('role'));
    console.log(role);
    return {
      role,
      icons: {
        mdiHomeOutline,
        mdiAlphaTBoxOutline,
        mdiEmailEditOutline,
        mdiCogOutline,
        mdiAccountCogOutline
      },
    }
  },
}
</script>

<style lang="scss" scoped>
@import '@resources/sass/preset/mixins.scss';

.app-title {
  font-size: 1.25rem;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: 0.3px;
}

// ? Adjust this `translateX` value to keep logo in center when vertical nav menu is collapsed (Value depends on your logo)
.app-logo {
  transition: all 0.18s ease-in-out;
  .v-navigation-drawer--mini-variant & {
    transform: translateX(-4px);
  }
}

@include theme(app-navigation-menu) using ($material) {
  background-color: map-deep-get($material, 'background');
}

.app-navigation-menu {
  .v-list-item {
    &.vertical-nav-menu-link {
      ::v-deep .v-list-item__icon {
        .v-icon {
          transition: none !important;
        }
      }
    }
  }
}

// You can remove below style
// Upgrade Banner
.app-navigation-menu {
  .upgrade-banner {
    position: absolute;
    bottom: 13px;
    left: 50%;
    transform: translateX(-50%);
  }
}
</style>
