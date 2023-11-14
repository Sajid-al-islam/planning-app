import Layout from "./Layout.vue";
import AllDofa from "../All.vue";
import CreateDofa from "../Create.vue";

const routes = {
    path: 'dofa',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllDofa",
            component: AllDofa
        },
        {
            path: 'create',
            name: "CreateDofa",
            component: CreateDofa
        },
    ]
}


export default routes;
