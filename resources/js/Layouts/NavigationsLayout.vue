<script lang="ts" setup>
import {ref, h, computed, onMounted, onBeforeUnmount} from 'vue'

const content = ref()
const mainDiv = h('div', {class: 'relative'}, 'Hello World')
const navigationItems = ref([
    {name: 'Home', href: '/', isActive: true},
    {name: 'About', href: '/about', isActive: false},
    {name: 'Contact', href: '/contact', isActive: false},
])
const navItemClass = (id: number, isActive: boolean) => {
    let baseClass = 'relative block py-3 hover:bg-white/5 hover:text-orange-500 focus:'
    if (id === 0) {
        baseClass += ' pl-6 pr-3'
    } else if (id === navigationItems.value.length - 1) {
        baseClass += ' pl-3 pr-6'
    } else {
        baseClass += ' px-3'
    }
    if (isActive) {
        baseClass += ' text-orange-600'
    } else {
        baseClass += ''
    }
    return baseClass
}

const showNav = computed(() => {
    return yPos.value < 400
})

const yPos = ref(0)
const scale = ref(5)

function scrollCalc() {
    yPos.value = window.scrollY
    if (window.scrollY < 100) {
        scale.value = 5
    } else if (window.scrollY >= 100 && window.scrollY < 400) {
        scale.value = -0.01 * window.scrollY + 6
    } else if (window.scrollY >= 400) {
        scale.value = 1
    }
}



const enlarge = computed(() => {
    {
        return {
            transform: `scale(${scale.value})`,
        }
    }
})


onMounted(() => {
    window.addEventListener('scroll', scrollCalc)
})

onBeforeUnmount(() => {
    window.removeEventListener('scroll', scrollCalc)
})
</script>

<template>
    <!--    Make a navigation menu-->

    <header>
        <div class="fixed inset-0 flex justify-center sm:px-8">
            <div class="flex w-full max-w-7xl lg:px-8">
                <div class="w-full bg-stone-900 ring-2 ring-orange-600/50 "></div>
            </div>
        </div>
        <Transition
            v-show="showNav"
            enter-active-class="animate__animated animate__fadeInDown"
            leave-active-class="animate__animated animate__fadeOutUp"
        >
            <div class="fixed w-full">
                <div class="sm:px-8 top-0 order-last -mb-3 pt-3">
                    <div class="mx-auto max-w-7xl lg:px-8">
                        <div class="relative px-4 sm:px-8 lg:px-12">
                            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                                <div class="w-full">
                                    <div class="relative">
                                        <div :style="enlarge" class="origin-top-left absolute left-0 top-4 origin-left transition-opacity h-10 w-10 rounded-full p-0.5 shadow-sm shadow-stone-800/5 ring-1 backdrop-blur bg-zinc-800/90 ring-white/10">
                                            {{ yPos/100 }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-0 z-10 h-16 pt-6" style="">
                    <div class="sm:px-8">
                        <div class="mx-auto max-w-7xl lg:px-8">
                            <div class="relative px-4 sm:px-8 lg:px-12">
                                <div class="mx-auto max-w-2xl lg:max-w-5xl">
                                    <div class="relative flex justify-center gap-4">
                                        <div class="flex flex-1"></div>
                                        <div class="flex flex-1 justify-end md:justify-center">
                                            <!-- Mobile Button -->
                                            <div class="md:hidden"></div>
                                            <!-- Navigation Bar -->
                                            <nav class="hidden md:block">
                                                <ul class="flex rounded-full font-medium backdrop-blur overflow-hidden shadow-lg shadow-stone-800/5 ring-2 ring-inset bg-stone-800/90 text-stone-200 ring-black/40 hover:ring-orange-900/10">
                                                    <template v-for="(item, id) in navigationItems">
                                                        <li>
                                                            <a :class="navItemClass(id,item.isActive)"
                                                               :href="item.href">
                                                                {{ item.name }}
                                                                <template v-if="item.isActive">
                                                                <span
                                                                    class="absolute inset-x-1 bottom-px h-[1.2px] bg-orange-400"></span>
                                                                </template>
                                                            </a>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </nav>
                                        </div>
                                        <div class="flex md:flex-1">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </header>
    <div class="w-full" style="height: 2000px"></div>
</template>
