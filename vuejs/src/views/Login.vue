<template>
    <div class="form-wrapper">
        <h3>Login to create notes</h3>
        <form @submit.prevent="login" action="">
            <div class="errors" v-if="errors">
                <p :key="field" v-for="(error, field) in errors">
                    {{error[0]}}
                </p>
            </div>
            <input placeholder="Username" type="text" v-model="form.username">
            <input placeholder="Password" type="password" v-model="form.password">
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
                }
            }
        }
    }
</script>

<style scoped>

</style>