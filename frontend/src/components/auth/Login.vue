<template>
  <div class="form-container">
    <form @submit.prevent="login" class="login-form">
      <input type="email" v-model="email" placeholder="Email..." required />
      <input
        type="password"
        v-model="password"
        placeholder="Password..."
        required
      />
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>
import axios from "@/axios";
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post("/login", {
          email: this.email,
          password: this.password,
        });
        if (response.data.token) {
          localStorage.setItem("token", response.data.token);
        }
        this.$store.commit("LOGIN");
        this.$router.push("/");
      } catch (error) {
        console.error("Data Error");
      }
    },
  },
};
</script>

