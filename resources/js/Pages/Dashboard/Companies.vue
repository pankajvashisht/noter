<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Companies
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="hidden mt-8 sm:block">
                            <div class="align-middle inline-block min-w-full border-b border-gray-200">
                                <ul class="space-y-3">
                                    <li v-for="company in companies" :key="company.id" class="bg-white shadow overflow-hidden px-4 py-4 sm:px-6 sm:rounded-md">
                                        <span>{{ company.name }}</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
import {ref} from "vue";

export default {
    components: {
        BreezeAuthenticatedLayout,
    },

    props: {
        auth: Object,
        errors: Object,
        companies: Object,
    },
    setup() {
        const sidebarOpen = ref(false)

        return {
            sidebarOpen,
        }
    },
}
</script>
