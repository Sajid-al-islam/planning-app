import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import user_routes from "../user/setup/routes"
import plan_routes from "../plan/setup/routes"
import dofa_routes from "../dofa/setup/routes"
import suggestion_routes from "../suggestions/setup/routes"

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
        dofa_routes,
        suggestion_routes
    ]
};


export default routes;
