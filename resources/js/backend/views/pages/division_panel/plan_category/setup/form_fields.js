export default [
    {
        name: "serial",
        label: "serial",
        type: "number",
        value: "",
    },
    {
        name: "plan_details",
        label: "Enter Plan details",
        type: "text",
        value: "",
    },
    {
        name: "section",
        label: "Enter section name",
        type: "text",
        value: "",
    },
    {
        name: "phone",
        label: "Enter your phone number",
        type: "number",
        value: "",
    },
    {
        name: "uid",
        label: "Enter your user code",
        type: "text",
        value: "",
    },
    {
        name: "telegram_name",
        label: "Enter your telegram name",
        type: "text",
        value: "",
    },
    {
        name: "telegram_id",
        label: "Enter your telegram id",
        type: "text",
        value: "",
    },
    {
        name: "image",
        label: "Upload your image",
        type: "file",
        value: "",
        multiple: false,
    },

    {
        name: "status",
        label: "select default status",
        type: "select",
        value: "",
        multiple: false,
        data_list: [
            {
                label: "Active",
                value: "active",
            },
            {
                label: "Inactive",
                value: "inactive",
            },
        ],
    },
];
