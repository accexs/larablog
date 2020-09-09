<template>
    <posts-index endpoint="/api/user/posts"></posts-index>
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
