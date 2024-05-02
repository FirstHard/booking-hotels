<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
  <div v-if="$page.props.success" class="bg-green-200 text-green-800 p-2 mb-4">
    {{ $page.props.success }}
  </div>
  <div v-if="$page.props.hotels && $page.props.hotels.length > 0">
    <div v-for="item in $page.props.hotels" class="flex bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 mb-4">
      <div class="w-full md:w-2/12">
        <img :src="item.image_url" :alt="item.name" />
      </div>
      <div class="w-full md:w-9/12 py-1 px-3">
        <h3 class="inline text-xl me-3">{{ item.name }}</h3>
        <template v-for="star in Math.round(item.rating_stars)">
          <span role="img" aria-label="star">⭐️</span>
        </template>
        <p>🗺️: {{ item.country }}, {{ item.city }}</p>
        <p>{{ item.description }}</p>
      </div>
      <div class="w-full md:w-1/12 grid flex-col align-center justify-center content-evenly">
        <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button> -->
        <Link :href="route('admin.hotels.edit', { hotel: item.id })" class="bg-blue-500 hover:bg-blue-700 text-center text-white font-bold py-2 px-4 rounded">
          Edit
        </Link>
        <button class="bg-gray-500 hover:bg-gray-700 text-center text-white font-bold py-2 px-4 rounded">Delete</button>
      </div>
    </div>
  </div>
  <div v-else class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 mb-3">
    No hotels present. <a :href="route('admin.hotels.new')" class="text-blue-600 visited:text-purple-600 ...">Add new Hotel</a>?
  </div>
  <div v-if="$page.props.pageDescription" class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
    <p>{{ $page.props.pageDescription }}</p>
  </div>
</template>

<style scoped></style>
