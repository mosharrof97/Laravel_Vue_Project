<template>
  <div class="container mt-5">
    <main class="form-signin w-50 m-auto shadow p-5">
      <h5 class="text-center">Sign Up</h5>
      <form @submit.prevent="register">
        <input
          type="name"
          v-model="name"
          class="form-control mt-3"
          placeholder="Name..."
          required
        />
        <input
          type="email"
          class="form-control mt-3"
          v-model="email"
          placeholder="Email..."
          required
        />
        <input
          type="password"
          v-model="password"
          class="form-control mt-3"
          placeholder="Password..."
          required
        />
        <button type="submit" class="btn btn-primary mt-3">Sign Up</button>
      </form>
    </main>
  </div>
</template>



<script>
import axios from "@/axios";
export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
    };
  },

  methods: {
    async register() {
      try {
        const response = await axios.post("/register", {
          name: this.name,
          email: this.email,
          password: this.password,
        });
        this.$router.push("/login");
      } catch (error) {
        console.error("An error ocurred:", error);
        if (error.response) {
          console.error("Error Details:", error.response.data);
        }
      }
    },
  },
};
</script>

