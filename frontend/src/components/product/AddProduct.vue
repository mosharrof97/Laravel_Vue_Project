<template>
    <form @submit.prevent="formSubmit" class="add-product-form" >
        <div class="mt-1">
            <input type="text" class="input-field" v-model="name" placeholder="Product name ......." />
            <p v-if="errors.name" class="error">{{ errors.name }}</p>
        </div>

        <div class="mt-1">
            <input type="text" class="input-field" v-model="price" placeholder="Product price ......." />
            <p v-if="errors.price" class="error">{{ errors.price }}</p>
        </div>

        <div class="mt-1">
            <input type="text" class="input-field" v-model="description" placeholder="Product description ......."/>
            <p v-if="errors.description" class="error">{{ errors.description }}</p>
        </div>

        <div class="mt-1">
            <button type="submit" class="submit-button">Submit</button>
        </div>

    </form>
</template>

<script>
    import axios from '@/axios';
export default {
        
        data(){
            return {
                name:"",
                price:"",
                description:"",
                errors:{},
            };
        },

        methods: {
            validateInput(){
                const errors ={};
                if(!this.name) errors.name = 'Name is required';
                if(!this.price || isNaN(this.price)) errors.price = 'Price is required and must be number';
                if(!this.description) errors.description = 'description is required';
            },
            async formSubmit(){
                const errors = this.validateInput();
                if(Object.keys(errors).length>0){
                    this.errors = errors;
                    return;
                
                }
                try{
                    await axios.post('/products',{
                        name: this.name,
                        price: this.price,
                        description: this.description,
                    });
                    this.$router.push('/');
                }
                catch(error){
                    console.error('An Error occurred while adding the product:', error);
                }
            }
        }
    };
</script>

