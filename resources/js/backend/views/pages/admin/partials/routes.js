import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import user_routes from "../user/setup/routes"
import plan_routes from "../plan/setup/routes"

const routes =
{
    path: 'admin',
    component: Layout,
    children: [
        {
            path: '',
            name: 'adminDashboard',
            component: Dashboard,
        },
        user_routes,
        plan_routes,
    ]
};


export default routes;
