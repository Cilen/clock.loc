<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h2>Оформление заказа</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="container">
                    <form >
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-4 col-form-label col-form-label-sm">{{ trans('localization.firstName')}}</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control form-control-sm" id="firstName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastName" class="col-sm-4 col-form-label col-form-label-sm">{{ trans('localization.lastName')}}</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control form-control-sm" id="lastName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label col-form-label-sm">{{ trans('localization.phone')}}</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+38</div>
                                    </div>
                                    <input type="tel" class="form-control form-control-sm" id="phone" placeholder="09xxxxxxxx"
                                           autocomplete="tel"
                                           maxlength="10"
                                           pattern="(.){10}" required
                                           v-bind:value="phone"
                                           v-on:input="phoneToInt($event.target.value)"
                                           v-on:change="phoneValide($event.target.value)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label col-form-label-sm">{{ trans('localization.city')}}</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control form-control-sm" id="city">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4 pt-0">{{ trans('localization.deliveryMethod')}}</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="deliveryMethod" id="novaPoshta" value="novaPoshta" checked>
                                    <label class="form-check-label" for="novaPoshta">
                                        {{ trans('localization.novaPoshta')}}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="deliveryMethod" id="ukrposhta" value="ukrposhta">
                                    <label class="form-check-label" for="ukrposhta">
                                        {{ trans('localization.ukrposhta')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4 pt-0">{{ trans('localization.paymentMethod')}}</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentCash" value="cash" checked>
                                    <label class="form-check-label" for="paymentCash">
                                        {{ trans('localization.paymentCash')}}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentOnline" value="online">
                                    <label class="form-check-label" for="paymentOnline">
                                        {{ trans('localization.paymentOnline')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 offset-lg-1 col-lg-5">
                <div class="container-fluid">
                    <h4>В корзині</h4>
                    <table class="table table-sm mb-0">
                        <tbody>
                            <tr v-for="item in items">
                                <td class="logo-cell">
                                    <a :href="shopUrl+item.clockId" target="_blank">
                                        <img :src="imagesPath+item.logo_uuid" class="img-fluid img-thumbnail logo" alt="Responsive image">
                                    </a>
                                </td>
                                <td>
                                    <div class="product-name">
                                        <a :href="shopUrl+item.clockId" target="_blank">{{item.name}}</a></div>
                                    <div class="d-flex justify-content-between">
                                        <span class="product-qty">{{item.qty}} шт.</span>
                                        <span class="total-price">{{item.total}} грн</span>
                                    </div>
                                </td>
                            </tr>
                            <tr >
                                <td></td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <span class="d-inline-flex check-total-title">Итого: </span>
                                        <span class="d-inline-flex check-total">{{totalPrice}} грн</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row justify-content-center">
                        <a class="btn btn-link" href="#"  data-toggle="modal" data-target="#cartModal">Редагувати замовлення</a>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <a class="btn btn-lg btn-success" href="#">Замовлення підтверджую</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                phone: ""
            }
        },
        props: ['imagesPath', 'shopUrl', 'cartUrl'],
        computed: {
            totalPrice () {
                return this.$store.getters.getTotalPrice
            },
            totalQty () {
                return this.$store.getters.getTotalQty
            },
            items () {
                return this.$store.getters.getItems
            },
        },
        methods:{
            phoneToInt: function (phone) {
                phone = phone.replace(/[^0-9]/g,'');
                this.phone = phone;
                this.$forceUpdate();
                console.log(phone);
            },
            phoneValide: function (phone) {
                if (phone.length != 10) this.phone = "";
            }
        }
    }
</script>

<style scoped>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .col-form-label{
        font-size: 1.1em;
    }
    .logo{
        height: 50px;
        width: 50px;
        padding: 2px;
    }
    .logo-cell{
        width: 65px;
    }
    .product-name{
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 1em;
    }
    .check-total-title{
        font-size: 1.2em;
        font-weight: 600;
    }
    .check-total{
        font-size: 1.4em;
        font-weight: 600;
    }

</style>