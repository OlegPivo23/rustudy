<template>
    <div class="modal__offer offer">
        <div class="modal__overlay low">
            <div class="modal__window">
                <button @click="$emit('close-modal')" class="btn-reset btn-close"></button>
                <ul class="offer__tabs tabs list-reset">
                    <li :class="{active: activeTab == tab.name, disabled: activeTab != tab.name}" v-for="tab in tabs"
                        :key="tab.id" class="tabs__item">
                        <a class="tabs__link">{{ tab.name }}</a>
                    </li>
                </ul>
                <Form @InvalidSubmit="onInvalidSubmit" @submit="submitForm" class="offer__form form">
                    <div v-if="activeTab == 'Информация'" class="form__information information">
                        <div class="information__left">
                            <div>
                                <span class="form__text">Ф.И.О *</span>
                                <label for="" class="form__label">
                                    <button class="modal__btn hidden" @click.prevent="clearInput"></button>
                                    <Field :class="{'error-input': errorFio}" class="form__input" name="fio"
                                           v-model="fio" type="text" placeholder="Введите Ф.И.О" :rules="validateFio"
                                           @input="inputChange" @keydown="deleteNumber" @validateOnBlur="onBlur()"/>
                                    <span v-show="errorFio" class="error-icon"></span>
                                    <ErrorMessage class="form__error" name="fio"/>
                                </label>
                            </div>

                            <div>
                                <span class="form__text">Должность</span>
                                <label for="" class="form__label">
                                    <button class="modal__btn hidden" @click.prevent="clearInput"></button>
                                    <input class="form__input" name="job" v-model="job" type="text"
                                           placeholder="Введите должность" @input="inputChange"
                                           @keydown="deleteNumber"/>
                                </label>
                            </div>

                            <div>
                                <span class="form__text">Тип новости *</span>
                                <label for="" class="form__label">
                                    <multiselect v-model="type" :options="options" label="label" placeholder="Выберите тип новости" select-label="" :searchable="false" @update:modelValue="updateValueAction"></multiselect>
                                    <span v-show="this.errorType" class="error-icon"></span>
                                    <span v-show="this.errorType" class="form__error">Выберите тип новости</span>
                                </label>

                            </div>

                            <div>
                                <span class="form__text">Название новости *</span>
                                <label for="" class="form__label">
                                    <button class="modal__btn hidden" @click.prevent="clearInput"></button>
                                    <Field :class="{'error-input': errorTitle}" class="form__input" name="title"
                                           v-model="title" type="text" placeholder="Введите название"
                                           :rules="validateTitle" @input="inputChange" @keydown="deleteNumber"/>
                                    <span v-show="errorTitle" class="error-icon"></span>
                                    <ErrorMessage class="form__error" name="title"/>
                                </label>
                            </div>

                            <div>

                            </div>

                            <div>
                                <span class="form__text">Вставьте ссылку на Вашу видеоновость</span>
                                <label for="" class="form__label">

                                    <button class="modal__btn hidden" @click.prevent="clearInput"></button>
                                    <input class="form__input" name="link" v-model="link" type="text"
                                           placeholder="Ссылка на ваш видеоматериал" @input="inputChange"/>
                                </label>
                            </div>

                            <div>
                                <span class="form__text">Загрузите файл</span>
                                <div class="form__label">
                                    <DropZone
                                        ref="dropzone"
                                        :maxFiles="1"
                                        :uploadOnDrop="true"
                                        :multipleUpload="true"
                                        :parallelUpload="3"
                                        :maxFileSize="Number(131072000)"
                                        @errorAdd="onError"
                                        @removedFile="onFileRemove"
                                        @sending="onFileAdd"
                                        :acceptedFiles =" ['jpg', 'jpeg', 'png', 'webp', 'svg'] "
                                    />
                                    <cropper
                                        style="max-width: 560px"
                                        ref="cropperImage"
                                        :key="cropperKey"
                                        v-if="cropImage"
                                        class="cropper"
                                        :src="cropImage.thumbnail"
                                        @change="validatefile"
                                    />

                                    <div v-if="previewCropImage" class="previewCropImage">
                                        <span class="form__text">Превью изображения</span>
                                        <img :src="previewCropImage" size="300px">
                                    </div>

                                    <div class="d-flex previewCropImage_сut" v-if="cropImage && !previewCropImage">
                                        <button class="modal_form_next" type="button" @click="uploadImage">
                                            Обрезать
                                        </button>
                                    </div>
                                    <span class="form__error" v-show="errorFile">Изображение не загружено, попробуйте снова</span>
                                </div>
                            </div>


                        </div>

                        <div class="information__right">
                            <div style="height: 50%;margin-bottom: 30px;">
                                <span class="form__text">Описание новости *</span>
                                <label for="" class="form__label h-100">

                                    <button class="modal__btn hidden" @click.prevent="clearInput"></button>

                                    <Field as="textarea" :class="{'error-input': errorDescr}" class="form__input h-100"
                                           name="descr" v-model="descr" type="field" placeholder="Введите описание"
                                           :rules="validateDescr" @input="inputChange"/>
                                    <span v-show="errorDescr" class="error-icon"></span>
                                    <ErrorMessage class="form__error" name="descr"/>
                                </label>
                            </div>
                            <div style="height: 50%;">
                                <span class="form__text">Краткое описание новости *</span>
                                <label for="" class="form__label h-100">

                                    <button class="modal__btn hidden" @click.prevent="clearInput"></button>

                                    <Field as="textarea" :class="{'error-input': errorShortDescr}" class="form__input h-100"
                                           name="shortDescr" v-model="shortDescr" type="field" placeholder="Введите краткое описание"
                                           :rules="validateShortDescr" @input="inputChange"/>
                                    <span v-show="errorShortDescr" class="error-icon"></span>
                                    <ErrorMessage class="form__error" name="shortDescr"/>
                                </label>
                            </div>

                        </div>

                        <div class="offer__btn">
                            <button type="submit" class="btn-reset btn-background">Далее</button>
                            <p class="policy">Нажимая на кнопку «Далее», вы подтверждаете, что ознакомлены с <a
                                class="policy__link" target="_blank"
                                href="docs/Согласие_на_обработку_ПДн_на_сайте_учебник.pdf">Пользовательским
                                соглашением</a>  и <a target="_blank" class="policy__link"
                                                      href="docs/политика_обработки_ПДн_на_сайте_учебник.pdf">Политикой
                                о персональных данных</a> </p>
                        </div>
                    </div>

                    <div class="verification" v-if="activeTab == 'Проверка'">
                        <p class="verification__title">Спасибо, что предложили новость! Мы ценим ваш вклад.</p>
                        <p class="verification__text">Обратите внимание, что все новости проходят модерацию
                            перед публикацией, чтобы гарантировать качество контента нашего сайта. Мы постараемся
                            рассмотреть ваш материал как можно скорее и опубликовать его, если он соответствует нашим
                            критериям. Спасибо за ваше терпение и понимание!</p>
                        <button type="button" class="btn-reset btn-background verification__btn"
                                @click.prevent="$emit('close-modal')">Готово
                        </button>
                    </div>
                </Form>
            </div>
        </div>
    </div>
</template>

<script>
import {Form, Field, ErrorMessage, configure} from 'vee-validate';
import DropZone from 'dropzone-vue';
import 'dropzone-vue/dist/dropzone-vue.common.css';
import {Cropper} from 'vue-advanced-cropper';
import 'vue-advanced-cropper/dist/style.css';
import Multiselect from 'vue-multiselect'
import axios from "axios";



configure({
    validateOnBlur: false,
    validateOnChange: true,
    validateOnInput: true,
    validateOnModelUpdate: true,
});


export default {
    components: {Cropper, Form, Field, ErrorMessage, DropZone, Multiselect},
    data() {
        return {
            activeTab: 'Информация',
            tabs: [
                {
                    id: 1,
                    name: 'Информация'
                },

                {
                    id: 2,
                    name: 'Проверка'
                },

            ],

            fio: '',
            job: '',
            title: '',
            link: '',
            descr: '',
            shortDescr: '',
            errorFio: false,
            errorJob: false,
            errorTitle: false,
            errorDescr: false,
            errorShortDescr: false,
            errorFile: false,
            errorType: false,
            cropImage: null,
            cropperImage: null,
            cropperKey: 0,
            previewCropImage: '',
            dropzone: null,
            type: '',
            options: [{label: 'Анонс',value:'activity'},{label: 'Новости',value: 'publication'} , {label: 'Мероприятие',value: 'event'}],

        }
    },

    computed: {
        validate() {
            if (this.validateFio(this.fio) == true && this.validateTitle(this.title) == true && this.validateDescr(this.descr) == true && this.validateShortDescr(this.shortDescr) == true && this.type.value.length > 0 && this.validatefile(this.previewCropImage))
                return true

        },
    },

    methods: {
        updateValueAction() {
            document.querySelector('.multiselect__tags').classList.remove('error-input');
            this.errorType = false
        },

        clearInput(e) {
            e.target.classList.add('hidden');
            if (e.target.nextSibling.getAttribute('name') == 'fio') {
                this.fio = '';
                this.errorFio = true
            }
            if (e.target.nextSibling.getAttribute('name') == 'job') {
                this.job = '';
                this.errorJob = true
            }

            if (e.target.nextSibling.getAttribute('name') == 'title') {
                this.title = '';
                this.errorTitle = true
            }

            if (e.target.nextSibling.getAttribute('name') == 'link') {
                this.link = '';
            }

            if (e.target.nextSibling.getAttribute('name') == 'descr') {
                this.descr = '';
                this.errorDescr = true
            }

            if (e.target.nextSibling.getAttribute('name') == 'shortDescr') {
                this.shortDescr = '';
                this.errorShortDescr = true
            }

        },

        changeTab(name) {
            this.activeTab = name;
        },

        inputChange(e) {
            const btn = e.target.previousSibling;
            if (e.target.getAttribute('name') == 'fio') {
                this.errorFio = false
            }

            if (e.target.getAttribute('name') == 'job') {
                this.errorJob = false
            }

            if (e.target.getAttribute('name') == 'title') {
                this.errorTitle = false
            }

            if (e.target.getAttribute('name') == 'descr') {
                this.errorDescr = false
            }

            if (e.target.getAttribute('name') == 'shortDescr') {
                this.errorShortDescr = false
            }


            if (e.target.value != '') {
                btn.classList.remove('hidden')

            } else btn.classList.add('hidden')

        },

        validateFio(value) {
            if (!value) {
                return 'Введите Ф.И.О';
            }

            return true;
        },

        validateTitle(value) {
            if (!value) {
                return 'Введите название новости';
            }

            return true;
        },

        validateDescr(value) {
            if (!value) {
                return 'Введите описание новости';
            }

            return true;
        },

        validateShortDescr(value) {
            if (!value) {
                return 'Введите краткое описание новости';
            }

            return true;
        },
        validatefile(value) {
            if (!value) {
                document.querySelector('.dropzone').classList.add('error-input');
                this.errorFile = true
                return 'Выберите изображение';
            }
            this.errorFile = false
            return true;
        },


        deleteNumber(e) {
            if (e.key.match(/[0-9]/)) return e.preventDefault();
        },

        onInvalidSubmit(e) {
            if (e.errors.fio) {
                this.errorFio = true
            }

            if (e.errors.job) {
                this.errorJob = true
            }

            if (e.errors.title) {
                this.errorTitle = true
            }

            if (e.errors.descr) {
                this.errorDescr = true
            }

            if (e.errors.shortDescr) {
                this.errorShortDescr = true
            }

            if (this.type == '') {
                document.querySelector('.multiselect__tags').classList.add('error-input');
                this.errorType = true
            }

            if (this.previewCropImage == '') {
                document.querySelector('.dropzone').classList.add('error-input');
                this.errorFile = true
            }

        },

        onError() {
            this.errorFile = true
        },

        onFileRemove() {
            setTimeout(() => {
                const text = document.querySelector('.dropzone__message.dropzone__message--style.dropzone-clickable');
                text.innerHTML =
                    `<div class="file">
                            <p class="file__title">Загрузка файлов</p>
                            <p>Чтобы начать загрузку, выберите файлы на компьютере или перетащите их в это окно.</p>
                            <p class="file__size">Максимальный размер файлов 125 MB</p>
                            <button class="btn-reset btn-outline file__btn">Выбрать файлы</button>
                        </div>`
            }, 5)
            this.cropImage = null
            this.previewCropImage = ''


        },

       async submitForm() {
            if (this.validate == true && this.type.value && this.previewCropImage){
                try {
                    const newsData = {
                        news_type: this.type.value,
                        title: this.title,
                        shortDescr: this.shortDescr,
                        descr: this.descr,
                        fio: this.fio
                    };
                    if(this.previewCropImage)newsData.img = this.previewCropImage
                    const response = await axios.post('/api/addnews', newsData);
                    console.log(response)
                    this.activeTab = 'Проверка'
                }catch (error){
                    if (error.response) {
                        console.error('Error response:', error.response.data);
                    } else if (error.request) {
                        console.error('Error request:', error.request);
                    } else {
                        console.error('Error:', error.message);
                    }
                }
            }else {
                console.log('submitForm false')
            }
        },
        onFileAdd(e) {
            this.cropperKey += 1;
            this.cropImage = this.$refs.dropzone.all[Object.keys(this.$refs.dropzone.all)[0]];

        },

        uploadImage() {
            const {canvas} = this.$refs.cropperImage.getResult();
            if (canvas) {
                this.previewCropImage = canvas.toDataURL(); // вывод превью
            }
            this.cropImage = null
        },
    },


    mounted() {
        const text = document.querySelector('.dropzone__message.dropzone__message--style.dropzone-clickable');
        text.innerHTML =
            `<div class="file">
                            <p class="file__title">Загрузка фото</p>
                            <p>Чтобы начать загрузку, выберите файлы на компьютере или перетащите их в это окно.</p>
                            <p class="">Допустимый формат: jpg, jpeg, png, webp, svg</p>
                            <p class="file__size">Максимальный размер файлов 125 MB</p>

                            <button class="btn-reset btn-outline file__btn">Выбрать файлы</button>
                        </div>`
    }

}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style>
.previewCropImage{
    margin-top: 20px;
}
.previewCropImage_сut{
    margin-top: 20px;
}
</style>


