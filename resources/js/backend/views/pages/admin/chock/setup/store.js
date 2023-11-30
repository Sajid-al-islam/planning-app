import { defineStore } from "pinia";
// import { resolveBaseUrl } from "vite";

export const chok_store = defineStore("chok_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        url: "yearly-plan-choks",
        processing_status: 0,
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
            let response = await axios.get("yearly-plan-details/" + id);
            response = response.data.data;
            this.single_data = response;
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
            console.log(data);
            let total_row = data.data.length;
            let process_row = 0;
            let that = this;
            async function save_data(process_row) {
                console.log('processing: '+ process_row);
                let formData = {
                    chok_id: data.chok_id,
                    data: [data.data[process_row]],
                }
                await axios.post("yearly-plan-chok-columns", {formData});
                if(process_row < total_row){
                    process_row = process_row + 1;
                    that.processing_status = Math.round(100 * process_row / total_row);
                    await save_data(process_row);
                }
            }
            await save_data(process_row);
            that.processing_status = 0;
            console.log('finised');

            let response = await this.chok_column_data_by_chok(data.chok_id);
            return response;
        },
        chok_column_value_update: async function (data) {
            let formData = data
            let response = await axios.post("yearly-plan-details-chok-values/store", {formData});
            return response;
        },
        chok_column_edit_data: async function (chok_id, table_chok_no) {
            let response = await axios.get("yearly-plan-chok-columns" + '/' + chok_id + '/' + table_chok_no);
            let return_response = response.data;
            
            return return_response;
        },

        chok_column_data_by_chok: async function (chok_id) {
            // console.log(chok_id);
            let chok_response = await axios.get("yearly-plan-chok-columns-by-chok" + '/' + chok_id);
            let return_chok_response = chok_response.data;
            
            console.log(chok_response.data);
            return return_chok_response;
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
