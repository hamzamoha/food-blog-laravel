<template>
    <div class="flex h-screen bg-gray-200">
        <div class="flex flex-col flex-shrink-0 w-64 bg-white">
            <div class="flex items-center justify-center h-14 bg-gray-800 text-white">
                <span class="text-lg font-semibold">Admin Panel</span>
            </div>
            <Sidebar />
        </div>
        <div class="flex flex-col flex-grow bg-gray-100">
            <div>
                <nav class="bg-gray-800 flex">
                    <ul class="ml-auto mr-5">
                        <li><a class="text-white block py-4 px-4" href="/">Logout</a></li>
                    </ul>
                </nav>
            </div>
            <div class="p-5">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from './Sidebar.vue';

export default {
    name: "Admin",
    components: { Sidebar },
}
</script>