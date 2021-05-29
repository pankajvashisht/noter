<template>
    <div>
        <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 text-white font-semibold rounded-l-md bg-green-500 font-bold">
                    {{ company.opps }}
                </div>
                <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <span class="text-gray-900 font-medium hover:text-gray-600">Opportunities</span>
                        <p class="text-gray-500">Latest: {{ company.latest_opp_date }} </p>
                    </div>
                </div>
            </li>
            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 text-white font-semibold rounded-l-md bg-blue-500 font-bold">
                    {{ company.history_count }}
                </div>
                <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <span class="text-gray-900 font-medium hover:text-gray-600">Opportunity Histories</span>
                        <p class="text-gray-500">Latest: {{ company.latest_history_date }} </p>
                    </div>
                </div>
            </li>
            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 text-white font-semibold rounded-l-md bg-pink-600 font-bold">
                    {{ company.personas }}
                </div>
                <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <span class="text-gray-900 font-medium hover:text-gray-600">Personas</span>
                        <p class="text-gray-500">-</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
/**
 * @property {number} company.opps
 * @property {number} company.history_count
 * @property {number} company.personas
 * @property {Date} latest_opp_date
 * @property {Date} latest_history_date
 */

export default {
    props: {
        company: Object
    },
}
</script>
