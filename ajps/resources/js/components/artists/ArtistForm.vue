<template>
  <div class="min-h-screen bg-gray-950 text-white">
    <!-- Cover Photo -->
    <div class="w-full h-170 relative"> <!-- 🔹 pinalaki -->
      <img
        :src="artistData.cover"
        alt="Cover"
        class="w-full h-full object-cover"
      />
      <!-- Dark overlay (para contrast) -->
      <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <div class="max-w-6xl mx-auto p-8 -mt-28 relative z-10">
      <!-- Header -->
      <div class="flex items-center space-x-8">
        <!-- Profile picture (pinalaki din konti para balance) -->
        <img
          :src="artistData.profile"
          alt="Profile"
          class="w-48 h-48 rounded-full object-cover border-4 border-gray-700 shadow-lg"
        />

        <!-- Artist Info -->
        <div>
          <h1 class="text-4xl font-extrabold">{{ artistData.name }}</h1>
          <p class="text-lg text-gray-400 mt-2">{{ artistData.bio }}</p>
        </div>
      </div>

      <!-- Gallery Grid -->
      <h2 class="mt-10 text-2xl font-semibold">Artworks</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
        <div
          v-for="(art, index) in artistData.gallery"
          :key="index"
          class="aspect-square bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:scale-105 transform transition"
        >
          <img :src="art" alt="Artwork" class="w-full h-full object-cover" />
        </div>
      </div>
    </div>
  </div>
</template>


<script setup>
import { useRoute } from "vue-router";

const route = useRoute();

const artists = {
  "Cara-Nicolas": {
    name: "Cara Nicolas",
    bio: "Specializes in fine-line and minimalist tattoos.",
    profile: "/images/artists/cara.jpg",
    cover: "/images/covers/caralogo.png", // 🔹 bagong cover photo
    gallery: [
      "/images/artworks/cara1.jpg",
      "/images/artworks/cara2.jpg",
      "/images/artworks/cara3.jpg",
      "/images/artworks/cara3.jpg",
      "/images/artworks/cara3.jpg",
    ],
  },
  "Ivan-Nicolas": {
    name: "Ivan Nicolas",
    bio: "Bold blackwork and geometric designs.",
    profile: "/images/artists/ivan.jpg",
    cover: "/images/covers/ivan-cover.jpg",
    gallery: [
      "/images/artworks/ivan1.jpg",
      "/images/artworks/ivan2.jpg",
      "/images/artworks/ivan3.jpg",
    ],
  },
  "Leo-Botulan": {
    name: "Leo Botulan",
    bio: "Color realism and portrait tattoos.",
    profile: "/images/artists/leo.jpg",
    cover: "/images/covers/leo-cover.jpg",
    gallery: [
      "/images/artworks/leo1.jpg",
      "/images/artworks/leo2.jpg",
      "/images/artworks/leo3.jpg",
    ],
  },
};

const artistData = artists[route.params.name] || {
  name: "Unknown Artist",
  bio: "No bio available.",
  profile: "/images/default-profile.png",
  cover: "/images/default-cover.jpg",
  gallery: [],
};
</script>
