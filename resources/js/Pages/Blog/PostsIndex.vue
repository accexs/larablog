<template>
    <div class="row col-10">
        <div class="col-8 d-flex">
            <h3>Post list</h3>
        </div>

        <div class="d-flex ml-auto">
            <label for="sort">
                Sort by date
                <select v-model="sort" id="sort" class="custom-select">
                    <option value="">None</option>
                    <option value="asc">Asc</option>
                    <option value="desc">Desc</option>
                </select>
            </label>
        </div>

        <div class="row col-10 mt-2">
            <div class="col-12">
                <Post v-for="post in posts.data" :key="post.id" :post="post"/>
            </div>
        </div>

        <div class="row col-12">
            <pagination :data="posts" @pagination-change-page="paginate">
                <span slot="prev-nav">&lt; Previous</span>
                <span slot="next-nav">Next &gt;</span>
            </pagination>
        </div>
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
        }
    },
    data() {
        return {
            posts: {},
            sort: "",
        }
    },
    watch: {
        sort: function () {
            this.loadPosts(this.getEndpoint());
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
            let method = "";
            if (this.sort) {
                method = ((this.sort === 'asc') ? '+' : '-') + 'created_at';
            }
            return `${this.endpoint}?sort=${method}`;
        },
        paginate(page) {
            let endpoint = `${this.getEndpoint()}&page=${page}`;
            this.loadPosts(endpoint);
        }
    }
}
</script>

<style scoped>

</style>
