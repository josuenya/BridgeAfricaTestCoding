<template>
    <app-layout title="Produits">
        <template #content>
            <div class="lg:flex justify-between items-center mb-5">
                <div class="flex">
                    
                    <jet-responsive-nav-link :href="route('product.create')"
                                             class="text-black text-center w-30 rounded bg-blue-500"
                                             
                    >
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg> Ajouter
                        </div>
                    </jet-responsive-nav-link>
                </div>
            </div>
<!--            :class="{'bg-gray-300': index%2 === 0}"-->
            <div class="bg-white rounded-md shadow-lg overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead>
                    <tr class="bg-blue-500 text-white uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nom du Produits</th>
                        <th class="py-3 px-6 text-left">Description</th>
                        <th class="py-3 px-6 text-left">Prix</th>
                        <th class="py-3 px-6 text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    <tr class="uppercase border-b border-gray-200 hover:bg-gray-100 font-bold" v-for="product in this.productsList.data" v-bind:key="product.id">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ product.name }}</td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ product.description }}</td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ product.price }}</td>

                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">

                                <div class="w-4 mr-2 transform text-green-500 hover:scale-110">
                                    <Link :href="'product/edit/'+ product.id" >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </Link>
                                </div>
                                <div class="w-4 mr-2 transform text-red-500 hover:scale-110">
                                    <Link href="" @click="deleteRow(product)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-6 w-6" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </Link>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <my-pagination :links="products.links"/>
        </template>
    </app-layout>
</template>

<script>
    import AppLayout from "../../Layouts/AppLayout";
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import myPagination from '@/Components/myPagination.vue'

    export default {
        components:{
            AppLayout,
            JetResponsiveNavLink,
            myPagination,
            Link,
        },

        props: ['products'],

        data() {
            return {
                productsList: this.products,
            }
        },

        methods: {
            deleteRow: function(productsList){
                if (!confirm('Voulez-vous vraiment supprimer ce produit?')) return;
                this.$inertia.get('/product/delete/' + productsList.id) 
            },
        },

        mounted() {

        }
    }
</script>
