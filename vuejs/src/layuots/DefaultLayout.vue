<template>
    <div id="default-layout">
        <navbar :user="user"/>
        <router-view/>
    </div>
</template>

<script>
    import Navbar from "../layuots/Navbar";
    import authService from "../sevices/auth.service";

    export default {
        name: "DefaultLayout",
        components: {Navbar},
        data() {
            return {
                user: {}
            }
        },
        async beforeMount() {
            this.user = await authService.getCurrentUser();
        }
    }
</script>

<style lang="scss" scoped>
    .navbar {
        height: 50px;
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        line-height: 50px;
        background-color: #1f5d6b;
        color: #FFF;
        padding: 0 15px;
        text-align: right;
        transition: font-weight 0.3s;

        a {
            color: #FFF;
        }
    }
</style>
