<template>
    <header class="header">
        <div class="flex header__container container">
            <router-link :to="{ name: 'home' }" class="logo flex">
                <picture>
                    <source srcset="../../../public/img/logo_tablet.svg" media="(max-width: 1024px)">
                    <img class="logo__img" src="../../../public/img/logo.svg" alt="Logo">
                </picture>
            </router-link>

            <div class="menu">
                <router-link :to="{ name: 'home' }" class="logo_burger logo flex">
                    <picture>
                        <source srcset="../../../public/img/logo_tablet.svg" media="(max-width: 1024px)">
                        <img class="logo__img" src="../../../public/img/logo.svg" alt="Logo">
                    </picture>
                </router-link>

                <nav class="nav header__nav">
                    <ul class="nav__list list-reset flex">
                        <li class="nav__item">
                            <router-link to="/textbook" class="nav__link">
                                Учебник
                            </router-link>
                        </li>
                        <li class="nav__item">
                            <router-link to="/service" class="nav__link">
                                Сервисы РКИ
                            </router-link>
                        </li>
                        <li class="nav__item">
                            <a target="_blank" href="https://kurs.rus.study/" class="nav__link">
                                Курсы для педагогов
                            </a>
                        </li>
                        <li class="nav__item">
                            <router-link to="/news" class="nav__link">
                                Анонсы и новости
                            </router-link>
                        </li>
                    </ul>
                </nav>
                <div class="flex header__item">
                    <a class="phone__link flex" href="tel:+79993333303">
                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.2181 1.91859C6.01417 1.71466 5.73759 1.6001 5.44919 1.6001C3.04699 1.6001 1.09961 3.54747 1.09961 5.94968V8.00139C1.09961 9.31453 1.4159 10.6083 2.02172 11.7734C3.95981 15.5005 6.99923 18.5399 10.7263 20.478C11.8914 21.0838 13.1852 21.4001 14.4983 21.4001H17.4744C19.3661 21.4001 20.8996 19.8666 20.8996 17.9749C20.8996 17.116 20.4703 16.3139 19.7557 15.8375C19.3793 15.5866 17.7913 14.5279 17.5883 14.4776C17.3987 14.4306 17.2005 14.4306 17.0109 14.4776C16.808 14.5279 15.0762 15.7617 14.5328 16.0031C13.9893 16.2445 13.3755 16.2756 12.8105 16.0902C12.6162 16.0265 11.4485 15.4935 10.6608 14.9677C9.22362 14.0083 8.47741 13.2853 7.53198 11.8389C7.10188 11.1808 6.64994 10.2174 6.59259 10.0585C6.35843 9.40967 6.44538 8.44818 6.93202 7.80115C7.41866 7.15412 8.85479 5.84491 8.94382 5.57092C9.02213 5.32991 9.02213 5.07029 8.94382 4.82928C8.88103 4.63602 6.2181 1.91859 6.2181 1.91859Z"
                                stroke="#0A2B49" stroke-width="2" stroke-miterlimit="1.41421" stroke-linejoin="round" />
                        </svg>
                        <span class="link-span">8 (999) 333–33–03</span></a>
                    <a target="_blank" href="https://rus.study/login" class="btn-reset header__btn flex">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.5152 6.36908C15.5152 8.54475 13.7514 10.3085 11.5758 10.3085C9.40009 10.3085 7.63636 8.54475 7.63636 6.36908C7.63636 4.19341 9.40009 2.42969 11.5758 2.42969C13.7514 2.42969 15.5152 4.19341 15.5152 6.36908Z" />
                            <path
                                d="M4 20.46C4 17.1965 6.64559 14.5509 9.90909 14.5509H13.2424C16.5059 14.5509 19.1515 17.1965 19.1515 20.46C19.1515 21.5478 18.2697 22.4297 17.1818 22.4297H5.9697C4.88186 22.4297 4 21.5478 4 20.46Z" />
                        </svg>
                        Вход
                    </a>
                </div>
            </div>

            <div class="menu-btn" @click.prevent="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>
    </header>
</template>

<script>
export default {
    methods: {
        burger() {
            let menuBtn = document.querySelector(".menu-btn");
            let menu = document.querySelector(".menu");
            menuBtn.classList.toggle("active");
            menu.classList.toggle("active");
            // document.body.classList.toggle("noscroll");
        },
        enterToAdmin(){
            window.location.href = '/admin'
        }
    }
}
</script>
