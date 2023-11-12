<script setup>
const props = defineProps({
    info: Object,
});
console.log(props.info);
</script>
<template>
    <div class="">
        <ul>
            <li v-for="r in props.info" :key="r.id">
                <span>{{ r.title }}</span>
            </li>
        </ul>
    </div>
</template>
