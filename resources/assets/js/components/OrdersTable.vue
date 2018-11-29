<template>
    <div>
        <table class="table table-striped table-sm mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">№ замовлення</th>
                    <th scope="col">Прізвище / Ім'я</th>
                    <th scope="col">Номер телефону</th>
                    <th scope="col">Загальна ціна</th>
                    <th scope="col">Спосіб оплати</th>
                    <th scope="col">Дії</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(order, key) in orders">
                    <th scope="row">{{order.order_id}}</th>
                    <td>
                        {{order.client_last_name}} {{order.client_last_name}}

                    </td>
                    <td>
                        0{{order.phone}}
                    </td>
                    <td>
                        {{order.total_price}}
                    </td>
                    <td v-if='order.pay_method === "cash"'>
                        Готівкою
                    </td>
                    <td v-else-if='order.pay_method === "online"'>
                        Онлайн
                    </td>
                    <td v-else>
                        Невизначено
                    </td>
                    <td>
                        <a class="btn btn-success btn-sm" title="Переглянути" v-bind:href="ordersUrl + '/' + order.order_id" role="button">
                            <i class="far fa-file-alt"></i>
                        </a>
                        <button type="button" class="btn btn-primary btn-sm" title="Позначити як переглянуте" v-on:click="sendUpdate(order.order_id)">
                            <i class="far fa-check-square"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="deleteModal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <!--<div class="modal-header bg-danger">-->
                        <!--<h5 class="modal-title">Увага</h5>-->
                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                            <!--<span aria-hidden="true">&times;</span>-->
                        <!--</button>-->
                    <!--</div>-->
                    <!--<div class="modal-body">-->
                        <!--<p>Ви дійсно бажаєте видалити цей товар із бази даних?</p>-->
                    <!--</div>-->
                    <!--<div class="modal-footer">-->
                            <!--<button type="button" class="btn btn-success" data-dismiss="modal">Ні</button>-->
                            <!--<button type="button" class="btn btn-danger" data-toggle="modal" v-on:click="sendDestroy(selectedDeleteClock)">Видалити</button>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                orders: [],
                selectedDeleteClock: ""
            }
        },
        props: ['ordersData', 'ordersUrl'],
        methods: {
            sendUpdate: function (orderId) {
                if(this.wait){
                    return
                }
                this.wait = true;
                setTimeout(() => this.wait = false, 1000);
                let updateUrl = this.ordersUrl + "/" + orderId;
                axios({
                    method: 'post',
                    url: updateUrl,
                    data: {
                        _method: "PUT",
                        revised: true
                    }
                })
                    .then(response => {
                        if (response.data.length != 0) {
                            this.updateOrders(response.data);
                            runToastmessage("Зміни успішно внесені в базу даних");
                        };

                    })
                    .catch(function (error) {
                        let errors = error.response.data.errors;
                        console.log(errors)
                        for (let key in errors) {
                            runToastmessage(errors[key][0], "error");
                        }
                    });
            },
            updateOrders: function (data) {
                this.orders = data;
            },
        },
        created: function(){
            this.updateOrders(this.ordersData);
        },


    }
</script>

<style scoped>
    form {
        margin-top: 1.2em;
    }
    #deleteModal h5 {
        color: white;
    }
</style>
