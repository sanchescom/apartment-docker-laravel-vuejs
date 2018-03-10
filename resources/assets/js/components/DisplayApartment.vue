<template>
    <div>
        <h1>Apartments</h1>

        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'CreateApartment' }" class="btn btn-primary">Create Apartment</router-link>
            </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <td>ID</td>
                <td>Move in date</td>
                <td>Country</td>
                <td>Post code/City/Street</td>
                <td>Email</td>
                <td>Created at</td>
            </tr>
            </thead>

            <tbody>
            <tr v-for="item in items">
                <td>{{ item.id }}</td>
                <td>{{ item.move_in_date }}</td>
                <td>{{ item.country }}</td>
                <td>{{ item.post_code }}/{{ item.city }}/{{ item.street }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.created_at }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    import {app_url} from "../app";

    export default {
        data(){
            return{
                items: []
            }
        },

        created: function()
        {
            this.fetchApartments();
        },

        methods: {
            fetchApartments()
            {
                let endpoint = app_url + 'apartments';
                this.axios.get(endpoint).then((response) => {
                    console.log(response);
                    this.items = response.data;
                });
            }
        }
    }
</script>