import { defineStore } from "pinia";

export const chok_store = defineStore("chok_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        url: "yearly-plan-choks"
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        all: async function (url, search=null) {
            let response;
            // let page = `?page=${pageLimit}`;
            // console.log(url);
            
            if (url != undefined) {
                console.log(url.length);
                response = await axios.get(url);
            } else {
                console.log(this.url);
                response = await axios.get(this.url);
            }
            if(search != null) {
                this.url += search;
            }

            this.all_data = response.data.data;
        },
        get_all: async function (url) {
            let response;
            // let page = `?page=${pageLimit}`;
            // console.log(url);
            
            if (url != undefined) {
                response = await axios.get(url);
            } else {
                let newurl = this.url;
                newurl+= "?get_all=1"
                response = await axios.get(newurl);
            }

            this.all_data = response.data.data;
        },
        get: async function (id) {
            let response = await axios.get(this.url + '/' + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post(this.url, formData);
            return response;
        },
        store_bulk: async function (data) {
            let formData = data
            let response = await axios.post("yearly-plan-chok-columns", {formData});
            return response;
        },
        chok_column_value_store: async function (data) {
            let formData = data
            let response = await axios.post("yearly-plan-chok-columns", {formData});
            return response;
        },
        update: async function (form, id) {
            const headers = {
                'Content-Type': 'application/x-www-form-urlencoded',
            };
            let formData = new FormData(form);
            formData.append('_method', 'PUT');
            let response = await axios.post(`${this.url}/${id}`, formData);
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete(this.url + "/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
    },
});
