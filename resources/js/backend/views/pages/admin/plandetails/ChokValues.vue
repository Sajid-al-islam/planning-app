<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                Add chok values to plan
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
                    <!-- <form @submit.prevent="StorePlanSubmitHandler" class="chok_create_form card"> -->
                    <form @submit.prevent="submitHandler()" class="chok_create_form card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="admin_form form_1">
                                        <div class="form-group">
                                            <label for="select_plan">Select Chok</label>
                                            <div class="mt-1 mb-3">
                                                <select name="yearly_plan_details_id" class="form-control" @change.prevent="getChokColumns($event)" id="select_plan" v-model="chok_id">
                                                    <option v-for="(chok, index) in choks" :key="index"
                                                        :value="chok.id">
                                                        {{ chok.chok_title }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" v-if="this.chok_columns.length > 0">
                                        <div class="table-responsive">
                                            <table class="table table-border">
                                                <thead>
                                                    <th>ছক কলাম</th>
                                                    <th>ছক এর তথ্য</th>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(form, index) in chok_columns" :key="index">
                                                        <td>
                                                            <span>{{ form.key }} :</span>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="chok_column" v-model="form.chok_value">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
import { chok_store } from '../chock/setup/store';

export default {
    data: () => ({
        form_fields,
        param_id: null,
        loaded: false,
        chok_id: null,
        chok_columns: []
    }),
    created: async function () {
        await this.chok_get();
    },
    methods: {
        ...mapActions(chok_store, {
            chok_update: "update",
            chok_get: "get_all",
            chok_store: "store",
        }),

        submitHandler: async function () {
            
            // let response = await this.user_store();
            // if (response.data.status === "success") {
            //     window.s_alert("Data successcully created");
            //     // this.$router.push({ name: `AllChok` });
            // }
        },

        getChokColumns: function (event) {
            let id = event.target.value;

            this.choks.forEach(element => {
                if(element.id == id) {
                    // let temp_obj = {};
                    // this.chok_columns = element.columns;
                    let chok_columns = element.columns;
                    let chok_columns_value = chok_columns.map((item) => {
                        let temp_obj = {};
                        temp_obj.id = item.id
                        temp_obj.chok_id = item.chok_id;
                        temp_obj.key = item.key;
                        temp_obj.chok_value = '';
                        return temp_obj;
                    });

                    this.chok_columns = chok_columns_value;
                }
            });

            console.log(this.chok_columns);
        }
    },
    computed: {
        ...mapState(chok_store, {
            choks: "all_data",
        }),
    },
};
</script>

<style></style>
