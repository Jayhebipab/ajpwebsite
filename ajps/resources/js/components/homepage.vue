<template>
  <div>
    <!-- HERO -->
    <main :style="heroBgStyle" class="relative h-screen w-full flex items-center justify-center">
      <div class="hero-overlay absolute inset-0"></div>
      <div class="container mx-auto relative z-10 flex flex-col md:flex-row items-center justify-center px-4 text-white">
        <div class="text-center md:text-left md:w-full">
          <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight mb-4">
            ADRENALINE JUNKY PIERCINKS
          </h1>
          <p class="text-lg md:text-xl font-light leading-relaxed">
            Your destination for professional tattoos and piercings.<br class="hidden md:block">
            We also offer unique tattoo sponsor services for weddings and other events.
          </p>
          <p class="text-sm md:text-base font-light leading-relaxed mt-4">EST. 2019</p>
        </div>
      </div>
    </main>


    <a href="https://www.facebook.com/messages/t/102727365381254" target="_blank" 
       class="fixed bottom-5 right-5 z-20 transform transition-transform duration-300 hover:scale-125">
      <img :src="messengerIcon" alt="Messenger" class="h-12 w-12 md:h-14 md:w-14">
    </a>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  </div>
</template>

<script setup>
import fbIcon from '@assets/images/fb.png';
import igIcon from '@assets/images/ig.png';
import messengerIcon from '@assets/images/mess.png';
import heroBg from '@assets/images/bg.jpg';

const heroBgStyle = `background-image: url(${heroBg}); background-size: cover; background-position: center;`;
</script>

<style>
.hero-overlay {
  background-color: rgba(0, 0, 0, 0.7);
}
</style>
