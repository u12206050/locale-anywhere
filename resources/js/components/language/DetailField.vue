<template>
  <div>
    <panel-item :field="field">
      <div slot="value">
        <span v-for="l in field.value.locale" :key="l" class="flag-icon" :style="flag(l)"></span>
      </div>
    </panel-item>
    <div class="flex border-b border-40">
      <div class="w-1/4 py-4">
        <h4 class="font-normal text-80"><span class="flag-icon" :style="flag(field.locale)"></span> {{ localeName }}?</h4>
      </div>
      <div class="w-3/4 py-4">
        <span class="mr-1" >{{ field.value.isTranslated ? '🟢' : '🔴' }}</span>
        <span>{{ label }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["resource", "resourceName", "resourceId", "field"],
  computed: {
    localeName() {
      return this.field.locales[this.field.locale]
    },
    label() {
      return this.field.value.isTranslated == true
        ? this.__("Yes")
        : this.__("No");
    }
  }
};
</script>
