<script setup></script>

<template>
  <div v-if="$page.props.pageDescription" class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
    <p>{{ $page.props.pageDescription }}</p>
  </div>
</template>

<style scoped></style>
