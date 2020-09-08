<template>
    <div class="d-flex w-50 m-auto align-items-center">
        <div class="card card-body">
            <form>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input
                        id="email"
                        type="text"
                        name="email"
                        placeholder="Enter your e-mail"
                        class="form-control"
                        v-model="email"
                        :class="[{'is-invalid': errorFor('email')}]"
                    />
                    <v-errors :errors="errorFor('email')"></v-errors>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        class="form-control"
                        v-model="password"
                        :class="[{'is-invalid': errorFor('password')}]"
                    />
                    <v-errors :errors="errorFor('password')"></v-errors>
                </div>

                <div class="form-group form-check">
                    <input id="remember" type="checkbox" name="remember" class="form-check-input" v-model="remember"/>
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>

                <button
                    type="submit"
                    class="btn btn-primary btn-lg btn-block"
                    @click.prevent="login"
                >Log-in
                </button>
            </form>

            <hr/>
            <span class="text-nowrap">
        No account yet?
        <router-link :to="{name: 'register'}" class="font-weight-bold">Register</router-link>
      </span>
            <span class="text-nowrap">
        Forgotten password?
        <router-link :to="{name: 'password-reset'}" class="font-weight-bold">Reset password</router-link>
      </span>
        </div>
    </div>
</template>

<script>
import {logIn} from "../shared/utils/auth";
import validationErrors from "../shared/mixins/validationErrors";

export default {
    mixins: [validationErrors],
    name: "Login",
    data() {
        return {
            email: null,
            password: null,
            remember: false
        }
    },
    methods: {
        async login() {
            this.errors = null;

            try {
                await axios.get("/sanctum/csrf-cookie");
                await axios.post("/login", {
                    email: this.email,
                    password: this.password
                });

                logIn();
                await this.$store.dispatch("loadUser");
                await this.$router.push({name: "index"});
            } catch (error) {
                console.log(error);
                this.errors = error.response && error.response.data.errors;
            }
        }
    }
}
</script>

<style scoped>

</style>
