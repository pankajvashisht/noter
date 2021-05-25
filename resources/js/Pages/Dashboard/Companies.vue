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
                                <table class="min-w-full">
                                    <thead>
                                    <tr class="border-t border-gray-200">
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <span class="lg:pl-2">company</span>
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            --
                                        </th>
                                        <th class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            --
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                    <tr v-for="company in companies" :key="company.id">
                                        <td class="px-6 py-3 max-w-0 w-full whitespace-nowrap text-sm font-medium text-gray-900">
                                            <div class="flex items-center space-x-3 lg:pl-2">
                                                <div :class="['flex-shrink-0 w-2.5 h-2.5 rounded-full']" aria-hidden="true" />
                                                <a href="#" class="truncate hover:text-gray-600">
                                                <span>
                                                  {{ company.name }}
                                                </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3 text-sm text-gray-500 font-medium">
                                            --
                                        </td>
                                        <td class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-right">
                                            {{ company.id }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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
