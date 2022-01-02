<template>
    <section id="customer" class="container">
        <div class="section-title mt-2">
            <h2>Login form</h2>
        </div>

        <div class="container mt-2">
            <div class="row justify-content-center align-items-center text-center p-2">
                <div class="m-1 col-sm-8 col-md-6 col-lg-4 shadow-sm p-3 mb-5 bg-white border rounded">
                    <div class="pt-5 pb-5">
                        <img class="rounded mx-auto d-block"
                            src="https://freelogovector.net/wp-content/uploads/logo-images-13/microsoft-cortana-logo-vector-73233.png"
                            alt="" width=70px height=70px>
                        <p class="text-center text-uppercase mt-3">Login</p>
                        <div class="notification is-danger" v-if="error">
                            <p>{{error}}</p>
                        </div>
                        <form class="form text-center" action="#" autocomplete="off" @submit.prevent="login">
                            <div class="form-group input-group-md">
                                <input type="email" v-model="username" required class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group input-group-md">
                                <input type="password" v-model="password" required class="form-control" id="password"
                                    placeholder="Password">
                            </div>
                            <button class="btn btn-lg btn-block btn-primary mt-4" type="submit">
                                Login
                            </button>
                            <a href="#" class="float-right mt-2">Forgot Password? </a>
                        </form>
                    </div>
                    <!-- <a href="#" class="text-center d-block mt-2">Create an account? </a> -->
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                username: '',
                password: '',
                error: null
            }
        },
        created () {
            if (this.$store.getters.loggedIn) {
                this.$router.push('/')
            }
        },
        methods: {
            login() {
                console.log('login');
                this.$store
                    .dispatch("retrieveToken", {
                        username: this.username,
                        password: this.password
                    })
                    .then(response => {
                        this.$router.push({ name: "home" });
                    })
                    .catch(error => {
                        this.error = error.data;
                    });
            }
        }
    }

</script>
