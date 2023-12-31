import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import user_routes from "../user/setup/routes"
import plan_routes from "../plan/setup/routes"
import plan_details_routes from "../plandetails/setup/routes"
import dofa_routes from "../dofa/setup/routes"
import suggestion_routes from "../suggestions/setup/routes"
import target_routes from "../targets/setup/routes"
import chok_routes from "../chock/setup/routes"
import chok_column_routes from "../chock_column/setup/routes"
import chok_column_value_routes from "../chock_column_values/setup/routes"
import executive_plan_routes from "../executive_plan/setup/routes"

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
        suggestion_routes,
        target_routes,
        chok_routes,
        chok_column_routes,
        chok_column_value_routes,
        plan_details_routes,
        executive_plan_routes
    ]
};


export default routes;
