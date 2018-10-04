<template>
    <div>
        <p class="filter-title mt-3">Ціна</p>
        <div class="d-flex">
            <input id="minPriceInput" step="1" type="text" class="form-control form-control-sm mr-2" v-model="minPrice" v-on:change="sendUpdatedString">
            <input id="maxPriceInput" step="1" type="text" class="form-control form-control-sm" v-model="maxPrice" v-on:change="sendUpdatedString">
        </div>
        <div id="filterSlider" class="mt-3"></div>
        <div>
            <p class="filter-title mt-4">Стиль</p>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" v-model="characteristics.style.klasychnyy" v-on:change="sendUpdatedString">
                    Класичний
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" v-model="characteristics.style.sportyvnyy" v-on:change="sendUpdatedString">
                    Спортивний
                </label>
            </div>
        </div>

        <div>
            <p class="filter-title mt-4">Стать</p>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" v-model="characteristics.gender.men" v-on:change="sendUpdatedString">
                    Чоловічий
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" v-model="characteristics.gender.women" v-on:change="sendUpdatedString">
                    Жіночий
                </label>
            </div>
        </div>


        <div>
            <p class="filter-title mt-4">Тип індексації</p>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" v-model="characteristics.typeOfIndexation.strelochnye" v-on:change="sendUpdatedString">
                    Стрілочна
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" v-model="characteristics.typeOfIndexation.cifrovye" v-on:change="sendUpdatedString">
                    Цифрова
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" v-model="characteristics.typeOfIndexation.strelochnyePlusCifrovye" v-on:change="sendUpdatedString">
                    Комбінована
                </label>
            </div>
        </div>


        <div>
            <p class="filter-title mt-4">Матеріал корпусу</p>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" v-model="characteristics.bodyMaterial.polikarbonat" v-on:change="sendUpdatedString">
                    Полікарбонат
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"  v-model="characteristics.bodyMaterial.splavMetaliv" v-on:change="sendUpdatedString">
                    Сплав металів
                </label>
            </div>
        </div>


        <div>
            <p class="filter-title mt-4">Матеріал ремінця</p>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"  v-model="characteristics.strapMaterial.kauchukovyy" v-on:change="sendUpdatedString">
                    Каучуковий
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"  v-model="characteristics.strapMaterial.shkiryanyy" v-on:change="sendUpdatedString">
                    Шкіряний
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"  v-model="characteristics.strapMaterial.stalnyy" v-on:change="sendUpdatedString">
                    Стальний
                </label>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data: function () {
            return {
                minPrice: 0,
                maxPrice: 0,
                characteristics: {
                    style:{
                        klasychnyy: false,
                        sportyvnyy: false,
                    },
                    gender:{
                        men: false,
                        women: false,
                    },
                    typeOfIndexation:{
                        strelochnye: false,
                        cifrovye: false,
                        strelochnyePlusCifrovye: false,
                    },
                    bodyMaterial: {
                        polikarbonat: false,
                        splavMetaliv: false,
                    },
                    strapMaterial: {
                        kauchukovyy: false,
                        shkiryanyy: false,
                        stalnyy: false,
                    }
                }
            }
        },
        props: ['filter'],
        methods: {
            sendUpdatedString: function(){
                let queryString = ''
                for (let key in this.characteristics) {
                    queryString += this.getUpdatedCharacteristics(key);
                };
                queryString += this.getUpdatedPrices();
                this.$emit("query", queryString); //Вернути рядок у компоненту ClockList

            },
            getUpdatedCharacteristics: function (key) {
                let val = "";
                let query = "";
                for (let entry in this.characteristics[key]) {
                    if (this.characteristics[key][entry] !== false) {
                        (val == "") ? val += entry : val += "," + entry ;
                    }
                }
                if (val !== "") query = key + '=' + encodeURIComponent(val) + '&';
                return query;
            },
            getUpdatedPrices: function () {
                let query = "";
                if (this.minPrice != this.filter.minPrice) query += "minPrice" + '=' + encodeURIComponent(this.minPrice) + '&';
                if (this.maxPrice != this.filter.maxPrice) query += "maxPrice" + '=' + encodeURIComponent(this.maxPrice) + '&';
                return query;
            },

        },
    }


    var minPriceInput = document.getElementById('minPrice');
    var maxPriceInput = document.getElementById('maxPrice');


</script>

<style scoped>
    .filter-title{
        font-weight: 600;
        margin-bottom: 0.5em;
    }

</style>
