<template>
    <!-- <div class="container"> -->
        <div class="row justify-content-center mt-1">
            <div class="col-md-12">
                <div>
                    <button @click="unnice()" class="btn" v-if="result">
                        <!-- いいね解除 -->
                        <i class="fas fa-heart"></i>
                        {{ count }}
                    </button>
                    <button @click="nice()" class="btn" v-else>
                        <!-- いいね -->
                        <i class="far fa-heart"></i>
                        {{ count }}
                    </button>
                    <!-- <p>{{ count }}</p> -->
                </div>
            </div>
        </div>
    <!-- </div> -->
</template>

<script>
    export default {
        props: ['post'],
        data() {
            return {
                count: "",
                result: "false"
            }
        },
        mounted() {
            this.hasnice();
            this.countnices();
        },
        methods: {
            nice() {
                axios.get('/reply/nice/' + this.post)
                .then(res => {
                    this.result = res.data.result;
                    this.count = res.data.count;
                }).catch(function(error) {
                    console.log(error);
                });
            },
            unnice() {
                axios.get('/reply/unnice/' + this.post)
                .then(res => {
                    this.result = res.data.result;
                    this.count = res.data.count;
                }).catch(function(error) {
                    console.log(error);
                });
            },
            countnices() {
                axios.get('/reply/countnices/' + this.post)
                .then(res => {
                    this.count = res.data;
                }).catch(function(error){
                    console.log(error);
                });
            },
            hasnice() {
                axios.get('/reply/hasnice/' + this.post)
                .then(res => {
                    this.result = res.data;
                }).catch(function(error){
                    console.log(error);
                });
            }
        },
    }
</script>
