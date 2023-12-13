import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import user_routes from "../user/setup/routes"
import division_plan_routes from "../division_plan/setup/routes"

const routes =
{
    path: 'division',
    component: Layout,
    children: [
        {
            path: '',
            name: 'divisionDashboard',
            component: Dashboard,
        },
        user_routes,
        division_plan_routes
    ]
};


export default routes;
