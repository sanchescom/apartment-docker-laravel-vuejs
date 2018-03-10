<template>
    <div>
        <h1>Create An Apartment</h1>
        <form v-on:submit.prevent="addApartment">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Move in date:</label>
                        <input type="text" class="form-control col-md-6" required data-provide="datepicker" v-model="item.move_in_date">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Country:</label>
                        <input type="text" class="form-control col-md-6" required v-model="item.country" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Post code:</label>
                        <input type="text" class="form-control col-md-6" required v-model="item.post_code" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>City:</label>
                        <input type="text" class="form-control col-md-6" required v-model="item.city" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Street:</label>
                        <input type="text" class="form-control col-md-6" required v-model="item.street" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control col-md-6" required v-model="item.email" />
                    </div>
                </div>
            </div>
            <br />
            <div class="form-group">
                <button class="btn btn-primary">Add Apartment</button>
            </div>
        </form>
    </div>
</template>

<script>
    import {app_url} from "../app";

    export default {
        data() {
            return {
                item: {}
            }
        },
        methods: {
            addApartment() {
                let endpoint = app_url + 'apartments';

                this.axios.post(endpoint, this.item)
                    .then((response) => {
                        this.$router.push({
                            name: 'DisplayApartment'
                        })
                })
            }
        }
    }
</script>