import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'plan',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllPlan",
            component: All
        },
        {
            path: 'create',
            name: "CreatePlan",
            component: Form
        },
    ]
}


export default routes;
