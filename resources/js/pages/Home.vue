<template>
    <section id="customer" class="container">
        <div class="section-title mt-2">
            <h2>List of customers</h2>
        </div>
        <div class="row">
            <template v-for="customer in customers.data">
                <div class="col-md-4 mt-3" :key="customer.id">
                    <div class="card profile-card-2">
                        <div class="card-img-block">
                            <img class="img-fluid"
                                src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb"
                                alt="Card image cap">
                        </div>
                        <div class="card-body pt-5">
                            <vue-letter-avatar class="profile" :name='customer.first_name' size='60' :rounded=true />
                            <div class="mb-2">
                                <h5 class="card-title">
                                    <router-link :to="{name:'customer', params:{id: customer.id}}"
                                        style="color:#6ab04c">
                                        {{ customer.first_name }} {{ customer.last_name }}
                                    </router-link>
                                </h5>
                                <span>{{ customer.title }}</span>
                            </div>
                            <p class="card-text mt-1">
                                <ul class="list-unstyled">
                                    <li class="mt-1">
                                        <i class="fa fa-envelope"></i>
                                        <span>{{ customer.email }}</span>
                                    </li>
                                    <li class="mt-2">
                                        <i class="fa fa-building"></i>
                                        <span>{{ customer.company }}</span>
                                    </li>
                                    <li class="mt-2">
                                        <i class="fa fa-venus"></i>
                                        <span>{{ customer.gender }}</span>
                                    </li>
                                    <li class="mt-2">
                                        <i class="fa fa-map-marker"></i>
                                        <span>{{ customer.city }}</span>
                                    </li>
                                </ul>
                            </p>
                            <div class="icon-block float-right">
                                <router-link class="btn btn-outline-info"
                                    :to="{name:'customer', params:{id: customer.id}}">
                                    View customer
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <div class="card bg-light mt-3">
                <div class="card-body p-3">
                    <div class="overflow-auto">
                        <pagination align="center" :limit=22 :data="customers" @pagination-change-page="getCustomers">
                        <!-- <span slot="prev-nav">&lt; Previous</span>
	                    <span slot="next-nav">Next &gt;</span> -->
                        </pagination>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                customers: {}
            }
        },
        computed: {
            token() {
                return localStorage.getItem('access_token');
            }
        },
        created() {
            this.getCustomers();
        },
        methods: {
            getCustomers(page = 1) {
                axios.get('/api/customers?page=' + page,{
              headers: { Authorization: "Bearer " + this.token }
            }).then(response => {
                    console.log(response.data.data.data);
                    this.customers = response.data.data;
                })
            }
        },
    }

</script>
<style scoped>
    .profile-card-2 .card-img-block {
        float: left;
        width: 100%;
        height: 70px;
        overflow: hidden;
    }

    .profile-card-2 .card-body {
        position: relative;
    }

    .profile-card-2 .profile {
        border-radius: 50%;
        position: absolute;
        top: -42px;
        left: 15%;
        max-width: 75px;
        border: 3px solid rgba(255, 255, 255, 1);
        -webkit-transform: translate(-50%, 0%);
        transform: translate(-50%, 0%);
    }

    .profile-card-2 h5 {
        font-weight: 600;
        color: #6ab04c;
    }

    .profile-card-2 .card-text {
        font-weight: 300;
        font-size: 15px;
    }

    .profile-card-2 .icon-block {
        float: left;
        width: 100%;
    }

    .profile-card-2 .icon-block a {
        text-decoration: none;
    }

    .profile-card-2 i {
        display: inline-block;
        font-size: 16px;
        color: #6ab04c;
        text-align: center;
        border: 1px solid #6ab04c;
        width: 30px;
        height: 30px;
        line-height: 30px;
        border-radius: 50%;
        margin: 0 5px;
    }

    .profile-card-2 i:hover {
        background-color: #6ab04c;
        color: #fff;
    }

</style>
