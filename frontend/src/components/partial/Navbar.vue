<template>
    <nav>
        <router-link to="/login" v-if="!isLoggedIn">login</router-link>
        <router-link to="/register" v-if="!isLoggedIn">Sign Up</router-link>
        <a href="#" @click="logout" v-if="isLoggedIn">logout</a>
    </nav>
</template>

<script>
import {mapState, mapActions} from 'vuex';
export default {
    component:{
        ...mapState(['isloggedIn'])
    },
    methods: {
        ...mapActions(['logout'])
        
    }
}
</script>

