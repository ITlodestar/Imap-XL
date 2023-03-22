<template>
  <div id="error">
    404
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
