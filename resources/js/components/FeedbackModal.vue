<template>
    <div class="modal__offer feedback">
        <div class="modal__overlay">
            <div class="modal__window">
                <button class="btn-reset btn-close" @click="$emit('close-feedback')"></button>
                <div class="feedback__left">
                    <div>
                        <p class="modal__title">Мы заинтересованы в вашем мнении</p>
                    <p class="modal__text">Звоните, пишите, задавайте вопросы</p>
                    </div>

                    <img src="img/feedback-img.webp" alt="">

                </div>
                <div class="feedback__block">
                        <ul class="list-reset feedback__contacts contacts">
                            <li class="contacts__item">
                                <a class="contacts__link tel" href="tel:89993333303">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                    <path d="M7.72005 2.4181C7.51613 2.21417 7.23954 2.09961 6.95115 2.09961C4.54894 2.09961 2.60156 4.04699 2.60156 6.44919V8.5009C2.60156 9.81404 2.91785 11.1079 3.52367 12.2729C5.46176 16 8.50118 19.0394 12.2283 20.9775C13.3933 21.5833 14.6871 21.8996 16.0003 21.8996H18.9764C20.8681 21.8996 22.4016 20.3661 22.4016 18.4744C22.4016 17.6155 21.9723 16.8134 21.2576 16.337C20.8813 16.0861 19.2932 15.0274 19.0903 14.9771C18.9007 14.9301 18.7025 14.9301 18.5129 14.9771C18.3099 15.0274 16.5782 16.2612 16.0347 16.5026C15.4912 16.744 14.8775 16.7751 14.3124 16.5898C14.1181 16.526 12.9505 15.993 12.1628 15.4672C10.7256 14.5078 9.97936 13.7848 9.03393 12.3384C8.60383 11.6803 8.15189 10.7169 8.09454 10.558C7.86038 9.90918 7.94733 8.94769 8.43397 8.30066C8.92062 7.65363 10.3567 6.34442 10.4458 6.07043C10.5241 5.82942 10.5241 5.5698 10.4458 5.32879C10.383 5.13553 7.72005 2.4181 7.72005 2.4181Z" stroke="#0A2B49" stroke-width="2" stroke-miterlimit="1.41421" stroke-linejoin="round"/>
                                    </svg>
                                    <span>8 (999) 333–33–03</span>
                                </a>
                            </li>
                            <li class="contacts__item">
                                <a class="contacts__link email" href="mailto:info@example.com">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                    <path d="M21.2262 3.27344H3.77166C2.57166 3.27344 1.60075 4.25526 1.60075 5.45526L1.58984 18.5462C1.58984 19.7462 2.57166 20.728 3.77166 20.728H21.2262C22.4262 20.728 23.408 19.7462 23.408 18.5462V5.45526C23.408 4.25526 22.4262 3.27344 21.2262 3.27344ZM21.2262 7.63707L12.4989 13.0916L3.77166 7.63707V5.45526L12.4989 10.9098L21.2262 5.45526V7.63707Z" fill="#0A2B49"/>
                                    </svg>
                                    <span>info@example.com</span>
                                </a>
                            </li>
                        </ul>
                    <ul class="feedback__social social list-reset">
                        <li>
                            <a class="social__youtube" target="_blank" href="https://youtube.com/@user-qp6ev7cm2m?si=6pAt1rugMDojUgKx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                                <rect y="0.5" width="40" height="40" rx="20"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M29.7816 12.2835C30.8525 12.5718 31.6968 13.4161 31.9851 14.4869C32.5205 16.4432 32.4999 20.5207 32.4999 20.5207C32.4999 20.5207 32.4999 24.5775 31.9851 26.5338C31.6968 27.6047 30.8525 28.449 29.7816 28.7373C27.8253 29.2521 19.9999 29.2521 19.9999 29.2521C19.9999 29.2521 12.1952 29.2521 10.2183 28.7167C9.14744 28.4284 8.30313 27.5841 8.01482 26.5132C7.5 24.5775 7.5 20.5001 7.5 20.5001C7.5 20.5001 7.5 16.4432 8.01482 14.4869C8.30313 13.4161 9.16803 12.5512 10.2183 12.2629C12.1746 11.748 19.9999 11.748 19.9999 11.748C19.9999 11.748 27.8253 11.748 29.7816 12.2835ZM24.0156 20.5001L17.5082 24.248V16.7521L24.0156 20.5001Z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="social__telegram" target="_blank" href="https://t.me/privetrki">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                                <path d="M20 40.5C31.0457 40.5 40 31.5457 40 20.5C40 9.45431 31.0457 0.5 20 0.5C8.95431 0.5 0 9.45431 0 20.5C0 31.5457 8.95431 40.5 20 40.5Z" fill="url(#paint0_linear_5502_3843)"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.05173 20.2879C14.8821 17.7477 18.77 16.0731 20.7153 15.2639C26.2695 12.9538 27.4236 12.5525 28.1759 12.5392C28.3413 12.5363 28.7112 12.5773 28.9509 12.7717C29.1532 12.9359 29.2089 13.1577 29.2355 13.3134C29.2621 13.469 29.2953 13.8236 29.2689 14.1007C28.968 17.2632 27.6656 24.9376 27.003 28.4797C26.7227 29.9784 26.1706 30.481 25.6362 30.5301C24.4748 30.637 23.5928 29.7626 22.4679 29.0252C20.7077 27.8713 19.7132 27.153 18.0046 26.0271C16.03 24.7258 17.31 24.0106 18.4354 22.8418C18.7299 22.5359 23.8472 17.8813 23.9462 17.4591C23.9586 17.4063 23.9701 17.2094 23.8532 17.1055C23.7362 17.0015 23.5636 17.0371 23.4391 17.0654C23.2625 17.1054 20.4505 18.9641 15.003 22.6413C14.2048 23.1894 13.4818 23.4565 12.8341 23.4425C12.12 23.427 10.7463 23.0387 9.72514 22.7068C8.47264 22.2996 7.47717 22.0844 7.56386 21.3929C7.60901 21.0328 8.10496 20.6644 9.05173 20.2879Z"/>
                                <defs>
                                <linearGradient id="paint0_linear_5502_3843" x1="20" y1="0.5" x2="20" y2="40.2033" gradientUnits="userSpaceOnUse">
                                <stop/>
                                <stop offset="1"/>
                                </linearGradient>
                                </defs>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="social__vk" target="_blank" href="https://vk.com/public191443996">
                                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect y="0.5" width="40" height="40" rx="20"/>
                                <path d="M21.5064 28.7556C12.4871 28.7556 7.01359 22.498 6.80078 12.0996H11.3688C11.5112 19.738 14.9864 22.9796 17.6504 23.6404V12.0996H22.0296V18.69C24.5992 18.4052 27.2872 15.4068 28.1928 12.0996H32.4984C31.8088 16.1684 28.8824 19.1668 26.812 20.4036C28.8824 21.4036 32.2135 24.0212 33.4984 28.7556H28.764C27.764 25.5908 25.3128 23.1396 22.0296 22.8068V28.7556H21.5064Z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>

                    </div>
                <div class="feedback__right">
                    <Form @InvalidSubmit="onInvalidSubmit" class="feedback__form form">
                        <p class="form__title">Задать вопрос</p>
                        <div>
                            <span class="form__text">Ф.И.О</span>
                            <label for="" class="form__label">
                                <button class="modal__btn hidden" @click.prevent="clearInput"></button>
                                <Field class="form__input" name="fio" v-model="fio" type="text" placeholder="Введите Ф.И.О" @input="inputChange" @keydown="deleteNumber"/>
                                <!-- <span v-show="errorFio" class="error-icon"></span> -->
                                <!-- <ErrorMessage class="form__error" name="fio" /> -->
                            </label>
                        </div>
                        <label for="" class="form__label">
                                <span class="form__text">Телефон</span>
                                <vue-tel-input v-model="phone" @country-changed="countryChanged" @validate="customValidate" @keydown="deleteLetter"></vue-tel-input>

                        </label>
                        <div>
                            <span class="form__text">E-mail *</span>
                            <label for="" class="form__label">
                                <button class="modal__btn hidden" @click.prevent="clearInput"></button>
                                <Field :class="{'error-input': errorEmail}" class="form__input" name="email" v-model="email" type="text" placeholder="Введите E-mail" :rules="validateEmail" @input="inputChange"/>
                                <span v-show="errorEmail" class="error-icon"></span>
                                <ErrorMessage class="form__error" name="email" />
                            </label>
                        </div>
                        <span class="form__text">Вопрос *</span>
                            <label for="" class="form__label">
                                    <button class="modal__btn hidden" @click.prevent="clearInput"></button>
                                    <Field as="textarea" :class="{'error-input': errorQuestion}" class="form__input" name="question" v-model="question" type="field" placeholder="Ваш вопрос" :rules="validateQuestion" @input="inputChange"/>
                                    <span v-show="errorQuestion" class="error-icon"></span>
                                    <ErrorMessage class="form__error" name="question" />
                            </label>

                        <div class="feedback__btns">
                            <button class="btn-background btn-reset feedback__btn" type="submit">Отправить</button>
                        <p class="policy">Нажимая на&nbsp;кнопку Отправить, я&nbsp;соглашаюсь с <a class="policy__link" target="_blank" href="docs/политика_обработки_ПДн_на_сайте_учебник.pdf">Политикой о&nbsp;персональных данных</a> и <a class="policy__link" target="_blank" href="docs/Согласие_на_обработку_ПДн_на_сайте_учебник.pdf">Пользовательским соглашением</a></p>
                        </div>

                    </Form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { VueTelInput } from 'vue-tel-input';
import { Form, Field, ErrorMessage, configure } from 'vee-validate';
configure({
  validateOnBlur: false,
  validateOnChange: true,
  validateOnInput: true,
  validateOnModelUpdate: true,

});
    export default {
        data() {
            return {
                phone: 0,
                fio: '',
                email: '',
                question: '',
                errorEmail: false,
                errorQuestion: false
            }
        },
        components: {VueTelInput, Form, Field, ErrorMessage },
        methods: {
            onInvalidSubmit(e) {

                if (e.errors.email) {
                    this.errorEmail = true
                }

                if (e.errors.question) {
                    this.errorQuestion = true
                }
            },

            inputChange(e) {
                const btn = e.target.previousSibling;
                if (e.target.getAttribute('name') == 'fio') {
                        this.errorFio = false
                    }

                if (e.target.getAttribute('name') == 'email') {
                        this.errorEmail = false
                    }

                if (e.target.getAttribute('name') == 'question') {
                        this.errorQuestion = false
                    }


                if (e.target.value != '') {
                    btn.classList.remove('hidden')

                } else btn.classList.add('hidden')
            },

            countryChanged(country) {
                this.activeCountry = country.dialCode
                this.phone = `+ ${country.dialCode}`
            },

            clearInput(e) {
                e.target.classList.add('hidden');
                if (e.target.nextSibling.getAttribute('name') == 'fio')  {
                    this.fio = '';
                    this.errorFio = true
                }
                if (e.target.nextSibling.getAttribute('name') == 'email')  {
                    this.email = '';
                    this.errorEmail = true
                }

                if (e.target.nextSibling.getAttribute('name') == 'question')  {
                    this.question = '';
                    this.errorQuestion = true
                }
            },

            validateEmail(value) {
                if (!value) {
                    return 'Введите E-mail!';
                }
                const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
                if (!regex.test(value)) {
                    return 'Введите корректный E-mail!';
                }

            return true;
            },

            validateQuestion(value) {
                if (!value) {
                     return 'Введите вопрос';
                }

                return true;
            },

            deleteNumber(e) {
                if( e.key.match(/[0-9]/) ) return e.preventDefault();
            },

            deleteLetter(e) {
                if (e.key.match(/^[a-zA-Zа-яА-Я]$/)) return e.preventDefault();
            },
        }
    }
</script>
