<script setup>
import AppLayout from "@/Layouts/Admin/AppLayout.vue";
import Main from "@/Components/Admin/Main.vue";
import Navbar from "@/Components/Admin/Navbar.vue";

defineProps({
  title: String,
  user: Object,
});
</script>

<template>
  <AppLayout title="Admin Dashboard">

    <div class="py-5">
      <div class="mx-auto sm:px-2">
        <Main />
      </div>
    </div>
  </AppLayout>
</template>
