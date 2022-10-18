<script setup>
import { ref } from 'vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import moment from 'moment'
const props = defineProps({
    articles: Object,
})
</script>

<template>
    <Head title="Articles" />

    <DashboardLayout>
        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <h2 class="text-xl leading-6 font-bold text-gray-900">View Articles</h2>
            </div>
            <div class="ml-4 mt-2 flex-shrink-0">
                <a :href="route('articles.create')" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Article</a>
            </div>
        </div>
        <ul role="list" class="divide-y divide-gray-200">
            <li v-for="article in articles" :key="article.id" class="py-4">
                <div class="flex">
                    <div class="mr-4 flex-shrink-0">
                        <svg class="h-32 w-32 border border-gray-300 bg-white text-gray-300" preserveAspectRatio="none" stroke="currentColor" fill="none" viewBox="0 0 200 200" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-width="1" d="M0 0l200 200M0 200L200 0" />
                        </svg>
                    </div>
                    <div class="grow">
                        <h4 class="text-lg font-bold">{{ article.title }}</h4>
                        <span class="text-sm text-gray-500">Created: {{ moment(article.created_at).format('YYYY/MM/DD hh:mm') }} - Modified: {{ moment(article.created_at).format('YYYY/MM/DD hh:mm') }}</span>
                        <p class="mt-1">{{ article.body.substring(0,75) + (article.body.length > 75 ? "..." : "") }}</p>
                        <span class="text-sm text-gray-500">By: {{ article.user.name }}</span>
                    </div>
                    <div class="flex-col">
<!--                        buttonA-->
                        <div><button type="button" class="mb-2 w-full relative items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button></div>
<!--                        buttonB-->
                        <div><button type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button></div>

                    </div>
                </div>
            </li>
        </ul>
    </DashboardLayout>
</template>
