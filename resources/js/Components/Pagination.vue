<script setup>
const props = defineProps({
    data: Object,
});
</script>
<template>
    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 mt-5">
        <div class=" flex-1 flex justify-between sm:hidden">
            <a :href="data.prev_page_url" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
            <a :href="data.next_page_url" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between mt-3">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    {{ ' ' }}
                    <span class="font-medium">{{ data.from }}</span>
                    {{ ' ' }}
                    to
                    {{ ' ' }}
                    <span class="font-medium">{{ data.to }}</span>
                    {{ ' ' }}
                    of
                    {{ ' ' }}
                    <span class="font-medium">{{ data.total }}</span>
                    {{ ' ' }}
                    results
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a :href="data.prev_page_url" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" height="20" width="20"><!-- Font Awesome Pro 6.0.0-alpha2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M243.658 43.114C227.69 27.834 202.362 28.365 187.096 44.364L11.098 228.356C-3.699 243.824 -3.699 268.198 11.098 283.666L187.096 467.657C194.955 475.875 205.471 480 216.002 480C225.94 480 235.908 476.313 243.658 468.907C259.611 453.626 260.174 428.315 244.908 412.347L95.363 256.011L244.908 99.674C260.174 83.706 259.611 58.395 243.658 43.114Z"/></svg>
                        <span class="sr-only">Previous</span>
                    </a>
                    <template v-if="data.last_page > 5">
                        <a href="/posts?page=1" :class="1 === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                        <span v-if="data.current_page > 3" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700"> ... </span>
                        <template v-if="data.current_page <= 3">
                            <a href="/posts?page=2" :class="2 === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                            <a href="/posts?page=3" :class="3 === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                            <a href="/posts?page=4" :class="4 === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">4</a>
                        </template>
                        <template v-else-if="data.current_page > (data.last_page - 3)" :class="(data.last_page - 3) === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            <a :href="'/posts?page='+(data.last_page-3)" :class="(data.last_page - 3) === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{ data.last_page-3 }}</a>
                            <a :href="'/posts?page='+(data.last_page-2)" :class="(data.last_page - 2) === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{ data.last_page-2 }}</a>
                            <a :href="'/posts?page='+(data.last_page-1)" :class="(data.last_page - 1) === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{ data.last_page-1 }}</a>
                        </template>
                        <template v-else>
                            <a :href="'/posts?page='+(data.current_page-1)" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{ data.current_page-1 }}</a>
                            <a :href="'/posts?page='+data.current_page" class="bg-indigo-50 border-indigo-500 text-indigo-600 z-10 relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{ data.current_page }}</a>
                            <a :href="'/posts?page='+(data.current_page+1)" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{ data.current_page+1 }}</a>
                        </template>
                        <span v-if="data.current_page <= (data.last_page - 3)" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700"> ... </span>
                        <a :href="'/posts?page='+data.last_page" :class="data.last_page === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{ data.last_page }}</a>
                    </template>
                    <template v-else>
                        <a href="/posts?page=1" :class="1 === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                        <a v-if="data.last_page >= 2" href="/posts?page=2" :class="2 === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                        <a v-if="data.last_page >= 3" href="/posts?page=3" :class="3 === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                        <a v-if="data.last_page >= 4" href="/posts?page=4" :class="4 === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">4</a>
                        <a v-if="data.last_page >= 5" href="/posts?page=5" :class="5 === data.current_page ? 'bg-indigo-50 border-indigo-500 text-indigo-600 z-10 ' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">5</a>
                    </template>
                    <a :href="data.next_page_url" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" height="20" width="20" ><path d="M308.902 228.343L132.904 44.342C117.638 28.373 92.295 27.842 76.342 43.092C60.389 58.373 59.826 83.686 75.092 99.654L224.637 255.999L75.092 412.343C59.826 428.312 60.389 453.625 76.342 468.906C84.092 476.312 94.045 480 103.998 480C114.529 480 125.045 475.875 132.904 467.656L308.902 283.655C323.699 268.186 323.699 243.811 308.902 228.343Z"/></svg>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</template>
