<script setup>
import { Link } from '@inertiajs/vue3'
const props = defineProps({
    info: Object,
});
const uri = '/rss/';
</script>
<template>
    <div class="">
        <ul>
            <li v-for="r in props.info" :key="r.id">
                <a :href="String(uri.concat(r.id))" :data="r.id">{{ r.title }}</a>
            </li>
        </ul>
    </div>
</template>
