<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">All Division Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <span>
                            <router-link
                                :to="{ name: `CreateDivisionPlan` }"
                                class="btn rounded-pill btn-outline-info"
                            >
                                <i class="fa fa-pencil me-5px"></i>
                                Create
                            </router-link>
                        </span>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <h6>
                            All Division Plans
                            <!---->
                        </h6>
                        <div class="search">
                            <form action="#">
                                <input
                                    v-model.debounce:1000ms="search_data"
                                    placeholder="search..."
                                    type="search"
                                    class="form-control border border-info"
                                />
                            </form>
                        </div>
                        <div class="btns d-flex gap-2 align-items-center">
                            <div class="table_actions">
                                <a @click.prevent=""
                                    href="#"
                                    class="btn px-3 btn-outline-secondary"
                                    ><i class="fa fa-list"></i
                                ></a>
                                <ul>
                                    <li>
                                        <a href="">
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Export All
                                        </a>
                                    </li>
                                    <!---->
                                    <li>
                                        <a href="#/division/import" class="">
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Import
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            title="display data that has been deactivated"
                                            class="d-flex"
                                        >
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Deactivated data
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive card-body text-nowrap">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="t-head">
                                    <th>
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                        />
                                    </th>
                                    <th aria-label="id" class="cursor_n_resize">
                                        Serial
                                        <!---->
                                    </th>
                                    <th class="cursor_n_resize">
                                        Plan details
                                        <!---->
                                    </th>
                                    <th class="cursor_n_resize">
                                        section
                                        <!---->
                                    </th>
                                    <th class="cursor_n_resize">
                                        sub_section
                                        <!---->
                                    </th>
                                    <th class="cursor_n_resize">
                                        Dofa
                                    </th>
                                    <th class="cursor_n_resize">
                                        Plan Category
                                    </th>
                                    <th class="cursor_n_resize">
                                        Numeric value
                                    </th>
                                    <th class="cursor_n_resize">
                                        Deadline
                                    </th>
                                    <th class="cursor_n_resize">
                                        Status
                                    </th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr
                                    v-for="(item, index) in all_divisions.data"
                                    :key="item.id"
                                >
                                    <td>
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                        />
                                    </td>
                                    <td>{{ item.serial }}</td>
                                    <td>
                                        <span class="text-warning cursor_pointer">
                                            {{ item.plan_details }}
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            {{ item.section }}
                                        </span>
                                    </td>
                                    <td>{{ item.sub_section }}</td>
                                    <td>{{ item.dofa_id ?? "N/A" }}</td>
                                    <td>{{ item.plan_category_id }}</td>
                                    <td>{{ item.numeric_value }}</td>
                                    <td>{{ item.deadline }}</td>
                                    <td>
                                        <span
                                            class="badge bg-label-success me-1"
                                            >{{ item.status }}</span
                                        >
                                        <!---->
                                    </td>
                                    <td>
                                        <div class="table_actions">
                                            <a
                                                @click.prevent=""
                                                href="#"
                                                class="btn btn-sm btn-outline-secondary"><i class="fa fa-gears"></i
                                            ></a>
                                            <ul>
                                                <!-- <li>
                                                    <a href="">
                                                        <i
                                                            class="fa text-info fa-eye"
                                                        ></i>
                                                        Quick View
                                                    </a>
                                                </li> -->
                                                <!-- <li>
                                                    <span>
                                                        <a
                                                            href="#/division/details/43"
                                                            class=""
                                                        >
                                                            <i
                                                                class="fa text-secondary fa-eye"
                                                            ></i>
                                                            Details
                                                        </a>

                                                    </span>
                                                </li> -->
                                                <li>
                                                    <span>
                                                        <router-link
                                                            :to="{
                                                                name: 'Create',
                                                                query: {
                                                                    id: item.id,
                                                                },
                                                            }"
                                                            class=""
                                                        >
                                                            <i
                                                                class="fa text-warning fa-pencil"
                                                            ></i>
                                                            Edit
                                                        </router-link>
                                                        <!---->
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <a
                                                            @click.prevent="
                                                                division_delete(
                                                                    item.id
                                                                )
                                                            "
                                                            href="#"
                                                            class=""
                                                        >
                                                            <i
                                                                class="fa text-danger fa-trash"
                                                            ></i>
                                                            Delete
                                                        </a>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="card-footer py-1 border-top-0 d-flex justify-content-between border border-1"
                    >
                        <pagination :data="all_divisions" :method="division_get_all" />
                        <div class="float-right">
                            <div class="show-limit d-inline-block">
                                <span>Limit:</span>
                                <select class="" v-model="offset">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="show-limit d-inline-block">
                                <span>Total:</span>
                                <span>{{ all_divisions.total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas_backdrop">
                    <!---->
                </div>
                <div class="canvas_backdrop">
                    <div class="content right">
                        <div class="content_header">
                            <h3 class="offcanvas-title">Selected Users</h3>
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="cotent_body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>id</th>
                                        <th>name</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { division_setup_store } from "./setup/store";

export default {
    data: () => ({
        offset: "5",
        search_data: "",
    }),
    created: async function () {
        await this.division_get_all();
    },
    methods: {
        ...mapActions(division_setup_store, {
            division_get_all: "all",
            division_delete: "delete",
        }),
    },
    computed: {
        ...mapState(division_setup_store, {
            all_divisions: "all_data",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.division_get_all("divisions");
        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },
    },
};
</script>

<style></style>
