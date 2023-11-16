import { defineStore } from "pinia";

export const plan_details_setup_store = defineStore("plan_details_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        all: async function (url) {
            let response;
            // let page = `?page=${pageLimit}`;

            if (url) {
                response = await axios.get(url);
            } else {
                response = await axios.get("yearly-plan-details");
            }
            this.all_data = response.data.data;
        },
        get: async function (id) {
            let response = await axios.get("yearly-plan-details/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post("yearly-plan-details", formData);
            return response;
        },

        store_plan_details: async function (form) {
            let formData = form;
            let response = await axios.post("yearly-plan-details", formData);
            return response;
        },
        update: async function (form, id) {
            const headers = {
                'Content-Type': 'application/x-www-form-urlencoded',
            };
            let formData = new FormData(form);
            let response = await axios.post(`yearly-plan-details/update/${id}`, formData);
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("yearly-plan-details/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
    },
});
