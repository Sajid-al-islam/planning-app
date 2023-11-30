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
                    <div class="card-body" v-if="matrix.length">
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
                                <div id="dtable">

                                    <div class="sheet_table table-responsive">
                                        <table class="w-100 sheet_input">
                                            <tr>
                                                <td style="width: 50px;">
                                                    <div class="text-dark">
                                                        {{(selected.row_no +1 || 0)}}:
                                                        {{(selected.col_no +1 || 0)}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <input v-if="selected.isheading == 0" id="cell_value" v-model="selected.value" type="text" class="w-100 border-0">
                                                    <input v-else disabled id="cell_value" v-model="selected.value" type="text" class="w-100 border-0">
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr v-if="matrix[0]">
                                                <td v-for="c in matrix[0].length+1" :class="{highlight: c-1 == selected.col_no +1}">
                                                    <div v-if="c-1 > 0">{{ c - 1 }}</div>
                                                </td>
                                            </tr>
                                            <tr v-for="(row, index) in matrix" :key="index">
                                                <td :class="{highlight: index == selected.row_no}">{{ index + 1 }}</td>
                                                <template v-for="(col, cl_index) in row">
                                                    <td v-if="!col.ishide" :key="cl_index" @click="select(col)" :rowspan="col.rowspan || 1"
                                                        :style="`border-width:${col.border!='#000000'?2:1}px;border-color: ${col.border};background-color: ${col.background_color};width: ${col.width}px;height: ${col.height}px;text-wrap: ${col.text_wrap?'wrap':'nowrap'};`"
                                                        :class="{active: col.isselected}" :colspan="col.colspan || 1">
                                                        <div v-if="col.isheading == 1" :style="`transform: rotate(${col.rotate}deg);top: ${col.top}px;left: ${col.left}px; font-size: ${col.font_size}px;width: ${ col.text_wrap?col.width+'px': 'unset'};cursor: not-allowed;`"
                                                            class="table_cell" :class="{text_rotate: col.text_rotate}">
                                                            {{col.value}}
                                                        </div>
                                                        <div v-else :style="`transform: rotate(${col.rotate}deg);top: ${col.top}px;left: ${col.left}px; font-size: ${col.font_size}px;width: ${ col.text_wrap?col.width+'px': 'unset'};`"
                                                            class="table_cell" :class="{text_rotate: col.text_rotate}">
                                                            {{col.value}}
                                                        </div>
                                                    </td>
                                                </template>
                                            </tr>
                                        </table>
                                    </div>
                                    <br>
                                    <table class="d-none">
                                        <tr v-for="(trow, trow_index) in matrix" :key="trow_index">
                                            <template v-for="(tcol, cl_index) in trow" :key="cl_index">
                                                <td>
                                                    <div :style="`background-color: ${tcol.background_color}`">
                                                        {{tcol.value || ''}}
                                                        <br>
                                                        <button @click="unhide(trow_index, cl_index)" v-if="tcol.ishide"
                                                            type="button">unhide</button>
                                                    </div>
                                                </td>
                                            </template>
                                        </tr>
                                    </table>
                                </div>
                                <div id="matrix" class="d-none"></div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" @click="submitHandler()"  class="btn btn-outline-info">
                            <i class="fa fa-upload"></i>
                            Submit
                        </button>
                    </div>
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
        chok_columns: [],
        
        matrix: [],
        row: 20,
        col: 20,
        selected: {},
        table_manipulating: false,
        col_data: {
            colspan: 1,
            rowspan: 1,
            row_no: 0,
            col_no: 0,
            ishide: 0,
            value: '',
            isheading: 0,
            isselected: false,
            background_color: '#ffffff',
            border: '#000000',
            text_rotate: 0,
            rotate: 0,
            width: 50,
            height: 24,
            top: 0,
            left: 0,
            font_size: 14,
            text_wrap: false,
            submitting: false,
        },
    }),
    created: async function () {
        await this.chok_get();
        let data = localStorage.getItem('table');
        if (data) {
            this.matrix = JSON.parse(data);
        } else {
            this.make_table();
        }
        
    },
    watch: {
        "matrix": {
            handler: function (v) {
                // if (!this.table_manipulating) {
                //     this.update_store();
                // }
                let that = this;
                setTimeout(function() {
                    
                }, 300);
            },
            deep: true,
        },
    },
    methods: {
        ...mapActions(chok_store, {
            chok_update: "update",
            chok_get: "get_all",
            chok_store: "store",
            chok_value_update: "chok_column_value_update",
            get_column_by_chok: "chok_column_data_by_chok"
        }),

        submitHandler: async function () {
            if(this.chok_id == null) {
                return window.s_alert("please select the chock first", 'warning');
            }
            let data = {
                chok_id: this.chok_id,
                data: this.matrix
            }
            let response = await this.chok_value_update(data);
            if (response.data.status === "success") {
                this.matrix = response.data.data;
                console.log("matrix =>",this.matrix);
                console.log("table =>",response.data);
                localStorage.removeItem('table');
                // let matrix_data = [];
                let matrix_data = Object.entries(response.data.data);
                localStorage.setItem('table', JSON.stringify(matrix_data));
                window.s_alert("Data successcully created");
            }
            // if (response.data) {
                
            //     // this.matrix = response.data;
            //     // console.log("matrix =>",this.matrix);
            //     // console.log("table =>",response.data);
            //     // localStorage.removeItem('table');
            //     // localStorage.setItem('table', JSON.stringify(response.data));
            //     window.s_alert("Data updated successcully!");
            // }
            // let formData =
        },

        getChokColumns: async function (event) {
            let id = event.target.value;
            let chok_response = await this.get_column_by_chok(id);
            console.log(chok_response);
            this.matrix = chok_response;
            this.set_cols();
            console.log(this.matrix);
        },

        update_store: function (matrix = this.matrix) {
            localStorage.setItem('table', JSON.stringify(matrix));
        },
        make_table: function () {
            for (let row = 0; row <= this.row; row++) {
                let row_data = []
                for (let col = 0; col <= this.col; col++) {
                    let col_data = this.col_data;
                    col_data.row_no = row;
                    col_data.col_no = col;
                    row_data.push({ ...col_data })
                }
                this.matrix.push(Array.from(row_data));
            }
            this.update_store();
        },
        reset: function () {
            this.matrix = [];
            this.make_table();
            this.update_store();
        },
        select: function (item) {
            this.selected.isselected = false;
            [...document.querySelectorAll('td.active')].forEach(e => e.classList.remove('active'))
            event.currentTarget.classList.add('active');
            item.isselected = true;
            this.selected = item;
            document.getElementById('cell_value').focus();
            this.update_store();
        },
        row_span: function () {
            this.update_store();
            this.set_cols();
        },
        col_span: function () {
            this.update_store();
            this.set_cols();
        },
        unhide: function (row, col) {
            this.matrix[row][col].ishide = false;
            this.matrix[row][col].value = "";
            this.update_store();
            this.set_cols();
        },
        add_row: function () {
            let row_data = []
            this.row = this.row+1;
            for (let col = 0; col < this.matrix[0].length; col++) {
                let col_data = {...this.col_data};
                col_data.row_no = this.row;
                col_data.col_no = col;
                row_data.push({ ...col_data });
            }
            this.matrix.push(Array.from(row_data));
            this.update_store();
            this.set_cols();
        },
        add_cols: function () {
            this.table_manipulating = true;
            let col_data = {...this.col_data};
            this.col = this.col+1;
            for (let i = 0; i < this.matrix.length; i++) {
                col_data.col_no = this.col;
                col_data.row_no = i;
                this.matrix[i]?.push({...col_data })
            }
            this.table_manipulating = false;
            this.update_store();
            this.set_cols();
        },
        set_cols: function () {
            // let matrix = JSON.parse(JSON.stringify(this.matrix));
            let matrix = this.matrix;
            const table = document.createElement('table');
            let rows = matrix.length;
            let columns = matrix[0].length;

            for (let i = 0; i < rows; i++) {
                for (let j = 0; j < columns; j++) {
                    const col = matrix[i][j];
                    col.col_no = j;
                    col.row_no = i;
                    col.ishide = false;
                }
            }

            // console.log(matrix);

            for (let i = 0; i < rows; i++) {
                const row = table.insertRow();
                for (let j = 0; j < columns; j++) {
                    const col = matrix[i][j];
                   
                    const textContent = col.value;
                    let colspan = col.colspan;
                    let rowspan = col.rowspan;
                    let ishide = col.ishide;
                    let value = col.value;
                    let isselected = col.isselected;
                    let background_color = col.background_color;

                    if (isselected) {
                        this.selected = col;
                    }

                    if (!ishide) {
                        const cell = row.insertCell();
                        cell.textContent = textContent || "-";

                        if (colspan > 1 && rowspan == 1) {
                            cell.colSpan = colspan;
                            // hide next cols
                            for (let hide_col = 1; hide_col <= colspan - 1; hide_col++) {
                                if (matrix[i][j + hide_col]) {
                                    matrix[i][j + hide_col].ishide = true;
                                    console.log(`hiding col: ${i} ${j + hide_col + 1}`);
                                    // matrix[i][j + hide_col].value = value;
                                    // matrix[i][j + hide_col].background_color = background_color;
                                }
                            }
                        }

                        if (rowspan > 1) {
                            cell.rowSpan = rowspan;
                            cell.style.writingMode = 'tb-rl';
                            cell.style.transform = "rotate(180deg)";

                            for (let hide_row = 1; hide_row <= rowspan - 1; hide_row++) {
                                matrix[i + hide_row][j].ishide = true;
                                // matrix[i + hide_row][j].value = value;
                                // matrix[i + hide_row][j].background_color = background_color;

                                if (colspan > 1) {
                                    for (let hide_row_cols = 1; hide_row_cols <= colspan - 1; hide_row_cols++) {
                                        matrix[i][j + hide_row_cols].ishide = true;
                                    }
                                    for (let hide_row_cols = 0; hide_row_cols <= colspan - 1; hide_row_cols++) {
                                        matrix[i + hide_row][j + hide_row_cols].ishide = true;
                                        // matrix[i + hide_row][j + hide_row_cols].value = value;
                                        // matrix[i + hide_row][j + hide_row_cols].background_color = background_color;
                                    }
                                }
                            }
                            cell.colSpan = colspan;
                        }
                    }
                }
            }

            this.matrix = matrix;
            this.update_store();
            
            // document.getElementById('matrix').innerHTML = '';
            // document.getElementById('matrix').appendChild(table);
        },
    },
    computed: {
        ...mapState(chok_store, {
            choks: "all_data",
        }),
    },
};
</script>

<style scoped>
table,
th,
td {
    border: 1px solid black;
}

th,
td {
    text-align: center;
}

td div {
    cursor: pointer;
    padding: 10px;
    text-wrap: nowrap;
    transform-origin: center;
    position: relative;
    z-index: 999;
}

.text_rotate {
    display: inline-block;
    writing-mode: tb-rl;
}

.active {
    border: 1px solid red;
}
table {
    border-collapse: collapse;
    min-width: 50%;
}
</style>
