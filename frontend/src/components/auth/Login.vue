<template>
  <div class="container mt-5">
    <main class="form-signin w-50 m-auto shadow p-5">
      <form @submit.prevent="login">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
          <input
            type="email"
            class="form-control"
            id="floatingInput"
            v-model="email"
            required
            placeholder="name@example.com"
          />
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mt-3">
          <input
            type="password"
            class="form-control"
            id="floatingPassword"
            v-model="password"
            required
            placeholder="Password"
          />
          <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary py-2 mt-3" type="submit">Login</button>
      </form>
    </main>
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

