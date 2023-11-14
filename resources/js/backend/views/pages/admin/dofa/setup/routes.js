import Layout from "./Layout.vue";
import All from "../All.vue";
import Create from "../Create.vue";

const routes = {
    path: 'dofa',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllDofa",
            component: All
        },
        {
            path: 'create',
            name: "CreateDofa",
            component: Create
        },
    ]
}


export default routes;
