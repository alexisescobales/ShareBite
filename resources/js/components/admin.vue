<template>
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col text-start">
                            <h2 class="tituloG">Gestionar <span class="amarilloG">Riders</span></h2>
                        </div>
                        <div class="col text-center">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-info" :class="{ active: selectedType === 'admins' }">
                                    <input type="radio" name="status" value="admins" v-model="selectedType">
                                    Administradores
                                </label>
                                <label class="btn btn-success" :class="{ active: selectedType === 'riders' }">
                                    <input type="radio" name="status" value="riders" v-model="selectedType">
                                    Riders
                                </label>
                                <label class="btn btn-warning" :class="{ active: selectedType === 'provee' }">
                                    <input type="radio" name="status" value="provee" v-model="selectedType">
                                    Proveedores
                                </label>
                            </div>
                        </div>
                        <div class="col text-end">
                            <button class="btn btn-primary" @click="showForm">Crear Usuario</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <table class="table table-dark table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Foto</th>
                                    <th v-if="selectedType === 'provee'">Dirección</th>
                                    <th v-if="selectedType === 'provee'">Categoria</th>
                                    <th v-if="selectedType === 'provee'">Menus</th>
                                    <th v-if="selectedType === 'provee'">Horario</th>
                                    <th>Activo</th>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="usuario in filteredUsuarios" :key="usuario.id_usuario">
                                    <td>{{ usuario.id_usuario }}</td>
                                    <td>{{ usuario.nombre }}</td>
                                    <td>{{ usuario.correo }}</td>
                                    <td>{{ usuario.telefono }}</td>
                                    <td>{{ usuario.foto }}</td>
                                    <td v-if="selectedType === 'provee'">
                                        <div>
                                            <div v-for="tienda in usuario.tiendas" :key="tienda.id">{{ tienda.direccion
                                                }}</div>
                                        </div>
                                    </td>
                                    <td v-if="selectedType === 'provee'">
                                        <div>
                                            <div v-for="tienda in usuario.tiendas" :key="tienda.id">{{ tienda.categoria
                                                }}</div>
                                        </div>
                                    </td>
                                    <td v-if="selectedType === 'provee'">
                                        <div>
                                            <div v-for="tienda in usuario.tiendas" :key="tienda.id">{{ tienda.menus
                                                }}</div>
                                        </div>
                                    </td>
                                    <td v-if="selectedType === 'provee'">
                                        <div>
                                            <div v-for="tienda in usuario.tiendas" :key="tienda.id">{{ tienda.horario
                                                }}</div>
                                        </div>
                                    </td>
                                    <td>{{ usuario.activo ? 'Sí' : 'No' }}</td>
                                    <td>
                                        <button class="btn btn-primary" @click="editUser(usuario)">Editar</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" @click="confirmDesactivar(usuario)">X</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="defuseModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Desactivar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Esta seguro que quiere desactivar el usuario <strong>{{ usuario.nombre }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary"
                        @click="desactivarUser(usuario.id_usuario)">Desactivar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="crearModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 v-if="insert" class="modal-title">Crear Usuario</h5>
                    <h5 v-else class="modal-title">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="tipo_usuario_id_tipo" class="form-label">Tipo Usuario</label>
                            <select class="form-select" id="tipo_usuario_id_tipo" name="tipo_usuario_id_tipo" required
                                v-model="usuario.tipo_usuario_id_tipo">
                                <option value="1" :selected="usuario.tipo_usuario_id_tipo === '1'">Administrador
                                </option>
                                <option value="3" :selected="usuario.tipo_usuario_id_tipo === '3'">Rider</option>
                                <option value="2" :selected="usuario.tipo_usuario_id_tipo === '2'">Proveedor</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required
                                v-model="usuario.nombre">
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required
                                v-model="usuario.correo">
                        </div>
                        <div v-if="insert" class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required
                                v-model="usuario.password">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required
                                v-model="usuario.telefono">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="text" class="form-control" id="foto" name="foto" required
                                v-model="usuario.foto">
                        </div>
                        <div v-if="insert">
                            <div class="mb-3" v-if="usuario.tipo_usuario_id_tipo === '2'">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    v-model="usuario.tiendas[0].direccion">
                            </div>
                        </div>
                        <div v-else>
                            <div class="mb-3" v-if="mostrar">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    v-model="usuario.tiendas[0].direccion">
                            </div>
                        </div>
                        <div v-if="insert">
                            <div class="mb-3" v-if="usuario.tipo_usuario_id_tipo === '2'">
                                <label for="categoria" class="form-label">Categoria</label>
                                <input type="text" class="form-control" id="categoria" name="categoria"
                                    v-model="usuario.tiendas[0].categoria">
                            </div>
                        </div>
                        <div v-else>
                            <div class="mb-3" v-if="mostrar">
                                <label for="categoria" class="form-label">Categoria</label>
                                <input type="text" class="form-control" id="categoria" name="categoria"
                                    v-model="usuario.tiendas[0].categoria">
                            </div>
                        </div>
                        <div v-if="insert">
                            <div class="mb-3" v-if="usuario.tipo_usuario_id_tipo === '2'">
                                <label for="menus" class="form-label">Menus</label>
                                <input type="text" class="form-control" id="menus" name="menus"
                                    v-model="usuario.tiendas[0].menus">
                            </div>
                        </div>
                        <div v-else>
                            <div class="mb-3" v-if="mostrar">
                                <label for="menus" class="form-label">Menus</label>
                                <input type="text" class="form-control" id="menus" name="menus"
                                    v-model="usuario.tiendas[0].menus">
                            </div>
                        </div>
                        <div v-if="insert">
                            <div class="mb-3" v-if="usuario.tipo_usuario_id_tipo === '2'">
                                <label for="horario" class="form-label">Horario</label>
                                <input type="text" class="form-control" id="horario" name="horario"
                                    v-model="usuario.tiendas[0].horario">
                            </div>
                        </div>
                        <div v-else>
                            <div class="mb-3" v-if="mostrar">
                                <label for="horario" class="form-label">Horario</label>
                                <input type="text" class="form-control" id="horario" name="horario"
                                    v-model="usuario.tiendas[0].horario">
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo"
                                :checked="usuario.activo" v-model="usuario.activo">
                            <label class="form-check-label" for="activo">Activo</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button v-if="insert" type="button" class="btn btn-primary"
                        @click="insertarUsuario()">Crear</button>
                    <button v-else type="button" class="btn btn-primary"
                        @click="updateUser(usuario.id_usuario)">Editar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import * as bootstrap from 'bootstrap';

export default {
    data() {
        return {
            usuarios: [],
            myModal: {},
            usuario: {
                id_usuario: null,
                tipo_usuario_id_tipo: '',
                nombre: '',
                correo: '',
                password: '',
                telefono: '',
                foto: '',
                tiendas: [
                    {
                        direccion: '',
                        categoria: '',
                        menus: '',
                        horario: ''
                    }
                ],
                activo: false
            },
            mostrar: false,
            insert: false,
            selectedType: 'admins',
            filteredUsuarios: []
        };
    },
    methods: {
        resetUsuario() {
            this.usuario = {
                id_usuario: null,
                tipo_usuario_id_tipo: '',
                nombre: '',
                correo: '',
                password: '',
                telefono: '',
                foto: '',
                tiendas: [
                    {
                        direccion: '',
                        categoria: '',
                        menus: '',
                        horario: ''
                    }
                ],
                activo: false
            };
        },
        selectUsers() {
            axios.get('http://localhost:8080/practicas/ShareBites/public/api/gestion')
                .then(response => {
                    console.log(response.data.data);
                    this.usuarios = response.data.data;
                    this.filterUsuarios();
                })
                .catch(error => {
                    console.error('Error al cargar usuarios:', error);
                });
        },
        filterUsuarios() {
            this.filteredUsuarios = this.usuarios.filter(usuario => {
                if (this.selectedType === 'admins') {
                    return usuario.tipo_usuario_id_tipo === 0 || usuario.tipo_usuario_id_tipo === 1;
                } else if (this.selectedType === 'riders') {
                    return usuario.tipo_usuario_id_tipo === 3;
                } else if (this.selectedType === 'provee') {
                    return usuario.tipo_usuario_id_tipo === 2;
                }
            });
        },
        showForm() {
            this.insert = true;
            this.resetUsuario();
            this.myModal = new bootstrap.Modal('#crearModal');
            this.myModal.show();
        },
        editUser(usuario) {
            this.insert = false;
            this.usuario = usuario;
            if (this.usuario.tipo_usuario_id_tipo === 2) {
                this.mostrar = true;
            }
            this.myModal = new bootstrap.Modal('#crearModal');
            this.myModal.show();
        },
        confirmDesactivar(usuario) {
            this.usuario = usuario;
            this.myModal = new bootstrap.Modal('#defuseModal');
            this.myModal.show();
        },
        insertarUsuario() {
            const me = this;
            console.log(me.usuario);
            axios.post('http://localhost:8080/practicas/ShareBites/public/api/gestion', me.usuario)
                .then(response => {
                    debugger
                    console.log(response.data);
                    me.selectUsers()
                    me.myModal.hide()
                })
                .catch(error => {
                    debugger
                    console.error('Error al crear el usuario:', error);
                });
        },
        updateUser(id) {
            const me = this;
            console.log(me.usuario);
            axios.put(`http://localhost:8080/practicas/ShareBites/public/api/gestion/${id}`, me.usuario)
                .then(response => {
                    console.log(response.data);
                    me.selectUsers()
                    me.myModal.hide()
                })
                .catch(error => {
                    console.error('Error al editar el usuario:', error);
                });
        },
        desactivarUser(id) {
            axios.delete(`http://localhost:8080/practicas/ShareBites/public/api/gestion/${id}`)
                .then(response => {
                    console.log(response.data.mensaje);
                    this.selectUsers();
                    this.myModal.hide()
                })
                .catch(error => {
                    console.error('Error al desactivar el usuario:', error);
                });
        },
    },
    watch: {
        selectedType() {
            this.filterUsuarios();
        }
    },
    created() {
        this.selectUsers();
    }
};
</script>

<style>
.card {
    margin-top: 20px;
    background-color: #252525;
}

.amarilloG {
    color: #ecbc13;
}

.tituloG {
    color: #fbfbfb;
}
</style>