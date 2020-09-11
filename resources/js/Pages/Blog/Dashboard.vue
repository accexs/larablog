<template>
    <div class="container">
        <div class="row col-12">
            <div class="col-10">
                <posts-index endpoint="/api/user/posts"></posts-index>
            </div>
            <div class="col-2">
                <router-link class="btn-lg btn-dark" to="/post/create" tag="button">Create Post</router-link>
            </div>
        </div>
    </div>
</template>

<script>
import PostsIndex from "./PostsIndex";

export default {
    name: "Dashboard",
    components: {PostsIndex}
}
</script>

<style scoped>

</style>
