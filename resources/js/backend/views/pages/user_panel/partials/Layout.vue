<template>
    <!--page-wrapper Start-->
    <div class="page-wrapper">
        <Header></Header>
        <!--Page Body Start-->
        <div class="page-body-wrapper">
            <div>
                <Sidebar></Sidebar>
                <router-view></router-view>
            </div>
        </div>
        <!--Page Body Ends-->
    </div>
    <!--page-wrapper Ends-->
</template>

<script>
import Sidebar from "./Sidebar.vue"
import Header from "./Header.vue"

export default {
    components: { Sidebar, Header },
    data: () => ({
        offset: "",
        search_data: "",
    }),
    created: async function () {
        setTimeout(() => {
            document.querySelector('.page-body-wrapper').classList.add('sidebar-close');
        }, 300);
        this.check_role();
    },
    methods: {
        check_role: async function () {
            let roles = JSON.parse(localStorage.getItem('user_roles'));
            roles.forEach(element => {
                
                if(element.name != 'user') {
                    location.href = '/login'
                    localStorage.removeItem('token');
                }
                
            });
        }
    },
    computed: {
    },
    watch: {
        
    },
}

</script>

<style></style>
