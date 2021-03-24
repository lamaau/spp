window.Location = {
    territory(options) {
        return {
            empty: "Kosong",
            placeholder: "Pilih",
            state: {
                province: false,
                city: false,
                district: false,
                sub_district: false,
            },
            loading: {
                province: false,
                city: false,
                district: false,
                sub_district: false,
            },
            selected: {
                province: null,
                city: null,
                district: null,
                sub_district: null,
            },
            provinces: [],
            cities: [],
            districts: [],
            subDistricts: [],
            init: async function () {
                this.loading.province = true;
                this.provinces = await Helper.persist("provinces", "provinces");
                this.loading.province = false;

                this.$watch("selected.province", async ({ id, name }) => {
                    this.loading.city = true;
                    this.cities = await Helper.persist(`cities-${id}`, `cities/${id}`);
                    this.loading.city = false;
                });

                this.$watch("selected.city", async (value) => {
                    this.loading.district = true;
                    if (value) {
                        this.districts = await Helper.persist(
                            `district-${value.id}`,
                            `districts/${value.id}`
                        );
                    }
                    this.loading.district = false;
                });

                this.$watch("selected.district", async (value) => {
                    this.loading.sub_district = true;
                    if (value) {
                        this.subDistricts = await Helper.persist(
                            `sub-districts-${value.id}`,
                            `sub-districts/${value.id}`
                        );
                    }
                    this.loading.sub_district = false;
                });
            },
            changeProvince: function (item) {
                if (
                    this.selected.province &&
                    this.selected.province.id === item.id
                ) {
                    return;
                }

                this.selected.province = item;
                this.state.province = false;

                this.selected.city = null;
                this.selected.district = null;
                this.selected.sub_district = null;

                this.districts = [];
                this.subDistricts = [];

                this.$refs.province.setAttribute("value", item.id);
            },
            changeCity: function (item) {
                if (this.selected.city && this.selected.city.id === item.id) {
                    return;
                }

                this.selected.city = item;
                this.state.city = false;

                this.districts = [];
                this.subDistricts = [];
                this.selected.district = null;
                this.selected.sub_district = null;

                this.$refs.city.setAttribute("value", item.id);
            },
            changeDistrict: function (item) {
                if (
                    this.selected.district &&
                    this.selected.district.id === item.id
                ) {
                    return;
                }

                this.selected.district = item;
                this.state.district = false;

                this.subDistricts = [];
                this.selected.sub_district = null;

                this.$refs.district.setAttribute("value", item.id);
            },
            changeSubdistrict: function (item) {
                if (
                    this.selected.sub_district &&
                    this.selected.sub_district.id === item.id
                ) {
                    return;
                }

                this.selected.sub_district = item;
                this.state.sub_district = false;
                this.$refs.sub_district.setAttribute("value", item.id);
            },
            ...options,
        };
    },
};
