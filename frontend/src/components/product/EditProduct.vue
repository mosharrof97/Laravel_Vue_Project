<template>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="formSubmit" class="add-product-form">
          <div class="mt-3">
            <input
              type="text"
              class="form-control"
              v-model="product.name"
              placeholder="Product name ......."
            />
            <p v-if="errors.name" class="error">{{ errors.name }}</p>
          </div>

          <div class="mt-3">
            <input
              type="text"
              class="form-control"
              v-model="product.price"
              placeholder="Product price ......."
            />
            <p v-if="errors.price" class="error">{{ errors.price }}</p>
          </div>

          <div class="mt-3">
            <input
              type="text"
              class="form-control"
              v-model="product.description"
              placeholder="Product description ......."
            />
            <p v-if="errors.description" class="error">
              {{ errors.description }}
            </p>
          </div>

          <div class="mt-3">
            <button type="submit" class="submit-button">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "@/axios";
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
export default {
  setup() {
    const product = ref({ id: null, name: "", price: "", description: "" });
    const errors = ref({});

    const route = useRoute();
    product.value.id = route.params.id;

    const router = useRouter();

    const validateInput = () => {
      const errorMessages = {};
      if (!product.value.name) errorMessages.name = "Name is required";
      if (!product.value.price || isNaN(product.value.price))
        errorMessages.price = "Price is required and must be a number";
      if (!product.value.description)
        errorMessages.description = "Description is required";
      return errorMessages;
    };
    const formSubmit = async () => {
      const errorMessages = validateInput();
      if (Object.keys(errorMessages).length > 0) {
        errors.value = errorMessages;
        return;
      }

      try {
        await axios.put(`/products/${product.value.id}`, product.value);
        router.push("/");
      } catch (error) {
        console.error("An Error occurred while adding the product:", error);
        if (error.response && error.response.status == 422) {
          errors.value = error.response.data.errors;
        }
      }
    };
    onMounted(async () => {
      try {
        const response = await axios.get(`/products/${product.value.id}`);

        product.value.name = response.data.name;
        product.value.price = response.data.price;
        product.value.description = response.data.description;
      } catch (error) {
        console.error(error);
      }
    });
    return { product, formSubmit, errors };
  },
};
</script>
