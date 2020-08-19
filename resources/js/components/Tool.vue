<template>
    <div>
        <heading class="mb-6">Current Locale</heading>

        <card class="bg-90 flex flex-col items-center justify-center" style="min-height: 300px">
            <h1><span class="flag-icon" :style="flag"></span></h1>
        </card>
    </div>
</template>

<script>
import Flag from '../flag.js'
export default {
    computed: {
        flag() {
            return Flag(Nova.config.locale)
        }
    },
}
</script>

<style>
/* Scoped Styles */
</style>
