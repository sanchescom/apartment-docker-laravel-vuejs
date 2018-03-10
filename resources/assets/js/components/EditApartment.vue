<template>
    <div>
        <h1>Update Item</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><router-link :to="{ name: 'DisplayApartment' }" class="btn btn-success">Return to Items</router-link></div>
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
        </form>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                item:{}
            }
        },

        created: function(){
            this.getApartment();
        },

        methods: {
            getApartment()
            {
                let endpoint = app_url + 'apartment/' + this.$route.params.id;
                this.axios.get(endpoint).then((response) => {
                    this.item = response.data;
                });
            },
            updateApartment()
            {
                let endpoint = app_url + 'apartment/' + this.$route.params.id;
                this.axios.post(endpoint, this.item).then((response) => {
                    this.$router.push({name: 'DisplayApartment'});
                });
            }
        }
    }
</script>