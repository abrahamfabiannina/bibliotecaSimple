var app = new Vue({
    el: '#usuarios',

    data: {
        usuarios: [],
        newUsuario: { 'email': '', 'password': '', 'nombre': '', 'apellido': '', 'rol': '', 'foto': '' },
        fillUsuario: { 'email': '', 'password': '', 'nombre': '', 'apellido': '', 'rol': '', 'foto': '', 'id': '' },
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
        this.getVueUsuarios(this.pagination.current_page);
    },


    methods: {
        showAddUsuarioModal: function showAddUsuarioModal() {
            this.newUsuario.email = '';
            this.newUsuario.password = '';
            this.newUsuario.nombre = '';
            this.newUsuario.apellido = '';
            this.newUsuario.rol = '';
            this.newUsuario.foto = '';
            this.formErrors = '';
        },

        getVueUsuarios: function getVueUsuarios(page) {
            var that = this;
            axios.get('api/usuarios?page=' + page).then(function (response) {
                that.usuarios = response.data.data.data;
                that.pagination = response.data.pagination;

                that.$nextTick(function () {
                    $('[data-toggle="popover"]').popover();
                });
            });
        },

///CREAR
        createUsuario: function createUsuario() {
            var input = this.newUsuario;
            var that = this;
            axios.post('api/usuarios', input).then(function (response) {
                that.getVueUsuarios();
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.success('Registro Guardado Exitosamente');
                $(that.$refs.add_usuario_modal).on("hidden.bs.modal", that.hideAddUsuarioModal());
            }).catch(function (error) {
                that.formErrors = error.response.data;
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.error('Oops! Fill in the required fields!');
            });
        },

        hideAddUsuarioModal: function hideAddUsuarioModal() {
            $(this.$refs.add_usuario_modal).modal('hide');
        },
//crear

///EDITAR

        editUsuario: function editUsuario(usuario) {
            this.fillUsuario = usuario;
            this.formErrors = '';
        },

        updateUsuario: function updateUsuario() {
            var input = this.fillUsuario;
            var id = this.fillUsuario.id;
            var that = this;
            axios.patch('api/usuarios/' + id, input).then(function (response) {
                that.getVueUsuarios();
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.success('Registro editado Exitosamente');
                $(that.$refs.add_usuario_modal).on("hidden.bs.modal", that.hideEditUsuarioModal());
            }).catch(function (error) {
                that.formErrors = error.response.data;
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.error('Oops! Fill in the required fields!');
            });
        },

        hideEditUsuarioModal: function hideEditUsuarioModal() {
            $(this.$refs.edit_usuario_modal).modal('hide');
        },
///EDITAR


//ELIMINAR
    delUsuario: function delUsuario(usuario) {
          this.fillUsuario = usuario;
            this.formErrors = '';
        },

 deleteUsuario: function deleteUsuario() {
            var id = this.fillUsuario.id;
            var that = this;
            axios.delete('api/usuarios/' + id).then(function (response) {
                that.getVueUsuarios();
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.warning('Registro Eliminado Exitosamente');
                $(that.$refs.add_usuario_modal).on("hidden.bs.modal", that.hideDeleteUsuarioModal());
            }).catch(function (error) {
                that.formErrors = error.response.data;
                toastr.options = {
                    "timeOut": "2000"
                }, toastr.error('Oops! Fill in the required fields!');
            });
        },
         hideDeleteUsuarioModal: function hideDeleteUsuarioModal() {
            $(this.$refs.del_usuario_modal).modal('hide');
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
            this.getVueUsuarios(page);
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
