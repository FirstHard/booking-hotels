<script setup>
import { router } from "@inertiajs/vue3";

const adminRoutes = [
  {
    label: "Hotels",
    submenu: [
      { route: "admin.hotels", title: "List Hotels" },
      { route: "admin.hotels.new", title: "Add new Hotel" },
    ],
  },
  {
    label: "Rooms",
    submenu: [
      { route: "admin.rooms", title: "List Rooms" },
      { route: "admin.rooms.new", title: "Add new Room" },
    ],
  },
  {
    label: "Reservations",
    submenu: [
      { route: "admin.reservations", title: "List Reservations" },
      { route: "admin.reservations.new", title: "Add new Reservation" },
    ],
  },
  {
    label: "Clients",
    submenu: [
      { route: "admin.clients", title: "List Clients" },
      { route: "admin.clients.new", title: "Add new Client" },
    ],
  },
];
</script>

<template>
  <div class="sidebar-menu">
    <ul>
      <li v-for="(item, index) in adminRoutes" :key="index" class="flex flex-col p-4 bg-gray-200 font-bold">
        {{ item.label }}
        <ul>
          <li v-for="(subItem, subIndex) in item.submenu" :key="subIndex">
            <template v-if="route().current() === subItem.route">
              <a :href="route(subItem.route)" :active="route().current(subItem.route)" class="block py-2 ps-4 font-bold bg-green-300 hover:bg-gray-300">
                {{ subItem.title }}
              </a>
            </template>
            <template v-else>
              <a :href="route(subItem.route)" class="block py-2 ps-4 font-normal bg-green-200 hover:bg-gray-300">
                {{ subItem.title }}
              </a>
            </template>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</template>

<style scoped>
.sidebar-menu ul,
.sidebar-menu li {
  list-style: none;
}
</style>
