<script setup>
import {ref} from "vue";
import { usePage } from '@inertiajs/inertia-vue3'
import ApplicationLogo from "@/Components/ApplicationDefaults/ApplicationLogo.vue";
import NavLink from "@/Components/Navigation/NavLink.vue";
import ResponsiveNavLink from "@/Components/Navigation/ResponsiveNavLink.vue";
import Dropdown from "@/Components/Navigation/Dropdown.vue";
import DropdownLink from "@/Components/Navigation/DropdownLink.vue";
const showingNavigationDropdown = ref(false);
console.log(usePage().props.value)
// console.log()
</script>

<template>
    <nav class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a :href="route('dashboard')">
                            <ApplicationLogo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <template v-if="$page.props.auth.user">
                            <NavLink  :href="route('dashboard')" :active="route().current('dashboard')"> Dashboard</NavLink>
                        </template>
                        <NavLink  :href="route('articles.index')" :active="route().current('articles.index')"> Articles</NavLink>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <template v-if="$page.props.auth.user">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ $page.props.auth.user.name }}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink>
                                    Profile
                                </DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </template>
                    <template v-else>
                        <NavLink :href="route('login')">Log In</NavLink>
                        <NavLink :href="route('register')">Register</NavLink>
                    </template>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <a @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <template v-if="$page.props.auth.user">
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Dashboard
                    </ResponsiveNavLink>
                </template>
                <ResponsiveNavLink :href="route('articles.index')" :active="route().current('articles.index')">
                    Articles
                </ResponsiveNavLink>
            </div>

            <!-- Responsive Settings Options -->
            <template v-if="$page.props.auth.user">
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4 mb-3">
                        <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                    </div>
                </div>
            </template>
            <div class="pt-4 pb-1 border-t border-gray-200">
                <template v-if="$page.props.auth.user">
                    <ResponsiveNavLink>
                        Profile
                    </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                        Log Out
                    </ResponsiveNavLink>
                </template>
                <template v-else>
                    <ResponsiveNavLink :href="route('login')">Log In</ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('register')">Register</ResponsiveNavLink>
                </template>
            </div>
        </div>
    </nav>
</template>
