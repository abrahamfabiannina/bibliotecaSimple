var app = new Vue({
    el: '#libros',

    data: {
        libros: [],
        newLibro: { 'descripcion': '', 'cantidad': '', 'existencia': '', 'foto': '' },
        fillLibro: { 'descripcion': '', 'cantidad': '', 'existencia': '', 'foto': '', 'id': '' },
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
        this.getVueLibros(this.pagination.current_page);
    },


    methods: {
        showAddLibroModal: function showAddLibroModal() {
            this.newLibro.descripcion = '';
            this.newLibro.cantidad = '';
            this.newLibro.existencia = '';
            this.newLibro.foto = 'glyphicon glyphicon-book';
            this.formErrors = '';
        },

        getVueLibros: function getVueLibros(page) {
            var that = this;
            axios.get('api/libros?page=' + page).then(function (response) {
                that.libros = response.data.data.data;
                that.pagination = response.data.pagination;

                that.$nextTick(function () {
                    $('[data-toggle="popover"]').popover();
                });
            });
        },

///CREAR
        createLibro: function createLibro() {
            var input = this.newLibro;
            var that = this;
            axios.post('api/libros', input).then(function (response) {
                that.getVueLibros();
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.success('Registro Guardado Exitosamente');
                $(that.$refs.add_libro_modal).on("hidden.bs.modal", that.hideAddLibroModal());
            }).catch(function (error) {
                that.formErrors = error.response.data;
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.error('Oops! Fill in the required fields!');
            });
        },

        hideAddLibroModal: function hideAddLibroModal() {
            $(this.$refs.add_libro_modal).modal('hide');
        },
//crear

///EDITAR

        editLibro: function editLibro(libro) {
            this.fillLibro = libro;
            this.formErrors = '';
        },

        updateLibro: function updateLibro() {
            var input = this.fillLibro;
            var id = this.fillLibro.id;
            var that = this;
            axios.patch('api/libros/' + id, input).then(function (response) {
                that.getVueLibros();
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.success('Registro editado Exitosamente');
                $(that.$refs.add_libro_modal).on("hidden.bs.modal", that.hideEditLibroModal());
            }).catch(function (error) {
                that.formErrors = error.response.data;
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.error('Oops! Fill in the required fields!');
            });
        },

        hideEditLibroModal: function hideEditLibroModal() {
            $(this.$refs.edit_libro_modal).modal('hide');
        },
///EDITAR


//ELIMINAR
    delLibro: function delLibro(libro) {
          this.fillLibro = libro;
            this.formErrors = '';
        },

 deleteLibro: function deleteLibro() {
            var id = this.fillLibro.id;
            var that = this;
            axios.delete('api/libros/' + id).then(function (response) {
                that.getVueLibros();
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.warning('Registro Eliminado Exitosamente');
                $(that.$refs.add_libro_modal).on("hidden.bs.modal", that.hideDeleteLibroModal());
            }).catch(function (error) {
                that.formErrors = error.response.data;
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.error('Oops! Fill in the required fields!');
            });
        },
         hideDeleteLibroModal: function hideDeleteLibroModal() {
            $(this.$refs.del_libro_modal).modal('hide');
        },
///ELIMINAR


/*

        deleteCustomer: function deleteCustomer(id) {
            this.customers = this.customers.filter(function (item) {
                return item.id != id;
            });
            var that = this;
            axios.delete('api/customer/' + id).then(function (response) {
                that.getVueCustomers();
                toastr.options = {
                    "timeOut": "2000"
                },
                toastr.warning('Customer Deleted Successfully');
            });
        },*/

        changePage: function changePage(page) {
            this.pagination.current_page = page;
            this.getVueLibros(page);
        },

        moment: function (_moment) {
            function moment(_x) {
                return _moment.apply(this, arguments);
            }

            moment.toString = function () {
                return _moment.toString();
            };

            return moment;
        }(function (date) {
            return moment(date);
        }),

        date: function date(_date) {
            return moment(_date).format('MMMM Do YYYY, h:mm:ss a');
        }

    },

    filters: {
        moment: function (_moment2) {
            function moment(_x2) {
                return _moment2.apply(this, arguments);
            }

            moment.toString = function () {
                return _moment2.toString();
            };

            return moment;
        }(function (date) {
            return moment(date).format('L');
        })
    }

});
