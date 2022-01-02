<template>
    <section id="customer" class="container">
        <div class="section-title mt-2">
            <h2>Customer details</h2>
        </div>
        <div class="row">
            <div class="col-lg-6 pt-3 pt-lg-0 content">
                <div class="member">
                    <div class="member-info">
                        <h2>{{ customer.first_name}} {{ customer.last_name}}</h2>
                        <span>{{ customer.title }}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row mt-4">
                <div class="col-lg-6 pt-3 pt-lg-0 content member-info">
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
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi voluptate dolor quos tenetur nemo excepturi. Ducimus doloremque dolor aliquid sed dolorem tenetur modi repellendus, doloribus quod adipisci consequuntur nemo facilis!
                    </p>
                </div>
                <div class="col-lg-6">
                    <GmapMap ref="mapRef"
                    :center="{lat:43.2556568, lng:-71.833}"
                    :zoom="7"
                    map-type-id="terrain"
                    style="width: 500px; height: 350px"
                    >
                    </GmapMap>
                </div>
            </div>

        </div>
    </section>
</template>
<script>
    export default {
        props: ['id'],
        data() {
            return {
                customer: {},
                center: { lat: 43.2556568, lng: -71.833 },
                markers: [],
            }
        },
        mounted () {
            this.$refs.mapRef.$mapPromise.then((map) => {
            map.panTo({lat: parseFloat(this.customer.latitude), lng: parseFloat(this.customer.longitude)})
            })
        },
        created() {
            this.getCustomer(this.id);
        },
        watch: {
            '$route'() {
                this.getPost(this.id);
            }
        },
        computed: {
            token() {
                return localStorage.getItem('access_token');
            }
        },
        methods: {
            getCustomer(id) {
                axios.get('/api/v1/customers/' + id,{
                headers: { Authorization: "Bearer " + this.token }
            }).then(response => {
                    this.customer = response.data.data;
                })
            },
        },
    }

</script>

<style scoped>
.member-info h5{
    font-weight:600;
    color:#6ab04c;
}
.member-info .card-text{
    font-weight:300;
    font-size:15px;
}
.member-info .icon-block{
    float:left;
    width:100%;
}

.member-info .card-text{
    font-weight:300;
    font-size:15px;
}
.member-info .icon-block{
    float:left;
    width:100%;
}
.member-info .icon-block a{
    text-decoration:none;
}
.member-info i {
  display: inline-block;
    font-size: 16px;
    color: #6ab04c;
    text-align: center;
    border: 1px solid #6ab04c;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    margin:0 5px;
}
.member-info i:hover {
  background-color:#6ab04c;
  color:#fff;
}
</style>
