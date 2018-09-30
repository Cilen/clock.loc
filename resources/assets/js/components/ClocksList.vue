<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 bg-danger">asdfasdf</div>
                <div class="col-12 col-lg-9 ">
                    <div class="row pt-3">


                        <div class="col-6 col-md-4" v-for="(clock, index) in data">
                            <div class="card h-100">
                                <a href="/shop/1015">
                                    <img class="card-img-top" v-if="clock.logo_uuid !== null" :src="imagesPath + clock.logo_uuid" alt="Card image cap">
                                    <img class="card-img-top" v-else :src="imagesPath + '../'+'no_image.png'" alt="Card image cap">
                                </a>
                                <div class="card-body px-2 pb-2">
                                    <a href="">
                                        <h5 class="card-title clock-name">{{clock.name}}</h5>
                                    </a>
                                    <div class="feedbacks d-flex mb-2">
                                        <div class="stars mr-auto">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="comments">
                                            <a href="">
                                                <i class="far fa-comments mr-2"></i>відгуків 0
                                            </a>
                                        </div>
                                    </div>
                                    <div class="prices-wrapper d-flex">
                                        <div class="prices d-flex flex-column mr-auto justify-content-end">
                                            <span class="old-price text-secondary" v-if="clock.old_price !== 0">{{clock.old_price}} грн</span>
                                            <span class="price">{{clock.price}} грн</span>
                                        </div>
                                        <div class="button-wrapper d-flex align-items-end">
                                            <button class="btn btn-success">Купити</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
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
                imagesPath: imagesPath,
                data: data,
            }
        },
        methods: {

        },
        created:function(){
            console.log(this.data);
        }


    }
</script>

<style scoped>
    .card:hover{
        box-shadow: 0 0 10px #aaa;
    }
    .feedbacks {
        border-top: 1px solid rgba(0, 0, 0, 0.125);
    }
    .clock-name{
        font-family: "Roboto Condensed", sans-serif;
        color: #212529;
    }
    .stars{
        color: #ffc107;
    }
    .comments{
        font-size: 0.9em;
    }
    .old-price{
        text-decoration: line-through;
    }
    .price{
        font-size: 1.5em;
        line-height: 1;
    }

</style>
