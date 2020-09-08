<template>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <router-link class="navbar-brand" to="/">Larablog</router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
<!--            <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>-->
            <router-link class="nav-link" to="/login">Login</router-link>
          </li>
          <li class="nav-item">
<!--            <a class="nav-link" href="#">Register <span class="sr-only">(current)</span></a>-->
            <router-link class="nav-link" to="/register">Register</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End navbar -->
</template>

<script>
// import PostSearch from "../../../components/PostSearch";

export default {
  name: "Navbar",
  // components: {PostSearch}
}
</script>

<style scoped>

</style>
