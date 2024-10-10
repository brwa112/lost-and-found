
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

        </div>


        <div class="bg-[#F5F5F7] w-10/12">
            <header>
                <nav class="bg-white h-14 shadow-md flex justify-between items-center px-4">
                    <div class="rounded-full bg-red-500 size-10">

                    </div>
                </nav>
            </header>
            <slot/>
        </div>
    </div>
</template>
