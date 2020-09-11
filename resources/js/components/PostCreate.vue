<template>
    <div class="d-flex w-50 m-auto align-items-center">
        <div class="card card-body">
            <form>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="form-control"
                           v-model="form.title"
                           :class="[{'is-invalid': errorFor('title')}]"
                    />
                    <v-errors :errors="errorFor('title')"></v-errors>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea
                        id="description"
                        type="text"
                        name="description"
                        class="form-control"
                        v-model="form.description"
                        :class="[{'is-invalid': errorFor('description')}]">
                        Post description
                    </textarea>
                    <v-errors :errors="errorFor('description')"></v-errors>
                </div>
                <div class="form-group">
                    <button type="submit"
                            class="btn btn-primary btn-lg btn-block"
                            @click.prevent="createPost">
                        Create Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import validationErrors from "../shared/mixins/validationErrors";

export default {
    mixins: [validationErrors],
    name: "PostCreate",
    props: {
        endpoint: {
            type: String,
            default: "/api/posts",
        }
    },
    data() {
        return {
            form: {
                title: "",
                description: ""
            }
        }
    },
    methods: {
        async createPost() {
            this.errors = null;

            try {
                await axios.post(this.endpoint, this.form);
                await this.$router.push({name: "dashboard"});
            } catch (error) {
                console.log(error.response.data);
                this.errors = error.response.data.errors;
            }
        }
    }

}
</script>
