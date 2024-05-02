<script setup>
import AppLayout from "@/Layouts/Admin/AppLayout.vue";
import HotelUpdate from "@/Components/Admin/HotelUpdate.vue";

defineProps({
  title: String,
});
</script>

<template>
  <AppLayout title="Hotel Edit">

    <div class="py-5">
      <div class="mx-auto sm:px-2">
        <HotelUpdate />
      </div>
    </div>
  </AppLayout>
</template>
