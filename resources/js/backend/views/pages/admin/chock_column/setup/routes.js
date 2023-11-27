import Layout from "./Layout.vue";
import AllChokColumn from "../All.vue";
import CreateChokColumn from "../Create.vue";

const routes = {
    path: 'chok-column',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllChokColumn",
            component: AllChokColumn
        },
        // {
        //     path: 'create',
        //     name: "CreateChokColumn",
        //     component: CreateChokColumn
        // },
        {
            path: 'chock-column-create/:chok_id',
            name: "CreateBulkChokColumn",
            component: CreateChokColumn
        },
    ]
}


export default routes;
