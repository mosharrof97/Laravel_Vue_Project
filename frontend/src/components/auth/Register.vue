<template>
    <div class="form-container">
        <form @submit.prevent="register" class="register-form" action="">
            <input type="name" v-model="name" placeholder="Name..." required/>
            <input type="email" v-model="email" placeholder="Email..." required/>
            <input type="password" v-model="password" placeholder="Password..." required/>
            <button type="submit">Sign Up</button>
        </form>

    </div>
</template>



<script>
import axios from '@/axios';
export default {
    data(){
        return{
            name:"",
            email:"",
            password:"",
        };
    },

    methods:{
        async register (){
            try{
                const response = await axios.post("/register",{
                    name:this.name,
                    email:this.email,
                    password:this.password,
                });
            }catch(error){
                console.error("An error ocurred:", error);
                if(error.response){
                    console.error("Error Details:",error.response.data);
                }
            }
        }
    }
}
</script>

