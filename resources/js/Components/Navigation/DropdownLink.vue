<script setup>
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps(['as']);
</script>

<template>
    <Link :as="as" :class="as === 'button' ? 'w-full text-left' : ''" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
        <slot />
    </Link>
</template>
