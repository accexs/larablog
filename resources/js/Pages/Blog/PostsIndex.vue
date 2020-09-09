<template>
    <div class="row col-md-8">
        <div class="col-md-12 ">
            <h3 class="pb-4 mb-4 font-italic border-bottom">
                Posts List
            </h3>
        </div>
        <div class="col-sm-12 col-md-12 row mt-2">
            <div class="col-md-12">
                <Post v-for="post in posts.data" :key="post.id" :post="post"/>
            </div>
        </div>
        <pagination :data="posts" @pagination-change-page="paginate">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>
    </div>
</template>

<script>
import Post from "../../components/Post";
import Pagination from "laravel-vue-pagination";

export default {
    name: "PostsIndex",
    components: {Pagination, Post},
    props: {
        endpoint: {
            required: true,
            type: String,
            default: "/api/posts",
        },
        immediate: {
            default: false,
            type: Boolean,
        },
    },
    data() {
        return {
            posts: {},
        }
    },
    created() {
        this.loadPosts(this.getEndpoint());
        document.title = "Larablog"
    },
    methods: {
        loadPosts(endpoint) {
            axios.get(endpoint)
                .then(response => {
                    this.posts = response.data;
                })
                .catch(error => console.log(error.response));

        },
        getEndpoint() {
            return this.endpoint;
        },
        paginate(page) {
            let endpoint = `${this.endpoint}?page=${page}`;
            this.loadPosts(endpoint);
        }
    }
}
</script>

<style scoped>

</style>
