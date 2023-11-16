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
                                        <!-- <div class="form-group">
                                            <label for="">Enter serial</label>
                                            <div class="mt-1 mb-3"><input class="form-control" type="number" name="serial" id="serial" /></div>
                                        </div> -->

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-border">
                                            <thead>
                                                <th style="min-width: auto;">#</th>
                                                <th style="min-width: 50px;">sl</th>
                                                <th style="min-width: 150px;">দফা</th>
                                                <th style="min-width: 150px;">অর্জিতব্য টার্গেট</th>
                                                <th style="min-width: 200px;">কর্মপরিকল্পনা</th>
                                                <th style="min-width: 200px;">ছক</th>
                                                <th style="min-width: 200px;">বাস্তবায়নকারী</th>
                                                <th style="min-width: 250px;">বাস্তবায়নকারী বৃন্দ</th>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(form, index) in form_array" :key="index">
                                                    <td>
                                                        <button @click="addRow()" class="btn btn-sm btn-primary ms-2">+</button>
                                                        <button class="btn btn-sm btn-danger ms-2">-</button>
                                                    </td>
                                                    <td style="width: 80px;">
                                                        <input type="text" class="form-control" v-model="form.serial">
                                                    </td>
                                                    <td>
                                                        <select name="dofa_id" id="dofa_id" class="form-select" v-model="form.dofa">
                                                            <option v-for="(dofa, index) in all_dofas" :key="index" :value="dofa.id">
                                                                {{ dofa.title }}
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="orjitobbot_target" id="orjitobbot_target" class="form-select" v-model="form.orjitobbo_target">
                                                            <option v-for="(target, index) in all_targets" :key="index" :value="target.id">
                                                                {{ target.title }}
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" v-model="form.kormo_porikolpona">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" v-model="form.chok">
                                                    </td>
                                                    <td>
                                                        <select name="orjitobbo_target" id="orjitobbo_target" class="form-select" v-model="form.bastobayonkari">
                                                            <option value="1">1</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="orjitobbo_target" id="orjitobbo_target" class="form-select" v-model="form.bastobayonkari">
                                                            <option value="1">1</option>
                                                        </select>
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
import { plan_setup_store } from "./setup/store";
import { dofa_store } from "../dofa/setup/store";
import { target_store } from "../targets/setup/store";

export default {
    data: () => ({
        form_fields,
        param_id: null,
        form_array: []
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
        await this.get_all_dofas();
        await this.get_all_targets();
        await this.get_all_responsibles();   

        this.addRow();
    },

    methods: {
        ...mapActions(plan_setup_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
        }),

        ...mapActions(dofa_store, {
            get_all_dofas: "get_all",
        }),

        ...mapActions(target_store, {
            get_all_targets: "get_all",
        }),

        addRow: function () {
            this.form_array.push(
                {
                    serial: this.form_array.length + 1,
                    dofa: "",
                    orjitobbo_target: "",
                    kormo_porikolpona: "",
                    chok: "",
                    bastobayonkari: "",
                    bastobayonkari_person: "",
                }
            )
        },

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
        ...mapState(plan_setup_store, {
            single_user: "single_data",
        }),
        ...mapState(dofa_store, {
            all_dofas: "all_data",
        }),
        ...mapState(target_store, {
            all_targets: "all_data",
        }),
    },
};
</script>

<style></style>
