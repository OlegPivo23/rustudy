<template>
    <footer class="container footer flex">
        <div class="footer_left flex">
            <router-link :to="{ name: 'home' }" class="footer__logo">
                <img src="../../../public/img/logo_footer.svg" alt="logo">
            </router-link>
            <div class="flex">
                <small class="footer_small small_data">&copy;&nbsp;{{date.getFullYear()}}</small>
                <small class="footer_small">Обрсоюз«Союз участников отношений в сфере образования»</small>
            </div>
        </div>

        <div class="footer__center">
            <h5 class="footer_text">
                Сетевое издание &laquo;Учим русский язык&raquo;. Свидетельство о&nbsp;регистрации СМИ Эл &#8470;
                ФС77&mdash;79469 выдано Федеральной службой по&nbsp;надзору в&nbsp;сфере связи, информационных
                технологий и&nbsp;массовых коммуникаций (Роскомнадзор) 27&nbsp;ноября 2020&nbsp;года. Учредитель
                (соучредитель): ООО СП&nbsp;&laquo;СОДРУЖЕСТВО&raquo;. Главный редактор: Мишина Н.Ю.,
                тел.&nbsp;<span><a class="footer_text-link" href="tel:=+74962191213">+7 496 219-12-13</a></span>, email:
                <span><a class="footer_text-link" href="mailto:mail@concord.education">mail@concord.education</a></span>
            </h5>
            <div class="list-reset footer__personal">
                <h4 class="personal_item"><a class="footer_link link_personal"
                                             href="docs/Согласие_на_обработку_ПДн_на_сайте_учебник.pdf" target="_blank">Пользовательское
                    соглашение</a></h4>
                <h4 class="personal_item"><a class="footer_link link_personal"
                                             href="docs/политика_обработки_ПДн_на_сайте_учебник.pdf" target="_blank">Политика о
                    персональных данных</a></h4>
            </div>
        </div>

        <div class="footer__right">
            <router-link :to="{ name: 'home' }" class="footer__logo_link"> <img src="../../../public/img/logo_tablet.svg"
                                                                                alt="logo"></router-link>
            <ul class="footer_list footer_contacts list-reset">
                <li class="footer__item flex">
                    <a class="footer_link flex" href="tel:=+79993333303"><svg width="22" height="23" viewBox="0 0 22 23"
                                                                              fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.2181 1.91859C6.01417 1.71466 5.73759 1.6001 5.44919 1.6001C3.04699 1.6001 1.09961 3.54747 1.09961 5.94968V8.00139C1.09961 9.31453 1.4159 10.6083 2.02172 11.7734C3.95981 15.5005 6.99923 18.5399 10.7263 20.478C11.8914 21.0838 13.1852 21.4001 14.4983 21.4001H17.4744C19.3661 21.4001 20.8996 19.8666 20.8996 17.9749C20.8996 17.116 20.4703 16.3139 19.7557 15.8375C19.3793 15.5866 17.7913 14.5279 17.5883 14.4776C17.3987 14.4306 17.2005 14.4306 17.0109 14.4776C16.808 14.5279 15.0762 15.7617 14.5328 16.0031C13.9893 16.2445 13.3755 16.2756 12.8105 16.0902C12.6162 16.0265 11.4485 15.4935 10.6608 14.9677C9.22362 14.0083 8.47741 13.2853 7.53198 11.8389C7.10188 11.1808 6.64994 10.2174 6.59259 10.0585C6.35843 9.40967 6.44538 8.44818 6.93202 7.80115C7.41866 7.15412 8.85479 5.84491 8.94382 5.57092C9.02213 5.32991 9.02213 5.07029 8.94382 4.82928C8.88103 4.63602 6.2181 1.91859 6.2181 1.91859Z"
                            stroke="#0A2B49" stroke-width="2" stroke-miterlimit="1.41421" stroke-linejoin="round" />
                    </svg>
                        <span class="link-span">8 (999) 333–33–03</span></a>
                </li>
                <li class="footer__item  flex">
                    <a class="footer_link footer_link_mail flex" href="mailto:book@rus.study">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_2842_1055)">
                                <path
                                    d="M0 9.6001V19.2001C0 19.8366 0.252856 20.4471 0.702944 20.8972C1.15303 21.3472 1.76348 21.6001 2.4 21.6001H21.6C22.2365 21.6001 22.847 21.3472 23.2971 20.8972C23.7471 20.4471 24 19.8366 24 19.2001V9.6001L12 14.4001L0 9.6001Z" />
                                <path
                                    d="M2.4 2.3999C1.76348 2.3999 1.15303 2.65276 0.702944 3.10285C0.252856 3.55293 0 4.16338 0 4.7999L0 7.1999L12 11.9999L24 7.1999V4.7999C24 4.16338 23.7471 3.55293 23.2971 3.10285C22.847 2.65276 22.2365 2.3999 21.6 2.3999H2.4Z" />
                            </g>
                        </svg>
                        <span class="link-span">book@rus.study</span></a>
                </li>
            </ul>

            <div class="footer_list  list-reset flex">
                <a class="footer_social" href="https://youtube.com/@user-qp6ev7cm2m?si=6pAt1rugMDojUgKx" target="_blank">
                    <img class="social_img youtube" src="../../../public/img/YouTube.svg" alt="YouTube">
                    <img class="social_img youtube_hover" src="../../../public/img/YouTube_hover.svg" alt="YouTube">
                </a>
                <a class="footer_social" href="https://t.me/privetrki" target="_blank">
                    <img class="social_img telegram" src="../../../public/img/telegramm.svg" alt="Telegramm">
                    <img class="social_img telegram_hover" src="../../../public/img/telegram_hover.svg" alt="Telegramm">
                </a>
                <a class="footer_social" href="https://vk.com/public191443996" target="_blank">
                    <img class="social_img vk" src="../../../public/img/vk.svg" alt="VK">
                    <img class="social_img vk_hover" src="../../../public/img/vk_hover.svg" alt="VK">
                </a>
                <a class="footer_social social_hidden" href="#" target="_blank">
                    <img class="social_img facebook" src="../../../public/img/Facebook.svg" alt="Facebook">
                    <img class="social_img facebook_hover" src="../../../public/img/Facebook_hover.svg" alt="Facebook">
                </a>
                <a class="footer_social social_hidden" href="#" target="_blank">
                    <img class="social_img instagram" src="../../../public/img/Instagram.svg" alt="Instagram">
                    <img class="social_img instagram_hover" src="../../../public/img/Instagram_hover.svg" alt="Instagram">
                </a>
            </div>

        </div>
    </footer>
</template>

<script>
export default {
    data() {
        return {
            date: new Date()
        }
    }
}
</script>
