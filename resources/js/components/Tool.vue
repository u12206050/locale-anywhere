<template>
    <div>
        <heading class="mb-6">Current Locale</heading>

        <card class="bg-90 flex flex-col items-center justify-center" style="min-height: 300px">
            <h1 style="font-size: 100px">{{ flag }}</h1>
        </card>
    </div>
</template>

<script>
import Locale2Flag from '../flag.js'
export default {
    computed: {
        flag() {
            return Locale2Flag(Nova.config.locale)
        }
    },
}
</script>

<style>
/* Scoped Styles */
</style>
