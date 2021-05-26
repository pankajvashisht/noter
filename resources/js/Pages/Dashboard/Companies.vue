<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Companies
            </h2>
            <div class="text-sm text-gray-600">
                [Having more than 1 opportunity]
            </div>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-400">
                        <div class="hidden mt-2 sm:block">
                            <div class="align-middle inline-block min-w-full border-b border-gray-200">
                                <ul class="space-y-3">
                                    <li
                                        v-for="company in companies"
                                        :key="company.id"
                                        class="bg-white shadow overflow-hidden px-4 py-4 sm:px-6 sm:rounded-md">

                                        <div class="font-semibold text-lg">{{ company.name }}</div>
                                        <div class="text-gray-600">ID : {{ company.id }}</div>

                                        <CompanyNumbers :company="company"></CompanyNumbers>
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
import CompanyNumbers from "@/Pages/Dashboard/CompanyNumbers";
import {ref} from "vue";

export default {
    components: {
        BreezeAuthenticatedLayout,
        CompanyNumbers
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
