<template>
    <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>

            <input
            id="search"
            name="search"
            type="text"
            :value="search"
            @input="$emit('update:search',$event.target.value)"
            class="ml-2 px-2 py-1 text-sm rounded border shadow-sm sm:text-sm"
            placeholder="search bridge africa"
        />
    </div>
</template>

<script>
    export default {
        props: {
            search: {
                type: String,
                default: ''
            }
        },
        emits: ['update:search'],
    }
</script>
