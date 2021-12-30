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
          <li>
            <router-link
              class="nav-link getstarted"
              data-toggle="collapse"
              :to="{ name: 'login' }"
            >
              Login
            </router-link>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <!-- <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>One Page Bootstrap Website Template</h1>
          <h2>We are team of talented designers</h2>
        </div>
      </div>
      <div class="text-center">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>
  </section> -->
  <!-- End Hero -->

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
  watch: {
    // $route() {
    //   $("#navbarCollapse").collapse("hide");
    // },
  },
};
</script>
