<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} plan
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `All` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"><i
                                        class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <form @submit.prevent="submitHandler" class="user_create_form card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="admin_form form_1">
                                        <!-- <template v-for="(
                                                form_field, index
                                            ) in form_fields" :key="index">
                                            <common-input :label="form_field.label" :type="form_field.type"
                                                :name="form_field.name" :multiple="form_field.multiple"
                                                :value="form_field.value" :data_list="form_field.data_list
                                                    " />
                                        </template> -->
                                        <div class="form-group">
                                            <label for="">Session</label>
                                            <div class="mt-1 mb-3">
                                                <input class="form-control" type="date" name="session" id="session" />
                                            </div>
                                        </div>

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
import { plan_setup_store } from "./setup/store";

export default {
    data: () => ({
        form_fields,
        param_id: null,
    }),

    created: async function () {
        let id = this.$route.query.id;
        if (id) {
            this.param_id = id;
            await this.user_get(id);
            if (this.single_user) {
                form_fields.forEach((field, index) => {
                    Object.entries(this.single_user).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }
                    });
                });
            }
        } else {
            form_fields.forEach((item) => {
                item.value = "";
            });
        }
        
    },

    methods: {
        ...mapActions(plan_setup_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            store_plan: "store_plan_details"
        }),

        // ...mapActions(dofa_store, {
        //     get_all_dofas: "get_all",
        // }),

        // ...mapActions(target_store, {
        //     get_all_targets: "get_all",
        // }),

        // ...mapActions(responsible_store, {
        //     get_all_responsibles: "get_all",
        // }),

        // ...mapActions(responsible_person_store, {
        //     get_all_responsible_persons: "get_all",
        // }),

        // addRow: function () {
        //     this.form_array.push(
        //         {
        //             serial: this.form_array.length + 1,
        //             dofa: "",
        //             orjitobbo_target: "",
        //             kormo_porikolpona: "",
        //             chok: "",
        //             bastobayonkari: "",
        //             bastobayonkari_person: "",
        //         }
        //     )
        // },

        // deleteRow: function(index) {
        //     this.form_array.splice(index, 1)
        // },

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.user_update($event.target, this.param_id);
            } else {
                let response = await this.user_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `AllPlan` });
                }
            }
        },
        // StorePlanSubmitHandler: async function() {
        //     let formData = JSON.stringify(this.form_array);
        //     let storeResponse = this.store_plan(formData);
        //     if(response.data) {
        //         window.s_alert("data updated!");
        //     }
        // }
    },
    computed: {
        ...mapState(plan_setup_store, {
            single_user: "single_data",
        }),
        // ...mapState(dofa_store, {
        //     all_dofas: "all_data",
        // }),
        // ...mapState(target_store, {
        //     all_targets: "all_data",
        // }),

        // ...mapState(responsible_store, {
        //     all_responsibles: "all_data",
        // }),

        // ...mapState(responsible_person_store, {
        //     all_responsible_persons: "all_data",
        // }),
    },
};
</script>

<style></style>
