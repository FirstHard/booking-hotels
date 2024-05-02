<script setup>
import AppLayout from "@/Layouts/Admin/AppLayout.vue";
import RoomsList from "@/Components/Admin/RoomsList.vue";

defineProps({
  title: String,
});
</script>

<template>
  <AppLayout title="Rooms">

    <div class="py-5">
      <div class="mx-auto sm:px-2">
        <RoomsList />
      </div>
    </div>
  </AppLayout>
</template>
