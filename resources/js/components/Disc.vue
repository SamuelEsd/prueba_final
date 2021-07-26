<template>
    <div>
        <h1 class="text-center">Discos</h1>

        <form class="form-inline my-2 my-lg-0">
            <div class="col text-center">
                <input class="form-control mr-sm-2 col-lg-8" type="search" 
                placeholder="Search" aria-label="Search"
                v-model="buscador"
                @keyup="search_discs">
                <button class="btn btn-outline-succes my-2 my-sm-0" type="submit">Search</button>
            </div>
        </form>

        <!-- Button trigger modal -->
        

        <!-- Modal -->
        <div class="modal fade" :class="{show:modal}" @click="closeModal();">
            <div class="modal-dialog" role="document">
                <div class="modal-wrapper">
                    <div class="modal-content" @click.stop="">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ titleModal }}</h5>
                            <button @click="closeModal();" type="button" class="close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="name">Nombre</label>
                                <input v-model="disc.name" class="form-control" type="text" name="name" id="name" placeholder="Nombre">
                            </div>
                            <div>
                                <label for="album">Album</label>
                                <input v-model="disc.album" class="form-control" type="text" name="album" id="album" placeholder="Album">
                            </div>
                            <div>
                                <label for="artist">Artista</label>
                                <input v-model="disc.artist" class="form-control" type="text" name="artist" id="artist" placeholder="Artista">
                            </div>
                            <div>
                                <label for="year">Año</label>
                                <input v-model="disc.year" class="form-control"  type="tel" name="year" id="year" placeholder="Año">
                                
                            </div>
                            <div >
                                <label for="photo">Foto</label>
                                <input v-model="disc.photo" class="form-control" type="text" name="photo" id="photo" placeholder="Foto">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click="closeModal();" type="button" class="btn btn-secondary" >Cancelar</button>
                            <button @click="save();" type="button" class="btn btn-success ">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <!-- <th scope="col">Id</th> -->
                <th scope="col">Nombre</th>
                <th scope="col">Album</th>
                <th scope="col">Artista</th>
                <th scope="col">Año</th>
                <th scope="col">Foto</th>

                <th scope="col" colspan="2" class="text-center">
                    <div class="col text-center">
                        <button @click="update=false; openModal();" type="button" class="btn btn-primary" >
                        Aregar Disco
                        </button>
                    </div>
                </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="disc in discs" :key="disc.id">
                <!-- <th scope="row"> {{ disc.id }} </th> -->
                <td> {{ disc.name }} </td>
                <td> {{ disc.album }} </td>
                <td> {{ disc.artist }} </td>
                <td> {{ disc.year }} </td>
                <td> <img v-bind:src="'images/albums/' + disc.photo"
                class="landscape" alt=""> </td>
                <td> 
                    <button @click="update=true; openModal(disc);" class="btn btn-primary">Editar</button>    
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
            disc:{
                name: '',
                album: '',
                artist: '',
                year: '',
                photo: '',
            },
            titleModal:'',
            modal:0,
            update:true,
            id:0,
            search_timeout:'',
            buscador: '',
        }
    },
    methods: {
        async get_discs(){
            const res = await axios.get('searchdiscs',{
                params: {
                    buscador: this.buscador,
                }
            });
            this.discs = res.data;
        },
        search_discs() {
            clearTimeout(this.search_timeout);
            this.search_timeout = setTimeout(this.get_discs, 400)
        },

        async list() {
            const res = await axios.get('discs');
            this.discs = res.data;
            console.log(this.buscador);
        },

        async erase(id) {
            const res = await axios.delete('discs/'+id);
            this.list();
        },

        async save() {
            if(this.update){
                const res = await axios.put('/discs/'+this.id, this.disc);
            }
            else{
                console.log(this.disc);
                console.log(this.disc.photo);
                const res = await axios.post('/discs', this.disc);
            }
            this.closeModal();
            this.list();
        },

        async openModal(data={}) {
            this.modal = 1;
            if (this.update) {
                this.id = data.id;
                this.titleModal = "Editar";
                this.disc.name = data.name;
                this.disc.album = data.album;
                this.disc.artist = data.artist;
                this.disc.year = data.year;
                this.disc.photo = data.photo;
            }
            else{
                this.id = 0;
                this.titleModal = "Agregar";
                this.disc.name = '';
                this.disc.album ='';
                this.disc.artist ='';
                this.disc.year ='';
                this.disc.photo ='';
            }
        },
        async closeModal() {
            this.modal = 0;
        },
    },
    created() {
        this.list();
    },
    
}
</script>

<style >
    .show{
        display: list-item;
        opacity: 1;
        background: rgba(1, 19, 53, 0.425);
    }
    img {
        max-width: 100%;
        max-height: 100%;
    }
    .landscape {
        height: 50px;
        width: 50px;
}
</style> 