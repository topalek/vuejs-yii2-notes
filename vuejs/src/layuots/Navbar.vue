<template>
    <nav class="navbar">
        Welcome {{user.username}}
        <a @click="logout" href="">Logout</a>
    </nav>
</template>

<script>
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
                console.log('Logout')
            }
        }
    }
</script>

<style scoped>

</style>
