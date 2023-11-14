import Layout from "./Layout.vue";
import AllSuggestion from "../All.vue";
import CreateSuggestion from "../Create.vue";

const routes = {
    path: 'suggestions',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllSuggestion",
            component: AllSuggestion
        },
        {
            path: 'create',
            name: "CreateSuggestion",
            component: CreateSuggestion
        },
    ]
}


export default routes;
