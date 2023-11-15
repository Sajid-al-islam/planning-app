<template>
    <div class="page-sidebar custom-scrollbar page-sidebar-open">
        <!--Page Sidebar Start-->
        <div class="sidebar-user text-center">
            <div><img class="img-50 rounded-circle" src="/backend/assets/images/1.jpg" alt="#">
            </div>
            <h6 class="mt-3 f-12">Admin</h6>
        </div>
        <div class="sidebar-menu">
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `adminDashboard` }">Dashboard</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `All` }" class="d-flex align-items-center" href="">User</router-link>
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-light-bulb"></i>
                <router-link :to="{ name: `AllPlan` }" class="d-flex align-items-center" href="">Plan</router-link>
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-list"></i>
                <router-link :to="{ name: `AllDofa` }" class="d-flex align-items-center" href="javascript:void(0)">Dofa</router-link>
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-info-alt"></i>
                <router-link :to="{ name: `AllSuggestion` }" class="d-flex align-items-center" href="javascript:void(0)">Suggestions</router-link>
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-target"></i>
                <router-link :to="{ name: `AllTarget` }" class="d-flex align-items-center" href="javascript:void(0)">Orijitobbo Target</router-link>
            </li>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style></style>
