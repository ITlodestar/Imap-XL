<template>
  <div id="error">
    <router-link :to="{ name: 'pages-login' }"> Back login page </router-link>
  </div>
</template>

<script>
import { mdiAlert } from '@mdi/js'

export default {
  setup() {
    return {
      icons: {
        mdiAlert,
      },
    }
  },
}
</script>

<style lang="scss">
@import '~@resources/sass/preset/misc.scss';
</style>
