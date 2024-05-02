<script setup>
import { Head } from "@inertiajs/vue3";
import Banner from "@/Components/Banner.vue";
import SidebarMenu from "@/Components/Admin/SidebarMenu.vue";
import Navbar from "@/Components/Admin/Navbar.vue";

defineProps({
  title: String,
  user: Object,
});
</script>

<template>
  <Navbar>
    <template #header>
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $page.props.title }}
      </h1>
    </template>
  </Navbar>
  <div>
    <Head :title="title" />

    <Banner />

    <div class="bg-gray-100">
      <div class="flex flex-col lg:flex-row">
        <aside class="w-full lg:w-4/12 xl:w-3/12 2xl:w-2/12 bg-blue-200 p-3 md:py-4 md:px-4 lg:px-6">
          <h3>Actions</h3>
          <SidebarMenu />
        </aside>

        <!-- Page Content -->
        <main class="w-full lg:w-8/12 xl:w-9/12 2xl:w-10/12 p-3 md:py-4 md:px-4 lg:px-6">
          <slot />
        </main>
      </div>
    </div>
  </div>
</template>
