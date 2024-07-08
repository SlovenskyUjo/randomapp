<script setup>
import { Head, Link } from '@inertiajs/vue3';
import CartItem from "@/Components/random/Hero.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

import Navbar from "@/Components/Navbar.vue";

</script>

<template>
    <Head title="Welcome" />
    <Navbar />
    <div class="bg-gray-200 py-20 px-4 text-center">
        <img src="/images/zachod1.jpg" alt="Toilet 1" class="mx-auto rounded-lg shadow-lg mb-4">
        <h1 class="text-4xl font-bold">Vitajte v našom e-shope so záchodmi!</h1>
        <p class="text-lg text-gray-700 mt-4">Preskúmajte našu širokú ponuku kvalitných záchodov a príslušenstva.</p>
    </div>
    <div class="container mx-auto py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="/images/zachod2.jpg" alt="Toilet 2" class="mx-auto rounded-lg shadow-lg mb-4">
                <h2 class="text-xl font-semibold mb-4">Moderné Záchody</h2>
                <p>Najnovšie modely s pokročilými funkciami pre maximálny komfort.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="/images/zachod3.jpg" alt="Toilet 3" class="mx-auto rounded-lg shadow-lg mb-4">
                <h2 class="text-xl font-semibold mb-4">Klasické Záchody</h2>
                <p>Tradičný dizajn a spoľahlivosť za dostupné ceny.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="/images/zachod4.jpg" alt="Toilet 4" class="mx-auto rounded-lg shadow-lg mb-4">
                <h2 class="text-xl font-semibold mb-4">Príslušenstvo</h2>
                <p>Všetko, čo potrebujete pre kompletnú inštaláciu a údržbu.</p>
            </div>
        </div>
    </div>
</template>

