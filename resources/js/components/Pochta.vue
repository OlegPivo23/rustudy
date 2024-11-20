<template>
    <div>
        <div class="order__block pochta" v-show="!afterChoice">
            <div class="pochta__box">
                <form class="form pochta__form">
                    <div class="form__search search">
                        <input v-model="city" class="form__input" id="search-city" type="text" @input="onInput()"
                            placeholder="Найти">

                        <div class="search__block" v-show="showList">
                            <ul v-if="listAddress.length > 0" class="pochta__list list-reset search__list">
                                <li v-for="(address, index) in listAddress" :key="index" class="pochta__item item"
                                    @click="setActiveCity(address)">
                                    <p class="item__address">{{ address.address }}</p>
                                </li>
                            </ul>
                            <p v-else>Ничего не найдено</p>
                        </div>

                    </div>

                    <div class="form__btns">
                        <a :class="{active: activeTab == tab.id}" class="btn-reset pochta__btn" v-for="tab in tabs"
                        :key="tab.id" @click="changeTab(tab)">{{ tab.name }}</a>
                    </div>

                </form>
                <span class="form__error">{{ this.addressError }}</span>
            </div>


            <div style="position: relative;">

                <div class="pochta__map" v-show="activeTab == 1">
                    <div id="map" style="width: 100%; height: 454px"></div>

                </div>

                <div class="" v-show="activeTab == 2">

                    <div class="pochta__addresses addresses">
                        <div class="addresses__block" :class="{open: activeList}">
                            <div class="flex pochta__block">
                                <p class="">Адрес</p>
                                <p class="">Режим работы</p>
                            </div>
                            <ul class="pochta__list list-reset">
                                <li v-for="(address, index) in listAddress" :key="index" class="pochta__item item"
                                    @click="openBalloon(address)">
                                    <p class="item__address">{{ address.address }}</p>
                                    <p class="item__time">{{ address.time[0] }}</p>
                                </li>
                            </ul>
                        </div>


                    </div>


                </div>
                <div class="pochta__balloon balloon">
                    <div class="flex flex-between">
                        <p class="balloon__title">Отделения Почты России</p>
                        <button class="balloon__close btn-reset" @click.prevent="closeBalloon()"></button>
                    </div>

                    <p class="balloon__address">{{ checkAddress.type }} №{{ checkAddress.postal_code }}
                        {{ checkAddress.address }}</p>

                    <p v-if="checkAddress.time" class="balloon__time">{{ checkAddress.time[0] }}</p>
                    <p v-else-if="!checkAddress.time" class="balloon__time"></p>
                    <button type="button" class="btn-reset btn-background balloon__btn"
                            @click="setActiveCity(checkAddress)">Заберу отсюда
                    </button>
                </div>
            </div>
        </div>

        <mapAfter @back="backChoice()" :activeCity="activeCity" v-if="afterChoice"></mapAfter>
    </div>


</template>

<script>
import cities from '@/data/cities.json'
import addressArray from '@/data/address.json'
import postcodeArray from '@/data/postcode.json'
import mapAfter from './mapAfter.vue'
import usePostcodeStore from '@/stores/PostcodeStore.js'

export default {
    components: {mapAfter},
    props: ['addressError'],

    data() {
        return {
            center: [],
            activeTab: 1,
            array: [],
            city: '',
            address: [],
            clientIp: '',
            citiesArray: [],
            showBalloon: false,
            listAddress: [],
            activeAddress: [],
            activeList: false,
            showList: false,
            afterChoice: false,
            activeCity: {},
            tabs: [
                {
                    id: 1,
                    name: 'Карта',
                },
                {
                    id: 2,
                    name: 'Список',
                },
            ]
        }
    },


    mounted() {

        document.addEventListener('click', () => {
            if (this.showList == true) this.showList = false
        })


        const myMap = new ymaps.Map("map", {
            center: [55.751574, 37.573856],
            zoom: 12,
            controls: ['zoomControl', 'fullscreenControl']
        });


        cities.forEach(item => {
            if (item.name == this.city) {
                this.center.push(item.coords[0].lat, item.coords[0].lon)
            }
        })

        var location = ymaps.geolocation.get({
            autoReverseGeocode: false
        })
            .then(response => {
                localStorage.lat = response.geoObjects.position[0]
                localStorage.lon = response.geoObjects.position[1]
                myMap.geoObjects.add(response.geoObjects)
                myMap.setCenter(response.geoObjects.position)
            })
            .catch(err => console.log(err));

        postcodeArray.forEach(postcode => {
            var obj = {
                type: 'FeatureCollection',
                features: postcode.map(function (item) {
                    return {
                        type: 'Feature',
                        properties: {
                            lat: item.data.geo_lat,
                            lon: item.data.geo_lon,
                            type: item.data.type_code,
                            postal_code: item.data.postal_code,
                            address: item.data.address_str,
                            time: [
                                item.data.schedule_mon,
                                item.data.schedule_tue,
                                item.data.schedule_wed,
                                item.data.schedule_thu,
                                item.data.schedule_fri,
                                item.data.schedule_sat,
                                item.data.schedule_sun,
                            ]
                        },
                        geometry: {
                            type: 'Point',
                            coordinates: [item.data.geo_lat, item.data.geo_lon]
                        }
                    }
                })
            };


            var objects = ymaps.geoQuery(obj);

            objects.searchInside(myMap).addToMap(myMap);
            objects.setOptions({
                iconLayout: 'default#image',
                iconImageHref: 'img/map-icon.svg',
                iconImageSize: [22, 28],
            })

            this.map = myMap

            myMap.events.add('boundschange', function () {
                var visibleObjects = objects.searchInside(myMap).addToMap(myMap);
                objects.remove(visibleObjects).removeFromMap(myMap);
            });

            objects.addEvents('mouseenter', function (e) {
                e.get('target').options.set({
                    iconImageHref: 'img/active-map-icon.svg',
                    iconImageSize: [32, 40],
                });
            })
            objects.addEvents('mouseleave', function (e) {
                e.get('target').options.set({
                    iconImageHref: 'img/map-icon.svg',
                    iconImageSize: [22, 28],
                })
            });

            objects.addEvents('click', function (e) {
                const mark = e.get('target')
                mark.options.set({
                    iconImageHref: 'img/active-map-icon.svg',
                    iconImageSize: [32, 40],
                })

                const PostcodeStore = usePostcodeStore();
                PostcodeStore.checkAddress = mark.properties._data

                const balloon = document.querySelector('.pochta__balloon');
                document.querySelector('.balloon__address').textContent = `${mark.properties._data.type} №${mark.properties._data.postal_code} ${mark.properties._data.address}`
                document.querySelector('.balloon__time').textContent = `${mark.properties._data.time}`

                balloon.classList.add('open')
                const closeBalloon = document.querySelector('.balloon__close');
                closeBalloon.addEventListener('click', (e) => {
                    e.preventDefault();
                    balloon.classList.remove('open')
                    mark.options.set({
                        iconImageHref: 'img/map-icon.svg',
                        iconImageSize: [22, 28],
                    })
                })

            })

        })


        ymaps.ready();


        this.createList()
        this.getCity()

    },

    computed: {
        checkAddress() {
            const PostcodeStore = usePostcodeStore()
            return PostcodeStore.checkAddress
        }
    },

    methods: {

        changeTab(tab) {
            this.activeTab = tab.id;
            const balloon = document.querySelector('.balloon');
            const addreesBlock = document.querySelector('.addresses__block')
            balloon.classList.remove('open')
            if (addreesBlock.classList.contains('open')) addreesBlock.classList.remove('open')
        },

        backChoice() {
            this.afterChoice = false;
        },

        openBalloon(item) {
            const PostcodeStore = usePostcodeStore();
            PostcodeStore.checkAddress = item
            const balloon = document.querySelector('.pochta__balloon');
            balloon.classList.add('open')
            this.activeList = true
        },

        closeBalloon() {
            const balloon = document.querySelector('.pochta__balloon');
            balloon.classList.remove('open')
            this.activeList = false
        },

        setActiveCity(item) {
            this.afterChoice = true
            this.activeCity = item
            const PostcodeStore = usePostcodeStore();
            PostcodeStore.checkAddress = item

        },


        onInput() {
            this.showList = true

            this.listAddress = []


            postcodeArray.forEach(postcode => {
                postcode.forEach(item => {
                    const searchTerms = this.city.toLowerCase().trim().split(/\s+/);
                    const addressParts = item.unrestricted_value.toLowerCase().split(/[ ,]/); // Разбиваем на слова и запятые
                    const found = searchTerms.every(term => addressParts.some(part => part.includes(term)));

                    if (found) {
                        this.listAddress.push({
                            lat: item.data.geo_lat,
                            lon: item.data.geo_lon,
                            type: item.data.type_code,
                            postal_code: item.data.postal_code,
                            address: item.unrestricted_value,
                            time: [
                                item.data.schedule_mon,
                                item.data.schedule_tue,
                                item.data.schedule_wed,
                                item.data.schedule_thu,
                                item.data.schedule_fri,
                                item.data.schedule_sat,
                                item.data.schedule_sun,
                            ]
                        })
                    }

                })
            })

        },

        createList() {
            const city = localStorage.city
            postcodeArray.forEach(postcode => {
                postcode.forEach(item => {
                    if (this.city == '') {
                        if (item.unrestricted_value.includes(city)) {
                            this.listAddress.push({
                                lat: item.data.geo_lat,
                                lon: item.data.geo_lon,
                                type: item.data.type_code,
                                postal_code: item.data.postal_code,
                                address: item.unrestricted_value,
                                time: [
                                    item.data.schedule_mon,
                                    item.data.schedule_tue,
                                    item.data.schedule_wed,
                                    item.data.schedule_thu,
                                    item.data.schedule_fri,
                                    item.data.schedule_sat,
                                    item.data.schedule_sun,
                                ]
                            })
                        }
                    }
                })

            })
        },


//     getAddress(text) {
//             var url = "http://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/postal_unit";
//             var token = "8c890d6b252427b1a024b544d3b501fc8a618a8c";
//             var query = text;

//             var options = {
//             method: "POST",
//             mode: "cors",
//             headers: {
//             "Content-Type": "application/json",
//             "Accept": "application/json",
//             "Authorization": "Token " + token
//         },
//         body: JSON.stringify({query: query})
// }

//         fetch(url, options)
//         .then(response => response.text())
//         .then(result => {
//             const data = JSON.parse(result);

//             if (data.suggestions.length > 0)
//             this.address.push(data.suggestions)
//         } )
//         .catch(error => console.log("error", error));

//     },

        // sourchAddress() {
        //         var url = "http://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address";
        //     var token = "8c890d6b252427b1a024b544d3b501fc8a618a8c";
        //     var query =  this.city;

        //     var options = {
        //     method: "POST",
        //     mode: "cors",
        //     headers: {
        //         "Content-Type": "application/json",
        //         "Accept": "application/json",
        //         "Authorization": "Token " + token
        //     },
        //     body: JSON.stringify({query: query})
        //     }

        //     fetch(url, options)
        //     .then(response => response.text())
        //     .then(result => {
        //         const data = JSON.parse(result)
        //         this.address.push(data)
        //     } )
        //     .catch(error => console.log("error", error));

        // },


        getCity() {

            fetch('https://api.ipify.org?format=json')
                .then(response => response.json())
                .then(response => {
                    this.clientIp = response.ip;
                })
                .catch(error => console.log(error))

            var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/iplocate/address?ip=";
            var token = "8c890d6b252427b1a024b544d3b501fc8a618a8c";
            var query = this.clientIp;

            var options = {
                method: "GET",
                mode: "cors",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "Authorization": "Token " + token
                }
            }

            fetch(url + query, options)
                .then(response => response.text())
                .then(result => {
                    const data = JSON.parse(result)
                    localStorage.city = data.location.data.city

                })
                .catch(error => console.log("error", error));

        },

    },

    watch: {
        activeCity(newValue) {
            this.$emit("address", newValue);
        },
    }


}


</script>
