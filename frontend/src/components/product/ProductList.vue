<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.name }}</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from '@/axios';
export default {
    data() {
        return {
            products: []
        };
    },
    async created() {
        try {
            const response = await axios.get('/products');
            this.products = response.data;
        } catch (error) {
            console.error(error);
        }
    }
};
</script>

