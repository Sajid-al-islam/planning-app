import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import Edit from "../Edit.vue";

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
        {
            path: 'edit/:id',
            name: "EditPlanDetails",
            component: Edit
        },
    ]
}


export default routes;
