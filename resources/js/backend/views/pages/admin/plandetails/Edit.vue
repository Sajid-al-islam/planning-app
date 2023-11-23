<template>
    <div class="page-body">
        <div class="py-2" v-if="loaded">
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
                                <router-link :to="{ name: `AllPlanDetails` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"><i
                                        class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <form @submit.prevent="submitHandler($event)" class="user_create_form card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="admin_form form_1" v-if="this.single_plan.dofa">
                                        <!-- <template v-for="(
                                                form_field, index
                                            ) in form_fields" :key="index">
                                            <common-input :label="form_field.label" :type="form_field.type"
                                                :name="form_field.name" :multiple="form_field.multiple"
                                                :value="form_field.value" :data_list="form_field.data_list
                                                    " />
                                                    serial: this.single_plan.serial,
                                                    dofa: this.single_plan.dofa.title,
                                                    orjitobbo_target: this.single_plan.orjitobbo_target.title,
                                                    kormo_porikolpona: this.single_plan.plan_title,
                                                    chok: "",
                                                    bastobayonkari: "",
                                                    bastobayonkari_person: "",
                                        </template> -->
                                        <!-- {{ this.single_plan.dofa.title }} -->
                                        <div class="form-group">
                                            <label for="">Enter serial</label>
                                            <div class="mt-1 mb-3"><input class="form-control" type="number" :value="this.single_plan.serial" name="serial" id="serial" /></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">দফা</label>
                                            <!-- <div class="mt-1 mb-3"><input class="form-control" v-if="this.single_plan.dofa" type="text" :value="this.single_plan.dofa.title" name="dofa" id="dofa" /></div> -->
                                            <select name="dofa_id" id="dofa_id" class="form-select" :value="this.single_plan.dofa_id">
                                                <option v-for="(dofa, index) in all_dofas" :key="index" :value="dofa.id">
                                                    {{ dofa.title }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">অর্জিতব্য টার্গেট</label>
                                            <!-- <div class="mt-1 mb-3"><input class="form-control" v-if="this.single_plan.orjitobbo_target" type="text" :value="this.single_plan.orjitobbo_target.title" name="orjitobbo_target" id="orjitobbo_target" /></div> -->
                                            <select name="orjitobbo_target_id" id="orjitobbo_target_id" class="form-select" :value="this.single_plan.orjitobbo_target_id">
                                                <option v-for="(target, index) in all_targets" :key="index" :value="target.id">
                                                    {{ target.title }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">কর্মপরিকল্পনা</label>
                                            <div class="mt-1 mb-3"><input class="form-control" type="text" :value="this.single_plan.plan_title" name="plan_title" id="plan_title" /></div>
                                        </div>

                                        <div class="form-group" v-if="single_plan.divisions">
                                            <label for="">বাস্তবায়নকারী</label>
                                            <dynamicSelect :select_type="'checkbox'" :data="bastobayonkaris" :sourceData="all_responsibles" :setValue="setResponsibles"></dynamicSelect>
                                        </div>

                                        <div class="form-group" v-if="single_plan.responsibles">
                                            <label for="">বাস্তবায়নকারী বৃন্দ</label>
                                            <dynamicSelect :select_type="'checkbox'" :data="single_plan.responsibles" :sourceData="all_responsible_persons" :setValue="setResponsiblePersons"></dynamicSelect>
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
import { plan_details_setup_store } from "./setup/store";
import { dofa_store } from "../dofa/setup/store";
import { target_store } from "../targets/setup/store";
import { responsible_store } from '../responsibles/setup/store';
import { responsible_person_store } from '../responsible_persons/setup/store';

export default {
    data: () => ({
        form_fields,
        param_id: null,
        form_array: [],
        responsibles: [],
        responsible_persons: [],
        active_divisions: [],
        bastobayonkaris: [],
        loaded: false,
    }),
    // watch: {
    //     all_responsibles(newValue, oldValue) {

    //     },
    // },
    created: async function () {
        let id = this.$route.params.id;
        this.param_id = id;
        await this.plan_get(id);
        await this.get_all_dofas();
        await this.get_all_targets();
        await this.get_all_responsibles();   
        await this.get_all_responsible_persons();
        if (this.single_plan) {
            this.single_plan.divisions.forEach((div, index) => {
                this.bastobayonkaris.push(div.user)
            });
        }
        this.loaded = true;
        // this.addRow();
    },

    methods: {
        ...mapActions(plan_details_setup_store, {
            user_update: "update",
            plan_get: "get",
            user_store: "store",
            store_plan: "store_plan_details"
        }),

        ...mapActions(dofa_store, {
            get_all_dofas: "get_all",
        }),

        ...mapActions(target_store, {
            get_all_targets: "get_all",
        }),

        ...mapActions(responsible_store, {
            get_all_responsibles: "get_all_responsible_users",
        }),

        ...mapActions(responsible_person_store, {
            get_all_responsible_persons: "get_all",
        }),

        deleteRow: function(index) {
            this.form_array.splice(index, 1)
        },

        submitHandler: async function ($event) {
            let bastobayonkari_id = this.responsibles.map(item => item.id)
            let bastobayonkari_person_id = this.responsible_persons.map(item => item.id)
            // console.log(bastobayonkari_id, this.responsible_persons);
            let form_data = new FormData($event.target);
            form_data.append('bastobayonkari', JSON.stringify(bastobayonkari_id));
            form_data.append('bastobayonkari_person_id', JSON.stringify(bastobayonkari_person_id));
            // let response = await this.user_store(form_data);
            this.user_update(form_data, this.param_id);
            // if (response.data.status === "success") {
            //     window.s_alert("Data successcully created");
            //     this.$router.push({ name: AllPlanDetails });
            // }

            // if (this.param_id) {
            //     this.user_update($event.target, this.param_id);
            // } else {
            //     let response = await this.user_store($event.target);
            //     if (response.data.status === "success") {
            //         window.s_alert("Data successcully created");
            //         this.$router.push({ name: `AllPlanDetails` });
            //     }
            // }
        },
        
        setResponsibles: function(tag) {
            this.responsibles = tag;
        },
        setResponsiblePersons: function(person) {
            this.responsible_persons = person;
        }
    },
    computed: {
        ...mapState(plan_details_setup_store, {
            single_plan: "single_data",
        }),
        ...mapState(dofa_store, {
            all_dofas: "all_data",
        }),
        ...mapState(target_store, {
            all_targets: "all_data",
        }),

        ...mapState(responsible_store, {
            all_responsibles: "division_users",
        }),

        ...mapState(responsible_person_store, {
            all_responsible_persons: "all_data",
        }),
        
    },
};
</script>

<style></style>
