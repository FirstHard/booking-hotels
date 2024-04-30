<script setup>
import AppLayout from "@/Layouts/Admin/AppLayout.vue";
import RoomsList from "@/Components/Admin/RoomsList.vue";

defineProps({
  title: String,
});
</script>

<template>
  <AppLayout title="Rooms">
    <template #header>
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $page.props.title }}
      </h1>
    </template>

    <div class="py-5">
      <div class="mx-auto sm:px-2">
        <RoomsList />
      </div>
    </div>
  </AppLayout>
</template>
