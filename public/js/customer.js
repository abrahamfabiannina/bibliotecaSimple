var app = new Vue({
    el: '#demo',

    data: {
        customers: [],
        newCustomer: { 'first_name': '', 'last_name': '', 'email': '', 'gender': '' },
        fillCustomer: { 'first_name': '', 'last_name': '', 'image': '', 'email': '', 'id': '' },
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors: {},
        formErrorsUpdate: {}
    },

    computed: {
        isActived: function isActived() {
            return this.pagination.current_page;
        },

        pagesNumber: function pagesNumber() {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + this.offset * 2;
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    mounted: function mounted() {
        this.getVueCustomers(this.pagination.current_page);
    },


    methods: {
        showAddCustomerModal: function showAddCustomerModal() {
            this.newCustomer.first_name = '';
            this.newCustomer.last_name = '';
            this.newCustomer.email = '';
            this.newCustomer.gender = 'm';
            this.formErrors = '';
        },

        getVueCustomers: function getVueCustomers(page) {
            var that = this;
            axios.get('api/customers?page=' + page).then(function (response) {
                that.customers = response.data.data.data;
                that.pagination = response.data.pagination;

                that.$nextTick(function () {
                    $('[data-toggle="popover"]').popover();
                });
            });
        },

///CREAR
        createCustomer: function createCustomer() {
            var input = this.newCustomer;
            var that = this;
            axios.post('api/customers', input).then(function (response) {
                that.getVueCustomers();
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.success('Registro Guardado Exitosamente');
                $(that.$refs.add_customer_modal).on("hidden.bs.modal", that.hideAddCustomerModal());
            }).catch(function (error) {
                that.formErrors = error.response.data;
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.error('Oops! Fill in the required fields!');
            });
        },

        hideAddCustomerModal: function hideAddCustomerModal() {
            $(this.$refs.add_customer_modal).modal('hide');
        },
//crear

///EDITAR

        editCustomer: function editCustomer(customer) {
            this.fillCustomer = customer;
            this.formErrors = '';
        },

        updateCustomer: function updateCustomer() {
            var input = this.fillCustomer;
            var id = this.fillCustomer.id;
            var that = this;
            axios.patch('api/customer/' + id, input).then(function (response) {
                that.getVueCustomers();
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.success('Registro editado Exitosamente');
                $(that.$refs.add_customer_modal).on("hidden.bs.modal", that.hideEditCustomerModal());
            }).catch(function (error) {
                that.formErrors = error.response.data;
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.error('Oops! Fill in the required fields!');
            });
        },

        hideEditCustomerModal: function hideEditCustomerModal() {
            $(this.$refs.edit_customer_modal).modal('hide');
        },
///EDITAR


//ELIMINAR
    delCustomer: function delCustomer(customer) {
          this.fillCustomer = customer;
            this.formErrors = '';
        },

 deleteCustomer: function deleteCustomer() {
            var id = this.fillCustomer.id;
            var that = this;
            axios.delete('api/customer/' + id).then(function (response) {
                that.getVueCustomers();
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.warning('Registro Eliminado Exitosamente');
                $(that.$refs.add_customer_modal).on("hidden.bs.modal", that.hideDeleteCustomerModal());
            }).catch(function (error) {
                that.formErrors = error.response.data;
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.error('Oops! Fill in the required fields!');
            });
        },
         hideDeleteCustomerModal: function hideDeleteCustomerModal() {
            $(this.$refs.del_customer_modal).modal('hide');
        },
///ELIMINAR

        changePage: function changePage(page) {
            this.pagination.current_page = page;
            this.getVueCustomers(page);
        }

      }//fin de metods
});
