<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <posts-index endpoint="/api/user/posts"></posts-index>
            </div>
            <div class="col-md-4">
                <!--<button id="create-post" class="btn-lg">Create Post</button>-->
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
