<template>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <router-link class="navbar-brand" to="/">Larablog</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <template v-if="isLoggedIn">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My Account
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <router-link class="dropdown-item" to="/dashboard">Dashboard</router-link>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" @click.prevent="logout">Logout</a>
                            </div>
                        </li>
                    </template>
                    <template v-else>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/login">Login</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/register">Register</router-link>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navbar -->
</template>

<script>
import {mapState} from "vuex";

export default {
    name: "Navbar",
    computed: {
        ...mapState({
            isLoggedIn: "isLoggedIn"
        }),
    },
    methods: {
        async logout() {
            try {
                await axios.post("/logout");
                await this.$store.dispatch("logout");
            } catch (error) {
                await this.$store.dispatch("logout");
            }
        }
    }
}
</script>

<style scoped>

</style>
