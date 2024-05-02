<script setup>
import AppLayout from "@/Layouts/Admin/AppLayout.vue";
import ReservationsList from "@/Components/Admin/ReservationsList.vue";

defineProps({
  title: String,
});
</script>

<template>
  <AppLayout title="Reservations">

    <div class="py-5">
      <div class="mx-auto sm:px-2">
        <ReservationsList />
      </div>
    </div>
  </AppLayout>
</template>
