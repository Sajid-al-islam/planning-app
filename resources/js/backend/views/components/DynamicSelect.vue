<template>
    <div>
        <ul class="d-flex mb-1 flex-wrap gap-2">
            <li :class="{ active: selected.title == item.title }" class="btn btn-sm btn-outline-info px-1"
                v-for="(item, index) in component_data" :key="index">
                <div class="d-flex gap-3 align-items-baseline px-1 justify-content-between">
                    <span @click="edit(item)">
                        {{ item.title }}
                    </span>
                    <i @click="remove(index)" class="icon-close text-danger"></i>
                </div>
            </li>
        </ul>
        <input v-on:keydown.enter="onEnter" ref="input_form" @click="show=!show" v-model="input_value" type="text" class="form-control">
        <div v-if="select_type == 'checkbox'">
            <ul class="select-tools" :class="show ? '' : 'd-none'">
                <li role="button" v-for="(item, index) in sourceData" :key="index" @click="selectData(item)">
                    <span class="mx-2">
                        <input role="button" :id="'select' + index + unkey" type="checkbox">
                    </span>
                    <label role="button" :for="'select' + index + unkey" @click="selectData(item)">{{ item.title }}</label>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        setValue: Function,
        data: {
            type: Array,
            default: [],
        },
        sourceData: {
            type: Array,
            default: [],
        },
        select_type: {
            type: String,
            data: ''
        },
    },
    data: () => ({
        input_value: '',
        selected: {},
        component_data: [],
        show: false,
        unkey: Math.random(),
    }),

    created: function () {
        this.component_data = Array.from(this.data);
        console.log(this.data);
    },

    watch: {
        component_data: {
            handler: function (v) {
                console.log(v)
                this.setValue(Array.from(v))
            },
            deep: true
        }
    },

    methods: {
        onEnter: function () {
            event.preventDefault();
            if (this.input_value.length) {
                if (this.selected.title) {
                    this.selected.title = this.input_value;
                    this.selected = {};
                    this.input_value = ''
                    return;
                }
                let check = this.component_data.find(i => i.title == this.input_value);
                if (check) {
                    check.title = this.input_value
                } else {
                    this.component_data.push({
                        title: this.input_value
                    });
                }
                this.input_value = ''
                this.setValue(this.component_data.map(i => i.title))
            }
            return 0;
        },
        remove: function (index) {
            console.log(index, this.component_data);
            this.component_data.splice(index, 1);
            this.input_value = ''
        },
        edit: function (item) {
            this.input_value = item.title;
            this.$refs.input_form.focus();
            this.selected = item;
        },

        selectData: function (i) {
            let check = this.component_data.find(j => j.id == i.id);
            if (check) {
                this.component_data = this.component_data.filter(j => j.id != i.id);
            } else {
                this.component_data.push(i);
            }

        }

    }
}
</script>