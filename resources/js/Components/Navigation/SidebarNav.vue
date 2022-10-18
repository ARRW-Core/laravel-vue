<template>
    <button @click="open = ! open">
        <ChevronLeftIcon class="h-5 w-5" :class="{'transform rotate-180': open, 'text-gray-400 group-hover:text-gray-500': ! open, 'text-gray-500': open}" />
    </button>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild as="template" enter="ease-in-out duration-500" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-500" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
                            <DialogPanel class="pointer-events-auto relative w-screen max-w-md">
                                <TransitionChild as="template" enter="ease-in-out duration-500" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-500" leave-from="opacity-100" leave-to="opacity-0">
                                    <div class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                                        <button type="button" class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white" @click="open = false">
                                            <span class="sr-only">Close panel</span>
                                            <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                                        </button>
                                    </div>
                                </TransitionChild>
                                <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                                    <div class="px-4 sm:px-6">
                                        <div class="flex items-center flex-shrink-0 px-4">
                                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="Workflow" />
                                        </div>
                                    </div>
                                    <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                        <!-- Replace with your content -->
                                        <div class="absolute inset-0 px-4 sm:px-6">
                                            <div class="h-full border-2 border-dashed border-gray-200" aria-hidden="true" >
                                                <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto">

                                                    <nav class="flex-1 px-2 bg-white space-y-1" aria-label="Sidebar">
                                                        <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                                                            <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
                                                            <span class="flex-1">
                                                                    {{ item.name }}
                                                                </span>
                                                            <span v-if="item.count" :class="[item.current ? 'bg-white' : 'bg-gray-100 group-hover:bg-gray-200', 'ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full']">
                                                                    {{ item.count }}
                                                                </span>
                                                        </a>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /End replace -->
                                    </div>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import {defineProps, ref,} from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XMarkIcon, ChevronLeftIcon, HomeIcon, UsersIcon, FolderIcon, CalendarIcon, DocumentIcon, ChartBarIcon } from '@heroicons/vue/24/outline'

const open = ref(false)

const navigation = ref([
    { name: 'Dashboard', href: '#', icon: 'HomeIcon', current: true },
    { name: 'Create Article', href: 'route()', icon: 'UsersIcon', count: 3, current: false },
    { name: 'Projects', href: '#', icon: 'FolderIcon', count: 4, current: false },
    { name: 'Calendar', href: '#', icon: 'CalendarIcon', current: false },
    { name: 'Documents', href: '#', icon: 'DocumentIcon', count: 12, current: false },
    { name: 'Reports', href: '#', icon: 'ChartBarIcon', current: false },
])
</script>