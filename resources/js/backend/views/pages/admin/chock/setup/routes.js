import Layout from "./Layout.vue";
import AllChok from "../All.vue";
import CreateChok from "../Create.vue";
import CreateChokColumn from "../CreateChokColumn.vue";

const routes = {
    path: 'chok',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllChok",
            component: AllChok
        },
        {
            path: 'create',
            name: "CreateChok",
            component: CreateChok
        },
        {
            path: 'chock-column-create/:chok_id',
            name: "CreateBulkChokColumn",
            component: CreateChokColumn
        },
    ]
}


export default routes;
