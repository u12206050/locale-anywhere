<template>
  <span class="flag-icon" :style="flag(field.value)"></span>
</template>

<script>
export default {
  props: ['resourceName', 'field'],
}
</script>
