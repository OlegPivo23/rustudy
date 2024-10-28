<template>
    <div>
        <Header></Header>
        <main>
            <section class="error-container error">
                <div class="error__left flex">
                    <h2 class="error__title">404</h2>
                    <picture>
                        <source srcset="img/errores/girl_mobile.png" media="(max-width: 576px)">
                        <source srcset="img/errores/girl_tablet.png" media="(max-width: 1024px)">
                        <img class="error__img" src="img/errores/girl_desc.png" alt="Девушка">
                    </picture>
                </div>

                <div class="error__right">
                    <div class="error__content flex">
                        <div class="error__info">
                            <p class="error__subtitle">Страница не найдена</p>
                            <p class="error__text">Запрашиваемой страницы не&nbsp;существует.
                                Возможно, в&nbsp;запросе был указан неверный адрес страницы, или она была удалена.</p>
                            <router-link :to="{ name: 'home' }" class="btn-reset error__btn">На главную</router-link>
                        </div>
                        <div class="error__footer">
                            <ul class="list-reset error__list flex">
                                <li class="error__item flex">
                                    <p class="error__offer">Вы можете посмотреть наш новый учебник РКИ</p>
                                    <router-link to="/textbook" class="error__link-container flex">
                                        <p class="error__link">Учебник РКИ</p>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L22.6667 22.6667M22.6667 22.6667V1.86667M22.6667 22.6667H1.86667"
                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </router-link>

                                </li>
                                <li class="error__item flex">
                                    <p class="error__offer">Посмотреть учебно-методические материалы, тесты, игры и
                                        видеоуроки
                                    </p>
                                    <router-link to="/service" class="error__link-container flex">
                                        <p class="error__link">Сервисы РКИ</p>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L22.6667 22.6667M22.6667 22.6667V1.86667M22.6667 22.6667H1.86667"
                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </router-link>

                                </li>
                                <li class="error__item flex">
                                    <p class="error__offer">Пройти курсы повышения квалификации</p>
                                    <a target="_blank" href="https://kurs.rus.study/" class="error__link-container flex">
                                        <p class="error__link">Курсы РКИ</p>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L22.6667 22.6667M22.6667 22.6667V1.86667M22.6667 22.6667H1.86667"
                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section>
        </main>
        <Footer></Footer>
    </div>
</template>

<script>
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';
import {useHead} from "unhead";
export default {
    name: 'error404',
    components: { Header, Footer },
    mounted() {
        useHead({
            title: '404',
        })
    }
}
</script>



<style>
body {
    background: #e7f0ff;
    font-family: "Manrope", sans-serif;
    font-weight: 400;
}

img {
    display: block;
}
</style>
