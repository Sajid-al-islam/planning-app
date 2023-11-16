import Layout from "./Layout.vue";
import AllTarget from "../All.vue";
import CreateTarget from "../Create.vue";

const routes = {
    path: 'target',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllTarget",
            component: AllTarget
        },
        {
            path: 'create',
            name: "CreateTarget",
            component: CreateTarget
        },
    ]
}


export default routes;
