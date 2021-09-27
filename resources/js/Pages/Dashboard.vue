<template>
    <app-layout title="Dashboard">
        <template #content>
            <div class="grid grid-cols-1 gap-5 p-4 mt-16 lg:grid-cols-2 xl:grid-cols-4">
                <div class="rounded overflow-hidden border bg-white mx-3 md:mx-0 lg:mx-0" v-for="product in this.ProductsList.data" v-bind:key="product.id" >
                        <img class="w-full bg-cover" title="Voir Les Details" src="https://3.bp.blogspot.com/-Chu20FDi9Ek/WoOD-ehQ29I/AAAAAAAAK7U/mc4CAiTYOY8VzOFzBKdR52aLRiyjqu0MwCLcBGAs/s1600/DSC04596%2B%25282%2529.JPG">     
                    <div class="px-3 pb-2">
                        <div class="pt-1">
                            <div class="mb-2 text-sm">
                                <span class="uppercase font-bold mr-2"> {{ product.name }}</span>
                            </div>
                            <div class="space-x-2 mb-2 text-sm flex">
                                <h3>Prix Du Produits: </h3><span class="capitalize font-bold mr-2"> {{ product.price }} XAF</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
        },

        props: ['products'],

        data() {
            return {
                ProductsList: this.products,
            }
        },
    })
</script>
