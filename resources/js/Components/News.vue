<script setup>
const props = defineProps({
    title: String,
    link: String,
});
</script>
<template>
<div>
    <h1>{{ props.title }}</h1>
    <a :href="props.link">Read more</a>
</div>
</template>