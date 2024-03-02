<script>
// import { RouterLink, RouterView } from "vue-router";
import Navbar from './components/partial/Navbar.vue';

export default {
  components:{
    Navbar,
  },
  name:'App',
}
</script>

<template>
  <div class="">
    <Navbar />
    <div id="app">
      <router-view />
    </div>
  </div>  
</template>


