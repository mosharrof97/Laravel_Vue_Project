<template>
  <div class="container">
    <div class="card mt-4">
      <div class="card-header">
        <h4>Product Details</h4>
      </div>
      <div class="card-body">
        <table class="table">
          <tbody>
            <tr v-if="product">
              <th scope="row">Name :</th>
              <td>{{ product.name }}</td>
            </tr>
            <tr v-if="product">
              <th scope="row">Price :</th>
              <td>{{ product.price }}</td>
            </tr>
            <tr v-if="product">
              <th scope="row">Description :</th>
              <td>{{ product.description }}</td>
            </tr>
            <tr v-else>
              <td>
                <h5>Product not Found</h5>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "@/axios";
export default {
  data() {
    return {
      product: null,
    };
  },

  async mounted() {
    const productId = this.$route.params.id;
    try {
      const response = await axios.get(`products/${productId}`);
      this.product = response.data;
    } catch (error) {
      console.error("error");
    }
  },
};
</script>