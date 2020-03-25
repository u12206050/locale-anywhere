<template>
    <span class="flex">
      <span v-for="l in field.value.locale" :key="l">
        {{ l | flag }}
      </span>
    </span>
</template>

<script>
import Flag from '../flag.js'
export default {
  props: ['resourceName', 'field'],
  filters: {
    flag(l) {
      return Flag(l)
    }
  },
  mounted() {
    console.log(this.field)
  }
}
</script>
