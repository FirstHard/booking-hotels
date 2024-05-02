<script setup>
import AppLayout from "@/Layouts/Admin/AppLayout.vue";
import HotelAdd from "@/Components/Admin/HotelAdd.vue";

defineProps({
  title: String,
});
</script>

<template>
  <AppLayout title="Hotels">

    <div class="py-5">
      <div class="mx-auto sm:px-2">
        <HotelAdd />
      </div>
    </div>
  </AppLayout>
</template>
