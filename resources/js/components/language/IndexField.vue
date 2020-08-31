<template>
  <span class="flex flex-wrap">
    <span v-for="l in field.value.locale" :key="l" class="flag-icon m-1" :style="flag(l)"></span>
  </span>
</template>

<script>
export default {
  props: ['resourceName', 'field'],
}
</script>
