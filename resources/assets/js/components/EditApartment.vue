<template>
    <div>
        <b-alert :show="checkToken()" variant="danger">Token is required for editing from!</b-alert>

        <h1>Update Apartment</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><router-link :to="{ name: 'DisplayApartment' }" class="btn btn-success">Return to Apartments</router-link></div>
        </div>

        <form v-on:submit.prevent="updateApartment">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Move in date:</label>
                        <input type="text" class="form-control col-md-6" data-provide="datepicker" v-model="item.move_in_date">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Country:</label>
                        <input type="text" class="form-control col-md-6" v-model="item.country" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Post code:</label>
                        <input type="text" class="form-control col-md-6" v-model="item.post_code" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>City:</label>
                        <input type="text" class="form-control col-md-6" v-model="item.city" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>City:</label>
                        <input type="text" class="form-control col-md-6" v-model="item.street" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control col-md-6" v-model="item.email" />
                    </div>
                </div>
            </div>
            <br />
            <div class="form-group" v-show="checkToken() === false">
                <button class="btn btn-primary">Save Apartment</button>
            </div>
        </form>
        <b-modal ref="tokenModalRef" hide-footer title="Access token failed">
            <div class="d-block text-center">
                <h3>Your access token is wrong. Please use token which was sent you by email.</h3>
            </div>
        </b-modal>

    </div>
</template>

<script>

    import {app_url} from "../app";

    export default{
        data() {
            return {
                item: {},
                token: this.$route.query.token
            }
        },

        created: function(){
            this.getApartment();
        },

        methods: {
            checkToken() {
                return typeof this.token === 'undefined';
            },
            getApartment()
            {
                let endpoint = app_url + 'apartments/' + this.$route.params.id;

                this.axios.get(endpoint)
                    .then((response) => {
                        this.item = response.data;
                    });
            },
            updateApartment()
            {
                let endpoint = app_url + 'apartments/' + this.$route.params.id;

                if (!this.checkToken()) {
                    endpoint += '?token=' + this.token;
                }

                this.axios.post(endpoint, this.item)
                    .then(response => {
                        this.$router.push({
                            name: 'DisplayApartment'
                        });
                        console.log(response)
                    })
                    .catch(error => {
                        if (error.response.status === 403)
                        {
                            this.$refs.tokenModalRef.show();
                        }
                        console.log(error.response)
                    });
            }
        }
    }
</script>