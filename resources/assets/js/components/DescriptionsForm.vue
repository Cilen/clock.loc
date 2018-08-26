<template>
    <div id="descriptionsForm">
        <div class="form-group row">
            <div class="col-12">
                <label>Загальний опис</label>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="uk" v-model="uk.general"></textarea>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="ru" v-model="ru.general"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label>Механізм</label>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="uk" v-model="uk.mechanism"></textarea>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="ru" v-model="ru.mechanism"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label>Корпус</label>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="uk" v-model="uk.body"></textarea>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="ru" v-model="ru.body"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label>Циферблат</label>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="uk" v-model="uk.clockFace"></textarea>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="ru" v-model="ru.clockFace"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label>Скло</label>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="uk" v-model="uk.glass"></textarea>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="ru" v-model="ru.glass"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label>Ремінець/браслет</label>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="uk" v-model="uk.strap"></textarea>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="ru" v-model="ru.strap"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label>Функції</label>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="uk" v-model="uk.functions"></textarea>
            </div>
            <div class="col-6">
                <textarea class="form-control" rows="4" placeholder="ru" v-model="ru.functions"></textarea>
            </div>
        </div>
        <div class="form-group ">
            <button class="btn btn-success" v-on:click="sendUpdate">Зберегти</button>
        </div>

    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                uk: {
                    general: null,
                    mechanism: null,
                    body: null,
                    clockFace: null,
                    glass: null,
                    strap: null,
                    functions: null,
                },
                ru: {
                    general: null,
                    mechanism: null,
                    body: null,
                    clockFace: null,
                    glass: null,
                    strap: null,
                    functions: null,
                },
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        methods: {
            sendUpdate: function () {
                var updateUrl = descriptionUrl + "/" + data.clock_id;
                axios({
                    method: 'post',
                    url: updateUrl,
                    data: {
                        _method: 'PUT',
                        descriptionsUk: this.uk,
                        descriptionsRu: this.ru,
                    }
                })
                    .then(response => {
                        if (response.data.length != 0) {
                            this.uk = response.data["uk"];
                            this.ru = response.data["ru"];
                            runToastmessage("Зміни успішно внесені в базу даних");
                        };

                    })
                    .catch(function (error) {
                        let errors = error.response.data.errors;
                        console.log(errors);
                            runToastmessage("Виникла помилка", "error");
                    });
            },
            resetData: function () {
                if (descriptions !== undefined) {
                    for (let key in descriptions["uk"]) {
                        this["uk"][key] = descriptions["uk"][key];
                        this["ru"][key] = descriptions["ru"][key];
                    }
                };
            },
        },
        created() {
            this.resetData();
        },
    }
</script>
<style scoped>
    #descriptionsForm {
        margin-top: 1.2em;
    }
</style>