<template>
    <div class="form-wrapper">
        <h3>Login to create notes</h3>
        <form @submit.prevent="login" action="">

            <input placeholder="Username" type="text" v-model="form.username">
            <div class="errors" v-if="errors && errors.hasOwnProperty('username')">
                <p>{{errors.password[0]}}</p>
            </div>
            <input placeholder="Password" type="password" v-model="form.password">
            <div class="errors" v-if="errors && errors.hasOwnProperty('password')">
                <p>{{errors.password[0]}}</p>
            </div>
            <button>Login</button>
            <router-link class="link" to="/register">Click here to register</router-link>
        </form>
    </div>
</template>

<script>
    import authService from "../sevices/auth.service";

    export default {
        name: "Login",
        data() {
            return {
                form: {
                    username: '',
                    password: ''
                },
                errors: null
            }
        }, methods: {
            async login() {
                const {success, errors} = await authService.login(this.form);
                if (success) {
                    this.$router.push({name: 'home'})
                } else {
                    this.errors = errors;
                    console.log(errors);
                }
            }
        }
    }
</script>

<style scoped>

</style>
