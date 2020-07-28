<template>
    <nav class="navbar">
        Welcome {{user.username}}
        <a @click="logout" href="">Logout</a>
    </nav>
</template>

<script>
    import authService from "../sevices/auth.service";

    export default {
        name: "Navbar",
        data() {
            return {}
        },
        props: {
            user: Object
        },
        methods: {
            logout() {
                authService.logout();
            }
        }
    }
</script>

<style scoped>

</style>
