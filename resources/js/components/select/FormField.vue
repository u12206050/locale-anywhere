<template>
  <default-field :field="field" :errors="errors">
    <template slot="field">
      <dropdown class="ml-5 h-9 flex items-center dropdown-right">
        <dropdown-trigger class="h-9 flex items-center">
          <span><span class="flag-icon ml-2" :style="flag(value)"></span> {{ field.locales[value] }}</span>
        </dropdown-trigger>

        <dropdown-menu slot="menu" width="180" placement="center">
          <ul class="list-reset overflow-y-scroll" style="max-height: 50vh; min-height: 200px">
            <li v-for="(language, locale) in field.locales" :key="locale" :data="locale">
              <a @click.prevent="value = locale" class="block no-underline text-90 hover:bg-30 p-3 cursor-pointer">
                <span class="flag-icon mr-2" :style="flag(locale)"></span>
                {{ language }}
              </a>
            </li>
          </ul>
        </dropdown-menu>
      </dropdown>
    </template>
  </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from "laravel-nova";

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ["resourceName", "resourceId", "field"],

  methods: {
    /*
    * Set the initial, internal value for the field.
    */
    setInitialValue() {
      this.value = this.field.value || this.field.locale;
    },

    /**
      * Fill the given FormData object with the field's internal value.
      */
    fill(formData) {
      formData.append(this.field.attribute, this.value || "");
    }
  },
};
</script>
