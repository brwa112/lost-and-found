
<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';


</script>


<template>
    <div class="flex min-h-screen">
        <div class="basis-2/12 bg-gray-950 ">
            <header class="h-14 flex items-center justify-center text-2xl border-b text-white">
                <h1>لۆگۆ</h1>
            </header>
            <div class=" mt-10 text-lg px-6 space-y-6">
                <Link :href="route('home')" class="flex items-center gap-x-4 " :class="$page.component == 'Welcome' ? 'text-blue-500' : 'text-white'">
                    <i class="fa-solid fa-house"></i>
                    پەڕەی سەرەکی
                </Link>
                <Link :href="route('admindashboard')" class="flex items-center gap-x-4 " :class="$page.component == 'Admin/AdminDashboard' ? 'text-blue-500' : 'text-white'">
                    <i class="fa-regular fa-grid-horizontal"></i>
                     داشبۆرد
                </Link>
                <Link :href="route('category.index')" class="flex items-center gap-x-4 " :class="($page.component == 'Admin/Category/index' || $page.component == 'Admin/Category/edit') ? 'text-blue-500' : 'text-white'"
                >
                    <i class="fa-solid fa-layer-group"></i>
                     جۆرەکان
                </Link>
                <Link :href="route('city.index')" class="flex items-center gap-x-4 " :class="($page.component == 'Admin/City/index' || $page.component == 'Admin/City/edit') ? 'text-blue-500' : 'text-white'"
                >
                <i class="fa-sharp fa-solid fa-city"></i>
                     شارەکان
                </Link>
                <Link :href="route('location.index')" class="flex items-center gap-x-4 " :class="($page.component == 'Admin/Location/index' || $page.component == 'Admin/Location/edit') ? 'text-blue-500' : 'text-white'"
                >
                <i class="fa-regular fa-location-dot"></i>
                     شوێنەکان
                </Link>
            </div>
        </div>


        <div class="bg-[#F5F5F7] w-10/12">
            <header>
                <nav class="bg-white h-14 shadow-md flex justify-between items-center px-4">
                    <div>
                        <input type="text" name="" id="" placeholder="گەڕان . . . " class="rounded-md outline-none">
                    </div>
                    <div class="rounded-full bg-red-500 size-10">
                    </div>

                </nav>
            </header>
            <div class=" m-10">
                <slot/>
            </div>
        </div>
    </div>
</template>
