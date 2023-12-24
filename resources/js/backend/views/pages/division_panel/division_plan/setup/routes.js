import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'division-plan',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllDivisionPlan",
            component: All
        },
        {
            path: 'create',
            name: "CreateDivisionPlan",
            component: Form
        }
    ]
}


export default routes;
