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
                                    <th>Tipo usuario</th>
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
                                    <td>{{ usuario.tipo_usuario.nombre_tipo }}</td>
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
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required
                                v-model="usuario.nombre">
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required
                                v-model="usuario.correo">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contrasenya</label>
                            <input type="password" class="form-control" id="password" name="password" required
                                v-model="usuario.password">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required
                                v-model="usuario.telefono">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="text" class="form-control" id="foto" name="foto" required
                                v-model="usuario.foto">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" checked
                                v-model="usuario.activo">
                            <label class="form-check-label" for="activo">Activo</label>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_usuario_id_tipo" class="form-label">Tipo Usuario</label>
                            <select class="form-select" id="tipo_usuario_id_tipo" name="tipo_usuario_id_tipo" required
                                v-model="usuario.tipo_usuario_id_tipo">
                                <option value="1" :selected="usuario.tipo_usuario_id_tipo === '1'">Superadministrador
                                </option>
                                <option value="2" :selected="usuario.tipo_usuario_id_tipo === '2'">Administrador
                                </option>
                                <option value="3" :selected="usuario.tipo_usuario_id_tipo === '3'">Rider</option>
                                <option value="4" :selected="usuario.tipo_usuario_id_tipo === '4'">Proveedor</option>
                            </select>
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
            usuario: {},
            insert: false,
            selectedType: 'admins',
            filteredUsuarios: []
        };
    },
    methods: {
        selectUsers() {
            axios.get('http://localhost:8080/practicas/ShareBites/public/api/gestion')
                .then(response => {
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
                    return usuario.tipo_usuario_id_tipo === 1 || usuario.tipo_usuario_id_tipo === 2;
                } else if (this.selectedType === 'riders') {
                    return usuario.tipo_usuario_id_tipo === 3;
                } else if (this.selectedType === 'provee') {
                    return usuario.tipo_usuario_id_tipo === 4;
                }
            });
        },
        showForm() {
            this.insert = true;
            this.myModal = new bootstrap.Modal('#crearModal');
            this.myModal.show();
        },
        editUser(usuario) {
            this.insert = false;
            this.usuario = usuario;
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
                    console.log(response.data);
                    me.selectUsers()
                    me.myModal.hide()
                })
                .catch(error => {
                    console.error('Error al crear el usuario:', error);
                });
        },
        updateUser(id) {
            const me = this;
            axios.put(`http://localhost:8080/practicas/ShareBites/public/api/gestion/${id}`, me.usuario)
                .then(response => {
                    me.selectUsers()
                    me.myModal.hide()
                })
                .catch(error => {
                    console.error('Error al crear el usuario:', error);
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