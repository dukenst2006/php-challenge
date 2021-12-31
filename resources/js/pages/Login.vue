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
                        <form class="form text-center" action="#">
                            <div class="form-group input-group-md">
                                <input type="email" required class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group input-group-md">
                                <input type="password" required class="form-control" id="password"
                                    placeholder="Password">
                            </div>
                            <button class="btn btn-lg btn-block btn-primary mt-4" type="submit">
                                Login
                            </button>
                            <a href="#" class="float-right mt-2">Forgot Password? </a>
                        </form>
                    </div>
                    <a href="#" class="text-center d-block mt-2">Create an account? </a>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                'email': '',
                'password': '',
                'remember': false,
            }
        },
        computed: {
            authErrors() {
                // return this.$store.getters.authErrors;
            }
        },
        methods: {
            // login: function () {
            //     const { email, password, remember } = this;
            //     this.$store.dispatch('authRequest', { email, password, remember })
            //         .then(() => {
            //             this.$router.push('/dashboard')
            //         })
            // }
        }
    }

</script>
