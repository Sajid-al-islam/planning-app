<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} user
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link
                                    :to="{ name: `All` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"
                                    ><i class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <form
                        @submit.prevent="submitHandler"
                        class="user_create_form card"
                    >
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="admin_form form_1">
                                        <div class="form-group">
                                            <div class="mt-1 mb-3">
                                                <input type="number" class="form-control" name="serial" id="serial">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mt-1 mb-3">
                                                <input type="text" class="form-control" name="plan_details" id="plan_details">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mt-1 mb-3">
                                                <input type="text" class="form-control" name="section" id="section">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mt-1 mb-3">
                                                <input type="text" class="form-control" name="sub_section" id="sub_section">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="mt-1 mb-3">
                                                <select name="dofa_id" id="dofa_id" class="form-select" v-model="form.dofa">
                                                    <option v-for="(dofa, index) in all_dofas" :key="index" :value="dofa.id">
                                                        {{ dofa.title }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="mt-1 mb-3">
                                                <select name="dofa_id" id="dofa_id" class="form-select" v-model="form.dofa">
                                                    <option v-for="(dofa, index) in all_dofas" :key="index" :value="dofa.id">
                                                        {{ dofa.title }}
                                                    </option>
                                                </select>
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
import { division_setup_store } from "./setup/store";
// import { plan_category_store } from '../responsibles/setup/store';
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
        ...mapActions(division_setup_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.user_update($event.target, this.param_id);
            } else {
                let response = await this.user_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `All` });
                }
            }
        },
    },
    computed: {
        ...mapState(division_setup_store, {
            single_user: "single_data",
        }),
    },
};
</script>

<style></style>
