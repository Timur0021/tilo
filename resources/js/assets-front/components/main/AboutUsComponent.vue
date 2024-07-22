<template>
    <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-img pb-5 ps-5">
                        <img :src="about_us[0]?.images[0]" class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                        <div class="about-img-inner">
                            <img :src="about_us[0]?.images[1]" class="img-fluid rounded-circle w-100 h-100" alt="Image">
                        </div>
                        <div class="about-experience">15 years experience</div>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                    <div v-for="aboutUs in about_us" class="section-title text-start mb-5">
                        <h4 class="sub-title pe-3 mb-0">About Us</h4>
                        <h1 class="display-3 mb-4">{{ aboutUs.title }}</h1>
                        <p class="mb-4">{{ aboutUs.description }}</p>
                        <div v-for="advantage in aboutUs.advantages" class="mb-4">
                            <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i>{{ advantage.title }}</p>
                        </div>
                        <a href="#" class="btn btn-primary rounded-pill text-white py-3 px-5">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.about-img {
    position: relative;
}

.about-img img {
    width: 100%;
    height: auto;
}

.about-img-inner {
    position: absolute;
    bottom: 20px;
    right: 100px;
    width: 250px;
    height: 250px;
}

.about-img-inner img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
}
</style>

<script lang="js">
import axios from 'axios';

export default {
    data() {
        return {
            about_us: [],
        }
    },

    mounted() {
        this.fetchInfo();
    },

    methods: {
        fetchInfo() {
            axios.get('/api/')
                .then(response => {
                    this.about_us = response.data.about_us;
                    console.log(this.about_us);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        },
    }
}
</script>
