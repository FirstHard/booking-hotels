<script setup>
import { useForm } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";

const $page = usePage();
const hotel = $page.props.hotel;

const locationOptions = [
  { value: "0", label: "France, Paris", country: "France", city: "Paris" },
  { value: "1", label: "Italy, Rome", country: "Italy", city: "Rome" },
  { value: "2", label: "Turkey, Ankara", country: "Turkey", city: "Ankara" },
];

const findLocationIndex = (country, city) => {
  const index = locationOptions.findIndex((option) => option.country === country && option.city === city);
  return index !== -1 ? String(index) : "";
};

const form = useForm({
  name: hotel.name ?? "",
  description: hotel.description ?? "",
  location: findLocationIndex(hotel.country, hotel.city),
  country: hotel.country ?? "",
  city: hotel.city ?? "",
  rating_stars: hotel.rating_stars ?? 5,
  image: hotel.image ?? $event.target.files[0],
});
const submitForm = () => {
  const selectedLocation = form.location;
  form.country = locationOptions[selectedLocation].country;
  form.city = locationOptions[selectedLocation].city;

  form.post(`/admin/hotels/${hotel.id}`),
    {
      preserveScroll: true,
      onSuccess: () => {
        form.reset();
      },
      onError: (error) => {
        console.log(error);
      },
    };
};
</script>

<template>
  <form @submit.prevent="submitForm" enctype="multipart/form-data" class="mb-4">
    <div class="flex flex-col lg:flex-row justify-between">
      <div class="mb-4 w-full lg:w-1/3 me-0 lg:me-2">
        <label for="location" class="block text-sm font-medium text-gray-700">Country and City *</label>
        <select id="location" v-model="form.location" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
          <option value="" disabled>Select Country and City</option>
          <option v-for="(option, index) in locationOptions" :key="index" :value="option.value">
            {{ option.label }}
          </option>
        </select>
        <div v-if="form.errors.location">{{ form.errors.location }}</div>
      </div>

      <div class="mb-4 w-full lg:w-1/3 mx-0 lg:mx-2">
        <label for="rating_stars" class="block text-sm font-medium text-gray-700">Rating Stars *</label>
        <select id="rating_stars" v-model="form.rating_stars" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
          <option value="" selected disabled>Select stars</option>
          <option v-for="star in [1, 2, 3, 4, 5, 6, 7]" :key="star" :value="star">{{ "⭐️".repeat(star) }}</option>
        </select>
        <div v-if="form.errors.rating_stars">{{ form.errors.rating_stars }}</div>
      </div>

      <div class="mb-4 w-full lg:w-1/3 ms-0 lg:ms-2">
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <input
          type="file"
          id="image"
          name="image"
          @change="form.image = $event.target.files[0]"
          class="bg-white mt-1 p-1 border border-gray-300 rounded-md w-full"
          accept="image/*"
        />
        <div v-if="form.errors.image">{{ form.errors.image }}</div>
      </div>
    </div>

    <div class="mb-4">
      <label for="name" class="block text-sm font-medium text-gray-700">Name *</label>
      <input type="text" id="name" v-model="form.name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" autocomplete="off" required />
      <div v-if="form.errors.name">{{ form.errors.name }}</div>
    </div>

    <div class="mb-4">
      <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
      <textarea id="description" v-model="form.description" class="mt-1 p-2 border border-gray-300 rounded-md w-full" rows="4"></textarea>
      <div v-if="form.errors.description">{{ form.errors.description }}</div>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md" :disabled="form.processing">Submit</button>
  </form>
</template>

<style scoped></style>
