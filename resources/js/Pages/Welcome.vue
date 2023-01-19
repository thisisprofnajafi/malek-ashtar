<script setup lang="ts">
import {Head, Link} from "@inertiajs/inertia-vue3";
import useNotyf from "../composable/useNotyf";
import {onMounted, ref} from "vue";
import NavbarLayout from "@/layouts/NavbarLayout.vue";
import { Carousel, Navigation, Slide, Pagination } from 'vue3-carousel';
import MainSlider from "@/components/MainSlider.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const settings = ref({itemsToShow: 1, snapAlign: 'center',})
const breakpoints = ref(   { 700: {itemsToShow: 1, snapAlign: 'center',}, 1024: {itemsToShow: 1, snapAlign: 'start',}})

const slides = ref({
    0:{image : './images/slider/1.jpg'},
    1:{image : './images/slider/2.jpg'},
})


const notif = useNotyf();

onMounted(() => {
    console.log("hi");
    notif.success("خوش آمدید");
});
</script>

<template>
    <Head title="خانه"/>
    <NavbarLayout>
        <div class="app-wrapper">
            <div class="head-grid">
                <div class="left">
                    <div class="ads">
                        <div class="ad d-flex align-items-center justify-content-center">تبلیغات</div>
                        <div class="ad d-flex align-items-center justify-content-center">تبلیغات</div>
                        <div class="ad d-flex align-items-center justify-content-center">تبلیغات</div>
                        <div class="ad d-flex align-items-center justify-content-center">تبلیغات</div>
                    </div>
                </div>
                <div class="side">
                    <div class="buttons">
                        <button class="btn">پر بازدیدترین ها</button>
                        <button class="btn">جدیدترین ها</button>
                    </div>
                    <div class="yad-card">
                        <div class="card-title"></div>

                    </div>
                </div>
                <div class="main"></div>
            </div>
        </div>
    </NavbarLayout>
</template>
<style lang="scss">

.ads{
    display: flex;
    flex-direction: column;
    grid-template-columns: 1fr;
    gap: 5px;
    .ad{
        width: 100%;
        height:200px;
        border: 1px solid #0002;
        background: #0001;
        color:#0005;
    }
}



.header-card{
    border-radius: 1rem;
}
.left-column{
    padding: 2rem 0;
}
.carousel{
    height: 85vh;
}
.carousel__item {
    min-height: 200px;
    width: 100%;
    background-color: var(--vc-clr-primary);
    color: var(--vc-clr-white);
    font-size: 20px;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.carousel__slide {

}

.carousel__prev,
.carousel__next {
    box-sizing: content-box;
    border: 5px solid white;
}




</style>
