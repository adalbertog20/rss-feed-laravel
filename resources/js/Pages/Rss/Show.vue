<script setup>
import News from "@/Components/News.vue";
const props = defineProps({
    result: Object,
});
console.log(props.result.items);
</script>
<template>
    <News
        v-for="r in props.result.items"
        :key="r.id"
        :title="r.title"
        :link="r.link"
    />
</template>
