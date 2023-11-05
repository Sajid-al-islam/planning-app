import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import user_routes from "../user/setup/routes"

const routes =
{
    path: 'sg-admin',
    component: Layout,
    children: [
        {
            path: '',
            name: 'sgDashboard',
            component: Dashboard,
        },
        user_routes,
    ]
};


export default routes;
