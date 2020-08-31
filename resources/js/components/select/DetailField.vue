<template>
  <span>
    <span class="flag-icon mr-2" :style="flag(field.value)"></span>
    {{ field.locales[field.value] }}
  </span>
</template>

<script>
export default {
  props: ['resourceName', 'field'],
}
</script>
