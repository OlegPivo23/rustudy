<template>
    <teleport to="body">
        <div class="modal-overlay" @click.self="close">
            <div class="modal-content">

                <div class="flex" style="justify-content: end">
                    <button class="close-button" @click="close">
                        <img src="/img/close-after-suggest.svg" alt="close_btn">
                    </button>
                </div>
                <div class="modal-content__text">
                    Мы рады приветствовать вас в нашем образовательном сообществе
                </div>
                <div class="modal-content__girl">
                    <img src="/img/girl-after-suggest.svg" alt="">
                </div>

            </div>
        </div>
    </teleport>
</template>

<script setup>
import {defineEmits, onMounted, watch} from 'vue';

const props = defineProps({
    showModal: {
        type: Boolean,
        required: true
    }
});

const emit = defineEmits(['close']);

function close() {
    emit('close');
}


</script>

<style scoped>
.modal-overlay {
    z-index: 3;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: url("/img/bg-after-suggest.svg");
    border-radius: 40px;
    position: relative;
    width: 1000px;
    height: 652px;
    background-color: white;
    padding: 20px;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
}

.close-button {
    margin-top: 20px;
    background: transparent;
    max-width: 40px;
    position: relative;
    z-index: 5;

}
.close-button img {
    position: relative;
    z-index: 1;

}


.modal-content__text {
    padding-top: 3rem;
    display: flex;
    justify-content: center;
    color: #0A2B49;
    font-size: 40px;
    font-family: Repo;
    text-align: center;
    max-width: 639px;
    margin: 0 auto;
    line-height: 1;
}
.modal-content__girl {
    bottom: 0;
    left: 0;
    right: 0;
    padding-top: 40px;
    position: absolute;
    display: flex;
    justify-content: center;
}

.modal-content__girl img{
    position: relative;
    max-width: 321px;
}

.close-button {
}

@media (max-width: 1200px) {
    .modal-content{
        max-width: 622px;
        max-height: 469px;
    }
    .modal-content__text{
        font-size: 24px;
        max-width: 451px;
    }
    .modal-content__girl img{
        max-width: 237px;
    }
}
@media (max-width: 600px) {
    .modal-content{
        max-width: 100%;
        max-height: 100%;
    }
    .modal-content__text{
        font-size: 24px;
        max-width: 451px;
        padding-top: 6rem;
    }
}
.no-scroll {
    overflow: hidden;
    height: 100%;
}
</style>
