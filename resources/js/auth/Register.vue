<template>
    <div class="w-50 m-auto">
        <div class="card card-body">
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input
                        id="username"
                        type="text"
                        name="username"
                        placeholder="Enter your username"
                        class="form-control"
                        v-model="user.username"
                        :class="[{'is-invalid': errorFor('username')}]"
                    />
                    <v-errors :errors="errorFor('username')"></v-errors>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input
                        id="email"
                        type="text"
                        name="email"
                        placeholder="Enter your e-mail"
                        class="form-control"
                        v-model="user.email"
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
                        v-model="user.password"
                        :class="[{'is-invalid': errorFor('password')}]"
                    />
                    <v-errors :errors="errorFor('password')"></v-errors>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Re-type Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        class="form-control"
                        v-model="user.password_confirmation"
                        :class="[{'is-invalid': errorFor('password_confirmation')}]"
                    />
                    <v-errors :errors="errorFor('password_confirmation')"></v-errors>
                </div>

                <button
                    type="submit"
                    class="btn btn-primary btn-lg btn-block"
                    @click.prevent="register"
                >Register
                </button>

                <hr/>

                <div>
                    Already have an account?
                    <router-link :to="{name: 'login'}" class="font-weight-bold">Log-in</router-link>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import validationErrors from "../shared/mixins/validationErrors";
import {logIn} from "../shared/utils/auth";

export default {
    mixins: [validationErrors],
    data() {
        return {
            user: {
                username: null,
                email: null,
                password: null,
                password_confirmation: null
            },
            // loading: false
        };
    },
    methods: {
        async register() {
            // this.loading = true;
            // this.errors = null;

            try {
                console.log(this.user);
                const response = await axios.post("/register", this.user);

                if (201 === response.status) {
                    logIn();
                    await this.$store.dispatch("loadUser");
                    await this.$router.push({name: "index"});
                }
            } catch (error) {
                this.errors = error.response && error.response.data.errors;
            }

            // this.loading = false;
        }
    }
};
</script>
