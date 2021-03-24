window.DataTable = {
    table(options) {
        return {
            page: 1,
            items: [],
            pages: [],
            search: "",
            offset: 5,
            perPage: 10,
            defaultTableComponent: true,
            tableLoading: false,
            sorted: {
                key: "id",
                rule: "desc",
            },
            active: 1,
            pagination: {
                to: null,
                from: null,
                total: null,
                per_page: null,
                last_page: null,
                current_page: null,
            },
            sort: function (key, rule) {
                this.sorted = { key, rule };
                this.get();
            },
            reloadTable: async function () {
                await this.get();
            },
            get: async function () {
                const { key, rule } = this.sorted;
                this.tableLoading = true;

                const response = await axios.get(
                    `${this.url}?per_page=${this.perPage}&page=${this.page}&sortby=${key}&sortbykey=${rule}&keyword=${this.search}`
                );

                const {
                    to,
                    data,
                    from,
                    total,
                    per_page,
                    last_page,
                    current_page,
                } = await response.data;

                this.pagination.to = to;
                this.pagination.from = from;
                this.pagination.total = total;
                this.pagination.per_page = per_page;
                this.pagination.last_page = last_page;
                this.pagination.current_page = current_page;

                this.items = data;
                this.tableLoading = false;
                this.showPages();
            },
            init: async function () {
                this.get();

                this.$watch("perPage", (value) => {
                    this.perPage = value;
                    this.page = 1;
                    this.active = 1;
                    this.get();
                });

                this.$watch("search", (value) => {
                    this.search = value;
                    this.page = 1;
                    this.active = 1;
                    this.get();
                });

                this.$watch("pagination.current_page", (value) => {
                    this.page = value;
                    this.get();
                });
            },
            changePage: function (page) {
                if (this.page === page) {
                    return;
                }

                if (page >= 1 && page <= this.pagination.last_page) {
                    this.pagination.current_page = page;

                    const total = this.items.length;
                    const lastPage = Math.ceil(total / this.perPage) || 1;
                    const from = (page - 1) * this.perPage + 1;

                    let to = page * this.perPage;

                    if (page === lastPage) {
                        to = total;
                    }

                    this.pagination.to = to;
                    this.pagination.from = from;
                    this.pagination.total = total;
                    this.active = page;
                    this.showPages();
                }
            },
            showPages: function () {
                const pages = [];
                let from =
                    this.pagination.current_page - Math.ceil(this.offset / 2);

                if (from < 1) {
                    from = 1;
                }

                let to = from + this.offset - 1;
                if (to > this.pagination.last_page) {
                    to = this.pagination.last_page;
                }

                while (from <= to) {
                    pages.push(from);
                    from++;
                }

                this.pages = pages;
            },
            ...options,
        };
    },
};
