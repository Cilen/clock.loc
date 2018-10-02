<template>
    <div>
        <p class="filter-title mt-3">Ціна</p>
        <div class="d-flex">
            <input id="minPriceInput" step="1" type="text" class="form-control form-control-sm mr-2" v-model="minPrice">
            <input id="maxPriceInput" step="1" type="text" class="form-control form-control-sm" v-model="maxPrice">
        </div>
        <div id="slider" class="mt-3"></div>
        <div>
            <p class="filter-title mt-4">Стиль</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Класичний
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Спортивний
                </label>
            </div>
        </div>

        <div>
            <p class="filter-title mt-4">Стать</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Чоловічий
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Жіночий
                </label>
            </div>
        </div>


        <div>
            <p class="filter-title mt-4">Тип індексації</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Стрілочна
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Цифрова
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Комбінована
                </label>
            </div>
        </div>


        <div>
            <p class="filter-title mt-4">Матеріал корпусу</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Полікарбонат
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Сплав металів
                </label>
            </div>
        </div>


        <div>
            <p class="filter-title mt-4">Матеріал ремінця</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Каучуковий
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Шкіряний
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
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
                minPrice: this.filter.minPrice,
                maxPrice: this.filter.maxPrice,
            }
        },
        props: ['filter'],
        methods: {

        }
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
