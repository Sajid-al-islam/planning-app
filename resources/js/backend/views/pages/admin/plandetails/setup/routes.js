import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import ChokValues from "../ChokValues.vue";
import Edit from "../Edit.vue";
import EditChokValues from "../EditChokValues.vue";

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
            path: 'chok-values/:chok_value_id',
            name: "AddChokValues",
            component: ChokValues
        },
        {
            path: 'edit/:id',
            name: "EditPlanDetails",
            component: Edit
        },

        {
            path: 'chok-values/edit/:chok_id/:chok_table_id',
            name: "EditChokValues",
            component: EditChokValues
        },
    ]
}


export default routes;
