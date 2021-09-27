<template>
    <div v-if="links.length > 3">
        <div class="flex pt-5 justify-end">
            <template v-for="(link, key) in links" :key="key">
                <div
                v-if="link.url === null"
                v-html="link.label"
                />
                <Link
                    v-else
                    class="px-2"
                    :class="{ 'text-blue-800' : link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
    export default {
        props: {
            links: Array,
        },
        components: {
            Link,
        },
    }
</script>
