<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid" v-if="loaded">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                Create chok column of : <span class="text-info fw-bold">{{ single_chok.chok_title }}</span>
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `AllChok` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"><i
                                        class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <form @submit.prevent="submitHandler" class="chok_column_create_form card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-border">
                                            <thead>
                                                <th># action</th>
                                                <th>ছক কলাম</th>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(form, index) in form_array.chok_columns" :key="index">
                                                
                                                    <td>
                                                        <button type="button" @click="addRow()" class="btn btn-sm btn-primary ms-2">
                                                            <i class="icon-plus"></i>
                                                        </button>
                                                        <button type="button" v-if="form_array.chok_columns.length > 1" @click="deleteRow(index)" class="btn btn-sm btn-danger ms-2">
                                                            <i class="icon-trash"></i>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="chok_column" v-model="form.chok_column">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-outline-info">
                                <i class="fa fa-upload"></i>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import form_fields from "./setup/form_fields.js";
import { plan_setup_store as chokStore } from "./setup/store";
export default {
    data: () => ({
        form_fields,
        param_id: null,
        form_array: {
            chok_id: null,
            chok_columns: []
        },
        loaded: false
    }),

    created: async function () {
        let id = this.$route.params.chok_id;
        this.form_array.chok_id = id;
        if (id) {
            this.param_id = id;
            await this.chok_column_get(id);
            
            if (this.single_chok) {
                let chok_columns = this.single_chok.columns.map((item) => {
                    let temp_obj = {};
                    temp_obj.id = item.id
                    temp_obj.chok_id = item.chok_id;
                    temp_obj.chok_column = item.key;

                    return temp_obj;
                })
                this.form_array.chok_columns = chok_columns;
                this.addRow();
                this.loaded = true;
            }
        }

    },

    methods: {
        ...mapActions(chokStore, {
            chok_column_update: "update",
            chok_column_get: "get",
            chok_column_store: "store_bulk",
        }),

        addRow: function () {
            this.form_array.chok_columns.push(
                {
                    serial: this.form_array.length + 1,
                    chok_id: this.$route.params.chok_id,
                    chok_column: "",
                }
            )
        },
        deleteRow: function(index) {
            this.form_array.chok_columns.splice(index, 1)
        },
        submitHandler: async function ($event) {
            // if (this.param_id) {
            //     this.chok_column_update($event.target, this.param_id);
            // } else {
                let response = await this.chok_column_store(this.form_array);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `AllChok` });
                }
            // }
        },
    },
    computed: {
        ...mapState(chokStore, {
            single_chok: "single_data",
        }),
    },
};
</script>

<style></style>
