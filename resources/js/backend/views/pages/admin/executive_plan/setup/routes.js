import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'executive-plan',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllExecutivePlan",
            component: All
        },
        {
            path: 'create',
            name: "CreateExecutivePlan",
            component: Form
        },
    ]
}


export default routes;
