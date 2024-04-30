<script setup>
import AppLayout from "@/Layouts/Admin/AppLayout.vue";
import HotelsList from "@/Components/Admin/HotelsList.vue";

defineProps({
  title: String,
});
</script>

<template>
  <AppLayout title="Hotels">
    <template #header>
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $page.props.title }}
      </h1>
    </template>

    <div class="py-5">
      <div class="mx-auto sm:px-2">
        <HotelsList />
      </div>
    </div>
  </AppLayout>
</template>
