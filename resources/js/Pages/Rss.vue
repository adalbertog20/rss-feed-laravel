<script setup>
import { Head } from "@inertiajs/vue3";
const props = defineProps({
    result: Object,
    info: Object,
});
console.log(props.result);
</script>
<template>
    <Head title="Rss" />
        <h1 class="bg-black">{{ props.info.title }}</h1>
        <button class="bg-blue-500 md:bg-green-500 ...">Subscribe</button>
    <div class="flex justify-center items-center h-screen">
        <ul>
            <li v-for="item in props.result.items" :key="item.title">
                <a :href="item.link">{{ item.title }}</a>
            </li>
        </ul>
    </div>
</template>
