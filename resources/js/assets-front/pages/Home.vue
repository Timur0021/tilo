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
</template>

<script>
import axios from 'axios';
import 'owl.carousel';

export default {
    data() {
        return {
            articles: [],
        };
    },
    mounted() {
        this.fetchArticles();
    },
    methods: {
        fetchArticles() {
            axios.get('/api/')
                .then(response => {
                    this.articles = response.data.articles;
                    this.$nextTick(() => {
                        this.initOwlCarousel();
                    });
                })
                .catch(error => {
                    console.error('Error fetching articles:', error);
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
        },
    },
};
</script>

<style scoped>
/* Додайте ваші стилі тут */
</style>
