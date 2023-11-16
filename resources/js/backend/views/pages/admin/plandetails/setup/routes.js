import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'plan-details',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllPlanDetails",
            component: All
        },
        {
            path: 'create',
            name: "CreatePlanDetails",
            component: Form
        },
    ]
}


export default routes;
