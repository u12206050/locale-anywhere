<template>
  <panel-item :field="field">
      <template slot="value" v-if="field.value">
        <span>
          <span class="flag-icon mr-2" :style="flag(field.value)"></span>
          {{ field.locales[field.value] }}
        </span>
      </template>
  </panel-item>
</template>

<script>
export default {
  props: ['resourceName', 'field'],
}
</script>
