<template>
    <div class="form-wrapper">
        <h3>Register and create notes</h3>
        <form @submit.prevent="register" action="">
            <div class="error" v-if="errors">
                <p :key="field" v-for="(error,field) in errors">
                    {{error[0]}}
                </p>
            </div>
            <input placeholder="Your name" type="text" v-model="form.username">
            <input placeholder="Your password" type="password" v-model="form.password">
            <input placeholder="Repeat password" type="password" v-model="form.password_repeat">
            <button>Register</button>
            <router-link class="link" to="/login">Click here to login</router-link>
        </form>
    </div>
</template>

<script>
    import authService from "../sevices/auth.service";

    export default {
        name: "Register",
        data() {
            return {
                form: {
                    username: '',
                    password: '',
                    password_repeat: '',
                },
                errors: null
            }
        }, methods: {
            async register() {
                const {success, errors} = await authService.register(this.form);
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
