<template>
    <div id="review" class="modal__review">
        <button class="modal__close btn-reset" @click="$emit('close-modal')">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
<path d="M37.5 2.5L2.5 37.5" stroke="#0A2B49" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M2.5 2.5L37.5 37.5" stroke="#0A2B49" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
        </button>
        <div class="modal__window">


        <swiper class="modal-slider"
        :modules="modules"
        :slides-per-view="1"
        :space-between="20"
        navigation
        @swiper="onSwiper"

       >
        <swiper-slide class="review" v-for="(item, index) in review" :key="index" :id="item.id">
            <div class="review__card flex">
                 <video class="review__video" v-if="item.video[0].download_link" controls>
                    <source :src="'storage/'+item.video[0].download_link">
                </video>
                <img v-else class="review__image" :src="'storage/'+item.image" :alt="item.teachername">
                <!-- <picture>
                    <source srcset="">
                    <img class="review__image" :src="review.image" :alt="review.name">
                </picture> -->
                <div class="review__content">
                <div class="review__block">
                    <img class="" :src="'storage/'+item.image" :alt="item.teachername">
                    <p class="review__name">{{ item.teachername }}</p>
                </div>
                <p class="review__desc" v-html="item.text"></p>
                </div>
            </div>
        </swiper-slide>
        </swiper>

        </div>
    </div>
</template>


<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import useNewsStore from '../stores/NewsStore.js'

    export default {
        props: ['reviews', 'review', 'currentActiveSlide'],
        components: {Swiper, SwiperSlide },

        setup(props) {
            const onSwiper = (swiper) => {
                const activeSlide = document.getElementById(props.currentActiveSlide);
                if (activeSlide) {

                const slideIndex = Array.from(swiper.slides).findIndex(slide => Number(slide.id) === props.currentActiveSlide);
                console.log(Array.from(swiper.slides))
                if (slideIndex !== -1) {
                    swiper.slideTo(slideIndex); // Переходим к нужному слайду
                    console.log("Переход к слайду:", props.currentActiveSlide, "индекс:", slideIndex);
                } else {
                    console.error("Слайд с ID", props.currentActiveSlide, "не найден!");
                }
                } else {
                console.error("Элемент с ID", props.currentActiveSlide, "не найден на странице!");
                }

            };

            return {
                onSwiper,
                modules: [Navigation],
            };

        },

        computed: {
            activeReview() {
                const NewsStore = useNewsStore();
                return NewsStore.activeReview;
            }
        }
    }
</script>

