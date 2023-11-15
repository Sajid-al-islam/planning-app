import Layout from "./Layout.vue";
import AllChok from "../All.vue";
import CreateChok from "../Create.vue";

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
    ]
}


export default routes;
