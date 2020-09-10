<template>
    <div
        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-custom h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static col-md-8">
            <h3 class="mb-0">{{ post.title }}</h3>
            <div class="mb-1 text-muted">{{ post.created_at | shortDate }}</div>
            <p class="card-text">{{ post.description }}</p>
            <div class="d-flex justify-content-between">
                <router-link
                    :to="{
                        name: 'posts.show',
                        params: {
                            // category: post.category.slug,
                            // slug: post.slug
                        }
                    }"
                    class="stretched-link"
                >Continue reading
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Post",
    props: {
        post: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
