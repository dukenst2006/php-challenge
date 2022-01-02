<template>
<div>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><router-link :to="{name: 'home'}"> PHP Challenge</router-link></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li>
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'home' }"
            >
              Home
            </router-link>
          </li>
          <li>
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'about' }"
            >
              About
            </router-link>
          </li>
          <li v-if="!isLoggedIn">
            <router-link
              class="nav-link getstarted"
              data-toggle="collapse"
              :to="{ name: 'login' }"
            >
            <i class="fas fa-lock" style="padding-right:6px"></i>
              Login
            </router-link>
          </li>
          <li v-else>
            <router-link
              class="nav-link"
              :to="{ name: 'logout' }"
            >
            <i class="fas fa-user" style="padding-right:6px"></i>
              Logout
            </router-link>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <main id="main">
      <router-view></router-view>
  </main>
    <div id="preloader"></div>

    <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Dukens</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://thelemaque-dukens.com/">Dukens Thelemaque</a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->
</div>
</template>
<script>
export default {
  computed: {
    isLoggedIn() {
      return this.$store.getters.loggedIn
    }
  }
};
</script>
