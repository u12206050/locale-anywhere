<template>
	<div>
		<panel-item :field="field">
			<div slot="value">
				<span v-for="l in field.value.locale" :key="l">
					{{ l | flag }}
				</span>
			</div>
		</panel-item>
		<div class="flex border-b border-40">
			<div class="w-1/4 py-4">
				<h4 class="font-normal text-80">{{ field.locale | flag }} {{ currentLocaleName }}?</h4>
			</div>
			<div class="w-3/4 py-4">
				<span class="mr-1" >{{ field.value.isTranslated ? '🟢' : '🔴' }}</span>
				<span>{{ label }}</span>
			</div>
		</div>
	</div>
</template>
<script>

import Flag from '../flag.js'
export default {
	props: ["resource", "resourceName", "resourceId", "field"],
	computed: {
		currentLocaleName() {
			let name = null;

			Object.keys(this.field.locales).forEach(locale => {
				if (locale === this.field.locale) {
					name = this.field.locales[locale];
				}
			});

			return name;
		},
		label() {
			return this.field.value.isTranslated == true
				? this.__("Yes")
				: this.__("No");
		}
	},
  filters: {
    flag(l) {
      return Flag(l)
    }
  }
};
</script>
