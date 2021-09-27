<template>
    <app-layout title="Modification du produit">
        <template #content>
            <form enctype="multipart/form-data" class="bg-white shadow-2xl rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
                <div class="mb-5">
                    <label for="name" class="block text-sm text-gray-700 font-bold mb-2">Nom Du Product</label>
                    <input
                        id="name"
                        type="text"
                        class="border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="productData.name"
                    />
                    <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.name }}</div>
                </div>

                <div class="mb-5">
                    <label for="description" class="block text-sm text-gray-700 font-bold mb-2">Description Du produit</label>
                    <input
                        id="description"
                        type="text"
                        class="border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="productData.description"
                    />
                    <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.description }}</div>
                </div>         

                <div class="mb-5">
                    <label for="price" class="block text-sm text-gray-700 font-bold mb-2">Prix Du produit</label>
                    <input
                        id="price"
                        type="number"
                        class="border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="productData.price"
                    />
                    <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.price }}</div>
                </div>

                <button type="submit" class="block rounded bg-green-500 py-2 px-3 text-white"> Enregistrer les Modifications </button>
            
            </form>
        </template>
    </app-layout>
</template>

<script>
    import AppLayout from "../../Layouts/AppLayout";
    import {Inertia} from "@inertiajs/inertia";
    export default {
        components: {
            AppLayout
        },

        props: ['product'],

        data() {
            return {
                productData: this.product,
            }
        },

        methods: {
            submit() {
                Inertia.patch('/product/update/' + this.productData.id,this.productData)
            },
        },
    }

</script>
