<template>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products" :key="product.id">
          <td>{{ product.name }}</td>
          <td>{{ product.price }}</td>
          <td>{{ product.description }}</td>
          <td>
            <router-link
              class="btn btn-primary"
              :to="{ name: 'ViewProduct', params: { id: product.id } }"
              >View</router-link
            >
            <router-link
              class="btn btn-primary"
              :to="{ name: 'EditProduct', params: { id: product.id } }"
              >Edit</router-link
            >
            <button @click="productDelete(product.id)" class="btn btn-danger">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "@/axios";
export default {
  data() {
    return {
      products: [],
    };
  },
  methods: {
    async productDelete(id) {
      try {
        await axios.delete(`/products/${id}`);
        this.products = this.products.filter((product) => product.id !== id);
      } catch (error) {
        console.error(error);
      }
    },
  },
  async created() {
    try {
      const response = await axios.get("/products");
      this.products = response.data;
    } catch (error) {
      console.error(error);
    }
  },
};
</script>
