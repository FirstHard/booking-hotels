<script setup>
import AppLayout from "@/Layouts/Admin/AppLayout.vue";
import ClientsList from "@/Components/Admin/ClientsList.vue";

defineProps({
  title: String,
});
</script>

<template>
  <AppLayout title="Clients">

    <div class="py-5">
      <div class="mx-auto sm:px-2">
        <ClientsList />
      </div>
    </div>
  </AppLayout>
</template>
