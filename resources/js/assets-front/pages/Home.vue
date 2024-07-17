<template>
    <div class="header-carousel owl-carousel" v-if="articles.length">
        <div class="header-carousel-item" v-for="article in articles" :key="article.id">
            <img :src="article.image" class="img-fluid w-100" :alt="article.title">
            <div class="carousel-caption">
                <div class="carousel-caption-content p-3">
                    <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">{{ article.title }}</h5>
                    <h1 class="display-1 text-capitalize text-white mb-4">{{ article.second_title }}</h1>
                    <p class="mb-5 fs-5">{{ article.description }}</p>
                    <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Book Appointment</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="sub-style">
                    <h4 class="sub-title px-3 mb-0" style="color: black">What We Do</h4>
                </div>
                <h1 class="display-3 mb-4">Our Service Given Physio Therapy By Expert.</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" v-for="(service, index) in services" :key="service.id" :data-wow-delay="`${index * 0.2 + 0.1}s`">
                    <div class="service-item rounded">
                        <div class="service-img rounded-top">
                            <img :src="service.image" class="img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="service-content rounded-bottom bg-light p-4">
                            <div class="service-content-inner">
                                <h5 class="mb-4">{{ service.title }}</h5>
                                <p class="mb-4">{{ service.description }}</p>
                                <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Services More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- About Start -->
    <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-img pb-5 ps-5">
                        <img src="" class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                        <div class="about-img-inner">
                            <img src="" class="img-fluid rounded-circle w-100 h-100" alt="Image">
                        </div>
                        <div class="about-experience">15 years experience</div>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="section-title text-start mb-5">
                        <h4 class="sub-title pe-3 mb-0">About Us</h4>
                        <h1 class="display-3 mb-4">We are Ready to Help Improve Your Treatment.</h1>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p>
                        <div class="mb-4">
                            <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Refresing to get such a personal touch.</p>
                            <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Duis aute irure dolor in reprehenderit in voluptate.</p>
                            <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <a href="#" class="btn btn-primary rounded-pill text-white py-3 px-5">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
</template>

<script>
import axios from 'axios';
import 'owl.carousel';

export default {
    data() {
        return {
            articles: [],
            services: []
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios.get('/api/')
                .then(response => {
                    this.articles = response.data.articles;
                    this.services = response.data.services;
                    this.$nextTick(() => {
                        this.initOwlCarousel();
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        },
        initOwlCarousel() {
            $('.header-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                items: 1,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                dots: false
            });
        }
    }
};

</script>

<style scoped>
/* Додайте ваші стилі тут */
</style>
