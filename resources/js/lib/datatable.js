window.DataTable = {
    table(options) {
        return {
            items: [],
            search: null,
            view: 5,
            pages: [],
            offset: 5,
            currentPage: 1,
            sort: function (key, sort) {
                console.log(key, sort);
            },
            ...options,
        };
    },
};
