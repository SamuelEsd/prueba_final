<template>
    <div>
        <h1 class="text-center">Discos</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Album</th>
                <th scope="col">Artista</th>
                <th scope="col">Año</th>
                <th scope="col">Foto</th>

                <th scope="col" colspan="2" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="disc in discs" :key="disc.id">
                <th scope="row"> {{ disc.id }} </th>
                <td> {{ disc.name }} </td>
                <td> {{ disc.album }} </td>
                <td> {{ disc.artist }} </td>
                <td> {{ disc.year }} </td>
                <td> {{ disc.photo }} </td>
                <td> 
                    <button class="btn btn-primary">Editar</button>    
                    <button @click="erase(disc.id)" class="btn btn-secodary btn-outline-danger">Eliminar</button>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            discs:[],
        }
    },
    methods: {
        async list() {
            const res = await axios.get('discs');
            // console(res);
            this.discs = res.data;
        },

        async erase(id) {
            const res = await axios.delete('discs/'+id);
            this.list();
        }
    },
    created() {
        this.list();
    },
}
</script>

<style lang="">
    
</style>