<template>
    <app-layout title="Creation d\'nouveau produit">
        <template #content>
            <form class="bg-white shadow-2xl rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">

                <div class="mb-5">
                    <label for="name" class="block text-sm text-gray-700 font-bold mb-2">Nom Du Produit</label>
                    <input
                        id="name"
                        type="text"
                        placeholder="Entrez le nom du produits"
                        class="border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="form.name"
                    />
                    <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.name }}</div>
                </div>

                <div class="mb-5">
                    <label for="description" class="block text-sm text-gray-700 font-bold mb-2">Description Du Produit</label>
                    <input
                        id="decription"
                        type="text"
                        placeholder="Entrez la description du produit"
                        class="border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="form.description"
                    />
                    <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.description }}</div>
                </div>                

                <div class="mb-5">
                    <label for="price" class="block text-sm text-gray-700 font-bold mb-2">Prix du produit</label>
                    <input
                        id="price"
                        type="number"
                        required
                        class="border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="form.price"
                    />
                    <div v-if="$page.props.errors.price" class="text-red-500">{{ $page.props.errors.price }}</div>
                </div>
                <button type="submit" class="block rounded bg-green-500 py-2 px-3 text-white">Enregistrer</button>
            </form>
        </template>
    </app-layout>
</template>

<script>
    import AppLayout from "../../Layouts/AppLayout";
    export default {

        components: {
            AppLayout,
        },

        props: [],


        data() {
            return {
                form: {
                    name: '',
                    description: '',
                    price: '',
                }
            }
        },

        methods: {
            submit(){
                this.$inertia.post('/product/store',this.form)
            },
        },
    }
</script>
