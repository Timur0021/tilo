<template>
    <HeaderComponent></HeaderComponent>
    <main class="main">
        <router-view></router-view>
    </main>
</template>

<script lang="js">
import {defineComponent} from "vue";
import HeaderComponent from "./components/main/HeaderComponent.vue";
import Home from './pages/Home.vue';
export default defineComponent({
    components: {
        HeaderComponent,
    }
})
</script>

