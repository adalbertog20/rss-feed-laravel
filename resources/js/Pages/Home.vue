<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import ListOfRss from "@/Components/ListOfRss.vue";

const props = defineProps({
    id: Number,
    rss: Object,
});

const form = reactive({
    title: null,
    link: null,
    user_id: props.id,
});
function submit() {
    router.post("/rss", form);
}
</script>
<template>
    <div class="sidebar-menu">
        <ListOfRss :info="props.rss" />
    </div>
    <div class="flex justify-center items-center h-screen">
        <div class="card-text h-full">
            <form class="space-y-4" id="addRss" @submit.prevent="submit">
                <div class="input-area">
                    <label for="name" class="form-label">Rss Title</label>
                    <div class="relative">
                        <input
                            id="name"
                            type="text"
                            v-model="form.title"
                            class="form-control pr-9"
                            placeholder="Rss Title"
                        />
                    </div>
                    <span
                        id="nameErrorMsg"
                        class="font-Inter text-sm text-danger-500 pt-2 hidden mt-1"
                        >This is valid state.</span
                    >
                </div>
                <div class="input-area">
                    <label for="link" class="form-label">Link</label>
                    <div class="relative">
                        <input
                            id="link"
                            type="text"
                            v-model="form.link"
                            class="form-control"
                            placeholder="Enter Your Link"
                        />
                        <input
                            id="link"
                            type="hidden"
                            :value="props.id"
                            class="form-control"
                            placeholder="Enter Your Link"
                        />
                    </div>
                    <span
                        id="emailErrorMsg"
                        class="font-Inter text-sm text-danger-500 pt-2 hidden mt-1"
                    ></span>
                </div>
                <button
                    type="submit"
                    class="btn flex justify-center btn-dark ml-auto"
                >
                    Add
                </button>
            </form>
        </div>
    </div>
</template>
