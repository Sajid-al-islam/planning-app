import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import user_routes from "../user/setup/routes"

const routes =
{
    path: 'user',
    component: Layout,
    children: [
        {
            path: '',
            name: 'userDashboard',
            component: Dashboard,
        },
        user_routes,
    ]
};


export default routes;
