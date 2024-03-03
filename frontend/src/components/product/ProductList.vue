<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mosharrof</td>
                    <td>Mosharrof</td>
                    <td>Mosharrof</td>
                </tr>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.name }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from '@/axios'
export default {
    data(){
        return{
            products:[],
        };
    },
    methods: {
        async created(){
            try{
                const response = await axios.get('/products');
                this.products = response.data;
            }catch(error){
                console.error(error);
            }
        }
    },   
}
</script>

