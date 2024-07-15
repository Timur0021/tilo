<template>
    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block" style="background-color: black">
        <div class="row gx-0 align-items-center" style="height: 45px;">
            <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    <a href="#" class="text-light me-4"><i class="fas fa-map-marker-alt text-white me-2"></i>Find A Location</a>
                    <a href="#" class="text-light me-4"><i class="fas fa-phone-alt text-white me-2"></i>+01234567890</a>
                    <a href="#" class="text-light me-0"><i class="fas fa-envelope text-white me-2"></i>Example@gmail.com</a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex align-items-center justify-content-end">
                    <a href="#" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-light btn-square border rounded-circle nav-fill me-0"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <img src="" alt="TILO" class="m-0" style="max-width: 6rem; height: auto; border-radius: 50%;">
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <router-link class="nav-item nav-link active" to="/">Home</router-link>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="appointment.html" class="dropdown-item">Appointment</a>
                            <a href="feature.html" class="dropdown-item">Features</a>
                            <a href="blog.html" class="dropdown-item">Our Blog</a>
                            <a href="team.html" class="dropdown-item">Our Team</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                </div>
                <a href="#" class="btn btn-dark rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0" style="background-color: black">Book Appointment</a>
            </div>
        </nav>


        <!-- Carousel Start -->
<!--        <div class="header-carousel owl-carousel">-->
<!--            @foreach($articles as $article)-->
<!--            <div class="header-carousel-item">-->
<!--                <img src="{{ url( $article->getFirstMediaUrl('image_article', 'preview')) }}" class="img-fluid w-100" alt="Image">-->
<!--                <div class="carousel-caption">-->
<!--                    <div class="carousel-caption-content p-3">-->
<!--                        <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">{{ $article->title }}</h5>-->
<!--                        <h1 class="display-1 text-capitalize text-white mb-4">{{ $article->second_title }}</h1>-->
<!--                        <p class="mb-5 fs-5">{{ $article->description }}</p>-->
<!--                        <a class="btn btn-danger rounded-pill text-white py-3 px-5" href="#">Book Appointment</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            @endforeach-->
<!--        </div>-->
        <!-- Carousel End -->
    </div>
</template>
<script lang="js">
import { defineComponent } from "vue";

export default defineComponent({
    components: {}
});
</script>
