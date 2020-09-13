<template>
    <div class="row">
        <div class="jumbotron">
            <h3 class="display-3">{{ post.title }}</h3>
            <div class="row col-7">
                <div class="d-flex">
                    <p class="mb-1 text-muted">{{ post.created_at | shortDate }}</p>
                </div>
                <p class="ml-auto">{{ post.author }}</p>
            </div>
            <hr class="my-4">
            <p>{{ post.description }}</p>
        </div>
    </div>

</template>

<script>
export default {
    name: "PostShow",
    props: {
        endpoint: {
            type: String,
            default: "/api/posts",
        }
    },
    data() {
        return {
            post: {
                title: "",
                author: "",
                created_at: "",
                description: ""
            }
        }
    },
    created() {
        this.getPost(this.$route.params.id);
        console.log('Post id: ' + this.$route.params.id)
    },
    methods: {
        getPost(id) {
            let endpoint = `${this.endpoint}/${id}`;
            axios.get(endpoint)
                .then(response => {
                    this.post = response.data.data;
                    console.log(this.post);
                })
                .catch(error => console.log(error.response));
        },
        getEndpoint() {
            return this.endpoint;
        },
    }
}
</script>

<style scoped>

</style>
