<template>
  
  <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Expand at md</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <router-link to="/add-product" class="nav-link" v-if="isLoggedIn">Add Product</router-link> 
          </li>
          <li class="nav-item">
            <router-link to="/product-list"  class="nav-link"v-if="isLoggedIn">Products</router-link> 
          </li><li class="nav-item"> 
            <a href="#" @click="logout" class="nav-link" v-if="isLoggedIn">Logout</a>
          </li>
          <li class="nav-item">
            <router-link to="/login" class="nav-link" v-if="!isLoggedIn">Login</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/register" class="nav-link" v-if="!isLoggedIn">Sign Up</router-link>
          </li>
          
        </ul>
        <form role="search">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapState, mapActions } from "vuex";
export default {
  computed: {
    ...mapState(["isLoggedIn"]),
  },
  methods: {
    ...mapActions(["logout"]),
  },
};
</script>

