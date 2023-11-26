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
                    <div  class="chok_create_form card">
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
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <div id="dtable">
                                            <!-- <div>
                                                selected: {{ selected }}
                                            </div> -->
                                            <!-- <div>
                                                <label for="">rows</label>
                                                <input type="number" v-model="row">
                                            </div>
                                            <div>
                                                <label for="">col</label>
                                                <input type="number" v-model="col">
                                            </div> -->
                                            
                                            <div class="row">
                                                <div class="col-md-9 col-sm-8 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="">value</label>
                                                        <input type="text" class="form-control" id="cell_value" v-model="selected.value">
                                                    </div>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td v-for="c in matrix[0].length+1" :key="c">
                                                                <div>{{ c }}</div>
                                                            </td>
                                                        </tr>
                                                        <tr v-for="(row, index) in matrix" :key="index">
                                                            <td>{{ index + 1 }}</td>
                                                            <template v-for="(col, cl_index) in row">
                                                                <td v-if="!col.ishide" :key="cl_index" :rowspan="col.rowspan || 1" :colspan="col.colspan || 1">
                                                                    <div @click="select(col)"
                                                                        :style="`background-color: ${col.background_color}; transform: rotate(${col.rotate}deg);top: ${col.top}px;left: ${col.left}px; font-size: ${col.font_size}px;`"
                                                                        class="table_cell" :class="{active: col.isselected, text_rotate: col.text_rotate}">
                                                                        {{col.value}}
                                                                    </div>
                                                                </td>
                                                            </template>
                                                        </tr>
                                                    </table>
                                                    <br>
                                                    <table>
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
                                                <div class="col-md-3 col-sm-4 col-12">
                                                    <div>
                                                        <button class="btn btn-primary" @click="reset()">reset</button>
                                                    </div>
                                                    <div>
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="">colspan</label>
                                                            <input type="number" id="" class="form-control" v-model="selected.colspan">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="">rowspan</label>
                                                            <input type="number" class="form-control" v-model="selected.rowspan">
                                                        </div>
                                                    </div>
                                                    
                                                    <div>
                                                        <div class="form-group form-check mt-2">
                                                            <input type="checkbox" class="form-check-input" v-model="selected.text_rotate" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Rotate</label>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="">background_color</label>
                                                            <input type="color" class="form-control form-control-color" v-model="selected.background_color">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="">rotate deg</label>
                                                            <input type="number" class="form-control" v-model="selected.rotate">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="">top</label>
                                                            <input type="number" class="form-control" v-model="selected.top">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="">left</label>
                                                            <input type="number" class="form-control" v-model="selected.left">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="">font_size</label>
                                                            <input type="number" class="form-control" v-model="selected.font_size">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="form-group mt-2">
                                                            <button class="btn btn-outline-primary me-2" @click="add_row">add row</button>
                                                            <button class="btn btn-outline-primary" @click="add_cols">add col</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="matrix"></div>
                                        </div>
                                        
                                    </div>
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
        chok_table_id: null,
        chok_columns: [],
        
        matrix: [],
        row: 10,
        col: 10,
        selected: {},
        table_manipulating: false,
        col_data: {
            colspan: 1,
            rowspan: 1,
            ishide: 0,
            value: '',
            isselected: false,
            isheading: 0,
            width: 100,
            background_color: '',
            border: '',
            text_rotate: 0,
            rotate: 0,
            top: 0,
            left: 0,
            font_size: 14,
        },
    }),
    created: async function () {
        // console.log('hello');
        this.chok_id = this.$route.params.chok_id;
        this.chok_table_id = this.$route.params.chok_table_id;

        

        await this.chok_get();
        let chok_edit_data = await this.chok_column_edit_item(this.chok_id, this.chok_table_id);
        console.log(chok_edit_data);
        
        this.matrix = chok_edit_data;
        
    },
    watch: {
        matrix: {
            handler: function (v) {
                if (!this.table_manipulating) {
                    localStorage.setItem('table', JSON.stringify(v));
                    this.set_cols();
                }
            },
            deep: true,
        }
    },
    methods: {
        ...mapActions(chok_store, {
            chok_update: "update",
            chok_get: "get_all",
            chok_store: "store",
            chok_value_update: "chok_column_value_update",
            chok_column_edit_item: "chok_column_edit_data"
        }),

        submitHandler: async function () {
            if(this.chok_id == null) {
                return window.s_alert("please select the chock first", 'warning');
            }
            let data = {
                chok_id: this.chok_id,
                chok_table_id: this.chok_table_id,
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
                window.s_alert("Data updated successfully!");
            }
            // let formData =
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
        },

        make_table: function () {
            for (let row = 0; row < this.row; row++) {
                let row_data = []
                for (let col = 0; col < this.col; col++) {
                    let col_data = this.col_data;
                    row_data.push({ ...col_data })
                }
                this.matrix.push(Array.from(row_data));
            }
        },
        reset: async function () {
            var data = await window.s_confirm();
            if(data) {
                this.matrix = [];
                this.make_table();
            }
        },
        select: function (item) {
            this.selected.isselected = false;
            [...document.querySelectorAll('.table_cell')].forEach(e => e.classList.remove('active'))
            event.target.classList.add('active')
            item.isselected = true;
            this.selected = item;
            document.getElementById('cell_value').focus();
        },
        unhide: function (row, col) {
            this.matrix[row][col].ishide = false;
            this.matrix[row][col].value = "";
        },
        add_row: function () {
            let row_data = []
            for (let col = 0; col < this.matrix[0].length; col++) {
                let col_data = this.col_data;
                row_data.push({ ...col_data });
            }
            this.matrix.push(Array.from(row_data));
        },
        add_cols: function () {
            this.table_manipulating = true;
            let col_data = this.col_data;
            for (let i = 0; i < this.matrix.length; i++) {
                this.matrix[i]?.push({ ...col_data })
            }
            this.table_manipulating = false;
        },
        set_cols: function () {
            let matrix = this.matrix;
            const table = document.createElement('table');
            let rows = this.row;
            let columns = this.col;
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
                                    matrix[i][j + hide_col].value = value;
                                    matrix[i][j + hide_col].background_color = background_color;
                                }
                            }
                        }

                        if (rowspan > 1) {
                            cell.rowSpan = rowspan;
                            cell.style.writingMode = 'tb-rl';
                            cell.style.transform = "rotate(180deg)";

                            for (let hide_row = 1; hide_row <= rowspan - 1; hide_row++) {
                                matrix[i + hide_row][j].ishide = true;
                                matrix[i + hide_row][j].value = value;
                                matrix[i + hide_row][j].background_color = background_color;

                                if (colspan > 1) {
                                    console.log('in');
                                    for (let hide_row_cols = 1; hide_row_cols <= colspan - 1; hide_row_cols++) {
                                        matrix[i + hide_row][j + hide_row_cols].ishide = true;
                                        matrix[i + hide_row][j + hide_row_cols].value = value;
                                        matrix[i + hide_row][j + hide_row_cols].background_color = background_color;
                                    }
                                }
                            }
                            cell.colSpan = colspan;
                        }
                    }
                }
            }
            // document.getElementById('matrix').innerHTML = '';
            // document.getElementById('matrix').appendChild(table);
        }
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
