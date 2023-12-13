<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    data: () => ({

    }),
    created: async function () {
        await this.check_auth();
    },
    methods: {
        check_auth: async function() {
            let token = localStorage.getItem('token');
            if(!token) {
                location.href = '/login'
            }
        },
    },
    computed: {
    },
    watch: {
        
    },
}
</script>

<style></style>
