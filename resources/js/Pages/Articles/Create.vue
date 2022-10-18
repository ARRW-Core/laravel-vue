<script setup>
import { ref, onMounted, reactive } from 'vue'
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Tagify from '@yaireo/tagify';
import { Head, usePage} from '@inertiajs/inertia-vue3';
import axios from 'axios'

const props = defineProps({
    categories: Object,
    tags: Object
})
const categoryRef = ref(null)
const tagRef = ref(null)

const form = reactive({
    title: '',
    body: '',
    categories: [],
    tags: [],
    images: ["cat","dog"],
})
const style = ref({'background-image': 'url(https://image.shutterstock.com/image-vector/no-image-available-icon-template-600w-1036735678.jpg)'})

onMounted(() => {
    console.log()
    // console.log(props.categories)
    new Tagify(categoryRef.value, {
        whitelist: props.categories,
        dropdown: {
            maxItems: 5,
            enabled: 0,             // <- show suggestions on focus
            closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
        }
    })

    new Tagify(tagRef.value, {
        whitelist: props.tags,
        dropdown: {
            maxItems: 5,
            enabled: 0,             // <- show suggestions on focus
            closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
        }
    })

    axios.post('/articles/add-media', form).then((response) => {
        console.log(response)
    })


    console.log(localStorage)
})
//send image data to store image, get response and add to hidden inputs and tags
</script>
<template>
    <Head title="Create Article" />
    <DashboardLayout>
        <form @submit.prevent="submit" method="POST" enctype="multipart/form-data">
            <div class="flex flex-col">
                <label for="title" class="text-2xl">Title</label>
                <input type="text" name="title" id="title" class="shadow-inner border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-400">
            </div>
            <div class="flex flex-col mt-4">
                <label for="body" class="text-2xl">Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="h-96 overflow-auto shadow-inner border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-400"></textarea>
            </div>
            <div class="flex flex-col mt-4">
                <label for="category" class="text-2xl">Categories</label>
                <input type="text" ref="categoryRef" name="category" id="category" class="shadow-inner border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-400">
            </div>
            <div class="flex flex-col mt-4">
                <label for="tags" class="text-2xl">Tags</label>
                <input type="text" ref="tagRef" name="tags" id="tags" class="shadow-inner border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-400">
            </div>
            <div class="flex flex-col mt-4">
                <label for="image" class="text-2xl">Image</label>
                <div class="flex md:flex-row flex-col">
                    <input type="file" name="image" id="image" class="grow border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-400 md:mr-2 md:mr-2">
                    <button type="button" class="bg-blue-400 text-white px-4 py-2 rounded font-medium md:mt-0 mt-2">Add Image</button>
                </div>
            </div>
            <div class="md:flex mt-4 border-2 border-gray-300 rounded-lg">
                <div class="h-56 md:h-auto md:w-56 flex-none bg-contain bg-no-repeat bg-center rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden border-r-2 border-gray-400" :style="style" title="">
                </div>
                <div class=" p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <p class="text-sm text-gray-600 flex items-center">
                            <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                            </svg>
                            Members only
                        </p>
                        <div class="text-gray-900 font-bold text-xl mb-2">Can coffee make you a better developer?</div>
                        <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-blue-400 text-white px-4 py-2 rounded font-medium">Submit</button>
            </div>
        </form>
    </DashboardLayout>
</template>
