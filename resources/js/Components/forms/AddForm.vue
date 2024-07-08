<script setup xmlns="http://www.w3.org/1999/html">
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    name: '',
    price: '',
    description: '',
    quantity: '',
    image: '',
});

function submit() {
    form.post('/panel');
}
</script>

<template>
    <form @submit.prevent="submit">
        <div class="container m-3">
            <InputLabel for="name" value="Name" />
            <TextInput
                id="name"
                type="text"
                class="mt-1 block"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div class="container m-3">
            <InputLabel for="price" value="Price" />
            <TextInput
                id="price"
                type="text"
                class="mt-1 block"
                v-model="form.price"
                required
                autofocus
                autocomplete="price"
            />

            <InputError class="mt-2" :message="form.errors.price" />
        </div>

        <div class="container m-3">
            <InputLabel for="quantity" value="Quantity" />
            <TextInput
                id="quantity"
                type="text"
                class="mt-1 block"
                v-model="form.quantity"
                required
                autofocus
                autocomplete="quantity"
            />

            <InputError class="mt-2" :message="form.errors.quantity" />
        </div>

        <div class="container m-3">
            <InputLabel for="description" value="Description" />
            <textarea
                id="description"
                type="text"
                class="mt-1 block"
                rows="10"
                cols="40"
                v-model="form.description"
                required
                autofocus
                autocomplete="description"
            />

            <InputError class="mt-2" :message="form.errors.description" />
        </div>

        <div class="container m-3">
            <InputLabel for="image" value="Image" />
            <input
                type="file"
                id="image"
                name="image"
                @change="form.image = $event.target.files[0]"
                required
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            >

            <InputError class="mt-2" :message="form.errors.image" />
        </div>

        <PrimaryButton type="submit" class="ms-4 mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Add new product!
        </PrimaryButton>
    </form>



</template>
