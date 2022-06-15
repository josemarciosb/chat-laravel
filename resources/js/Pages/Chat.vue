<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chat
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex" style="min-height: 400px;">

                    <!-- users -->
                    <div class="w-3/12 bg-gray-25 bg-opacity-25 border-r border-gray-200">
                        <ul>
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200 hover:bg-gray-300 hover:bg-opacity-50 hover:cursor-pointer">
                                <p>Teste User 1</p>
                            </li>
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200 hover:bg-gray-300 hover:bg-opacity-50 hover:cursor-pointer">
                                <p>Teste User 2</p>
                            </li>
                        </ul>
                    </div>

                    <!-- box messages -->
                    <div class="w-9/12">

                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
