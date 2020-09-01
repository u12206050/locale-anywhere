<template>
  <div class="relative language-index" @click="toggle.show = !toggle.show">
    <div class="flower" :class="{'show-languages': toggle.show}">
      <span v-for="l in field.value.locale" :key="l" class="flag-icon m-1" :style="flag(l)"></span>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'

export default {
  props: ['resourceName', 'field'],
  data() {
    let toggle = { show: false }
    if (typeof window !== 'undefined') {
      toggle = window.LanguageIndexToggle = window.LanguageIndexToggle || Vue.observable(toggle)
    }
    return {
      toggle
    }
  }
}
</script>

<style lang="scss">
.language-index {
  width: 102px;
  >.flower {
    width: 100%;
    overflow-x: hidden;
    white-space: nowrap;
    border-radius: 4px;
    background: white;
    text-overflow: ellipsis;
    cursor: pointer;

    &:hover, &.show-languages {
      width: fit-content;
      position: absolute;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      transform: translateY(-50%);
    }
  }
}
</style>