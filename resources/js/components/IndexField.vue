<template>
    <span class="flex flex-wrap">
      <span v-for="l in field.value.locale" :key="l" class="flag-icon m-1" :style="flag(l)"></span>
    </span>
</template>

<script>
import Flag from '../flag.js'
export default {
  props: ['resourceName', 'field'],
  methods: {
    flag: Flag
  }
}
</script>
