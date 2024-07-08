<template>
    <div v-if="show" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl mb-4">{{ title }}</h2>
            <p>{{ message }}</p>
            <div class="mt-6 flex justify-end">
                <button @click="confirm" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Delete</button>
                <button @click="close" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        show: {
            type: Boolean,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        message: {
            type: String,
            required: true
        }
    },
    methods: {
        close() {
            this.$emit('close');
        },
        confirm() {
            this.$emit('confirm');
        }
    }
}
</script>

<style scoped>
/* Add some basic styling */
</style>
