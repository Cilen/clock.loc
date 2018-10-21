<template>
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModal" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <template v-if="totalQty !==0">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ trans('localization.cart')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            <div class="container-fluid">
                                <table class="table border-bottom">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0"></th>
                                        <th scope="col" class="border-0 text-left">Назва товару</th>
                                        <th scope="col" class="border-0">Ціна</th>
                                        <th scope="col" class="border-0">Кількість</th>
                                        <th scope="col" class="border-0">Сума</th>
                                        <th scope="col" class="border-0"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <template v-for="item in items">
                                        <tr>
                                            <td class="p-1"><img :src="imagesPath+item.logo_uuid" class="img-fluid img-thumbnail" alt="Responsive image"></td>
                                            <td class="text-left">
                                                <p class="product-name">{{item.name}}</p>
                                                <p class="product-detail">{{ trans('localization.productCode')}}: {{item.clockId}}</p>
                                            </td>
                                            <td class="price">{{item.price}} грн</td>
                                            <td>
                                                <a href="#" class="btn cart-amount-button" name="minus"v-on:click="minusOneFromCart(item)"><i class="fas fa-minus"></i></a>
                                                <input name="quantity" type="text" class="form-control cart-amount-input-text" v-bind:value="item.qty">
                                                <a href="#" class="btn cart-amount-button" name="plus" v-on:click="plusOneToCart(item)"><i class="fas fa-plus"></i></a>
                                            </td>
                                            <td class="price">{{item.total}} грн</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger border-0" name="remove" v-on:click="removeFromCart(item)"><i class="fas fa-times"></i></button>
                                            </td>
                                        </tr>
                                    </template>

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end">
                                    <span>Итого: {{totalPrice}} грн</span>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-5">
                                    <button type="button" class="btn btn-outline-primary btn-lg w-100 px-0" data-dismiss="modal">{{ trans('localization.backToShop')}}</button>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-5 offset-lg-2">
                                    <a v-if="currentUrl !== '/checkout'" :href="checkoutUrl" class="btn btn-success btn-lg w-100 px-0" role="button">{{ trans('localization.toOrder')}}</a>
                                    <a v-else href="#" class="btn btn-success btn-lg w-100 px-0" role="button" data-dismiss="modal">{{ trans('localization.toOrder')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-else>

                                <div class="modal-header border-bottom-0">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h2 class="cart-empty"><i class="fas fa-shopping-cart"></i> Корзина пуста</h2>
                                </div>

                </template>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "Cart",
        data: function () {
            return {
                currentUrl: window.location.pathname,
            }
        },
        props: ['imagesPath', 'checkoutUrl', 'itemsData', 'totalPriceData', 'totalQtyData'],
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
        methods: {
            uploadToStore: function () {
                this.$store.commit('updateData', {
                    items: this.itemsData,
                    totalPrice: this.totalPriceData,
                    totalQty: this.totalQtyData,
                });
                console.log(this.currentUrl);
            },
            plusOneToCart: function(item){
                this.$store.dispatch('updateQty', {
                    clockId: item.clockId,
                    qty: item.qty + 1
                });
            },
            minusOneFromCart: function (item) {
                if (item.qty > 1) {
                    this.$store.dispatch('updateQty', {
                        clockId: item.clockId,
                        qty: item.qty - 1
                    });
                }
            },
            removeFromCart: function (item) {
                this.$store.dispatch('removeFromCart', {
                    clockId: item.clockId
                });
            }

        },
        created: function(){
            this.uploadToStore();
        }
    }
</script>

<style scoped>
    .product-name{
        font-size: 1.1em;
        font-family: 'Roboto Slab', serif;
        color: #343a40;
        line-height: 0.6;
    }
    .product-detail{
        font-size: 0.9em;
        line-height: 0;
    }
    .price{
        font-size: 1.2em;
    }
    .cart-amount-input-text{
        width: 40px;
        display: inline-block;
        padding: 2px 4px;
        font-size: 1.2em;
        line-height: 0;
        text-align: center;

    }
    .cart-amount-button{
        border: none;
        font-size: 1.2em;
        line-height: 0;
        padding: 0 4px;
        vertical-align: unset ;
        color: #6c757d;
    }
    .cart-amount-button:hover {
        color: #343a40;
    }
    th, td {
        text-align: center;
        vertical-align: middle;
    }
    .cart-empty{
        text-align: center;
        height: 100px;
    }

</style>