<template>
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title mt-2"> <i class="fa fa-folder-o" aria-hidden="true"></i> Contacts</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between" v-for="c in contacts" :key="c.id">
                    <p class="text-left">{{ c.contact }}</p>
                    <i class="fa fa-trash" aria-hidden="true" @click="deleteContacts(c.id)"></i>
                </div>
                <hr>

                <div class="col-md-12" v-if="mode === true" >
                    <input type="text" class="form-control mb-4" placeholder="Contact" v-model="formData.contact">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" @click="changeMode" v-if="mode === false"
                            style="background-color: #dbdedb;width:100%; color:#000;border:none">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Contact
                    </button>
                    <button class="btn btn-primary" style="background-color: #57AA58;width:100%" v-else @click="addContacts()">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {useToast} from "vue-toastification";
    export default {
        setup() {
            const toast = useToast();
            return { toast }
        },
        name: "Contact",
        data() {
            return {
                mode: false,
                contacts:{},
                formData: {
                    contact:'',
                },
            }
        },
        methods:{
            getContacts(){
                axios.get(MAINURL+'getContact').then( (res) => {
                    this.contacts = res.data
                });
            },
            addContacts(){
                if(this.formData.contact === ''){
                    this.toast.warning('Contact is empty ........');
                    return;
                }
                axios({
                    method: 'post',
                    url: MAINURL+'addContact',
                    data: this.formData,
                }).then( (response) => {
                    this.getContacts()
                    this.mode = false;
                    this.toast.info(response.data.status);
                    this.formData.contact = '';
                }).catch((err) => {
                    this.toast.error(err.message);
                });
            },
            deleteContacts(id){
                axios.delete(MAINURL+'deleteContact/'+id)
                    .then((res) => {
                        this.toast.info(res.data.status);
                        this.getContacts()
                    }).catch((err) => {
                    this.toast.error(err.message);
                });

            },
            changeMode(){
                this.mode = true
            },
        },
        mounted() {
            this.getContacts()
        }
    }
</script>

<style scoped>

</style>
