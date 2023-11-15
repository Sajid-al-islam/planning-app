import Layout from "./Layout.vue";
import AllChokColumnValue from "../All.vue";
import CreateChokColumnValue from "../Create.vue";

const routes = {
    path: 'chok-column-values',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllChokColumnValue",
            component: AllChokColumnValue
        },
        {
            path: 'create',
            name: "CreateChokColumnValue",
            component: CreateChokColumnValue
        },
    ]
}


export default routes;
