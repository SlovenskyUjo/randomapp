<script setup xmlns="http://www.w3.org/1999/html" lang="ts">
import { Head } from '@inertiajs/vue3';
import PanelLayout from "@/Layouts/PanelLayout.vue";
import AddForm from "@/Components/forms/AddForm.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps<{
    products: Array<any>
}>()

const deleteProduct = (id: number) => {
    Inertia.delete(route('panel.destroy', { products: id }), {
        onFinish: () => {
            console.log('Product deleted');
        },
        onError: (errors) => {
            console.error('Error deleting product:', errors);
        }
    });
}

</script>

<template>
    <Head title="Panel"/>
        <PanelLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Panel</h2>
            </template>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <article class="container p-10 w-full">
                            <h2 class="ms-4 font-bold text-lg">Add new product!</h2>
                                <AddForm />
                         </article>

                    </div>
                </div>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <article class="container p-10 w-full">
                            <h2 class="ms-4 font-bold text-lg">All available products</h2>
                            <p class="text-sm ms-4 text-gray-800">For better coordinating</p>

                            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                <div v-for="product in products" :key="product.id" class="group relative">
                                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                        <img :src="product.image" :alt="product.imageAlt" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                                    </div>
                                    <div class="mt-4 flex justify-between">
                                        <div>
                                            <h3 class="text-sm text-gray-700">
                                                <a>
                                                    <span aria-hidden="true" class="absolute inset-0" />
                                                    {{ product.name }}
                                                </a>
                                            </h3>
                                            <p class="text-sm text-gray-700">We have {{ product.quantity }} left!</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900">{{ product.price }} €</p>
                                    </div>
                                    <div class="flex-1 w-full items-center justify-between flex relative z-10">
                                        <PrimaryButton @click="deleteProduct(product.id)" class="mt-2 cursor-pointer w-full flex items-center justify-center">Delete</PrimaryButton>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
                </div>
            </div>



        </PanelLayout>
</template>

