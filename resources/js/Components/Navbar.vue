<template>
    <div class="bg-gray-900 text-gray-100 py-3.5 px-6 shadow md:flex justify-between items-center">
        <div class="flex items-center">
            <span class="text-green-500 text-xl mr-1">
                <i class="bi bi-messenger"></i>
            </span>

            <h1 class="text-xl">RandomApp</h1>
        </div>

        <span @click="MenuOpen()" class="absolute md:hidden right-6 top-1.5 cursor-pointer text-4xl">
            <i :class="[open ? 'bi bi-x' : 'bi bi-filter-left']"></i>
        </span>

        <ul
            class="md:flex md:items-center md:px-0 px-6 md:pb-0 pb-10 md:static absolute bg-gray-900 md:w-auto w-full top-14 duration ease-in"
            :class="[open ? 'left-0' : 'left-[-100%]']"
        >
            <li class="md:mx-4 md:my-0 my-6" v-for="link in links">
                <a :href="link.link" class="text-xl hover:text-green-500">{{ link.name }}</a>
            </li>

            <a href="/login" v-if="!$page.props.auth.user">
                <PrimaryButton >Get Started</PrimaryButton>
            </a>

            <a v-else>
                <div class="ms-3 relative">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                        </template>

                        <template #content>
                            <DropdownLink :href="route('profile.edit')"> Your profile </DropdownLink>
                            <DropdownLink :href="route('cart.show')">Cart</DropdownLink>
                            <br />
                            <h2 class="block w-full px-4 py-2 text-start text-md leading-5 text-gray-700 focus:outline-none focus:bg-gray-100 underline transition duration-150 ease-in-out">For Admins</h2>
                            <DropdownLink v-if="$page.props.auth.user" href="/panel">Panel</DropdownLink>
                        </template>
                    </Dropdown>
                </div>
            </a>


        </ul>
    </div>
</template>

<script setup>
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import {ref} from "vue";
    import Dropdown from "@/Components/Dropdown.vue";
    import DropdownLink from "@/Components/DropdownLink.vue";
    import {Link} from "@inertiajs/vue3";

    const open = ref(false);
    const links = [
        {name: "Home", link: "/"},
        {name: "Products", link: "/products"},
        {name: "Dakde", link: "/"}
    ]

    function MenuOpen() {
        open.value = !open.value
    }
</script>

