<script setup lang="ts">
import DesktopNavigation from "@/layouts/DesktopNavigation.vue";
import MobileNavigation from "@/layouts/MobileNavigation.vue";


</script>

<template>
  <div class="navbar-layout">
    <div class="app-overlay"></div>
    <DesktopNavigation></DesktopNavigation>
    <MobileNavigation></MobileNavigation>
    <slot></slot>
  </div>
</template>

<style lang="scss">



</style>
