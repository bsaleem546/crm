<template>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mt-2"> <i class="fa fa-user" aria-hidden="true"></i> Your Info</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="text-left" style="font-weight: bolder" v-if="mode===false">{{ userData.website }}</h6>
                    <input type="text" v-else class="form-control mb-4" placeholder="Website" v-model="formData.web">
                </div>
                <div class="col-md-12">
                    <p class="text-left" v-if="mode===false">{{ userData.name }}</p>
                    <input type="text" v-else class="form-control mb-4" placeholder="Name" v-model="formData.name">
                </div>
                <div class="col-md-12">
                    <p class="text-left" v-if="mode===false">{{ userData.refID}}</p>
                    <input type="text" v-else class="form-control mb-4" placeholder="Referral ID" v-model="formData.refID">
                </div>
                <div class="col-md-12">
                    <p class="text-left" v-if="mode===false">{{ userData.address }}</p>
                    <input type="text" v-else class="form-control mb-4" placeholder="Address" v-model="formData.address">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary"
                            style="background-color: #57AA58;width:100%" v-if="mode===false" @click="switchMode()">Update</button>
                    <button class="btn btn-primary" style="background-color: #57AA58;width:100%" v-else @click="save()">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { useToast } from "vue-toastification";
    export default {
        setup() {
            const toast = useToast();
            return { toast }
        },
        name: "Info",
        props:['user'],
        data() {
            return {
                mode: false,
                formData: {
                    web:'',
                    name:'',
                    refID:'',
                    address:'',
                },
                userData:this.user,
            }
        },
        methods: {
            switchMode() {
                this.mode = true;
            },
            save() {
                axios({
                    method: 'post',
                    url: MAINURL+'profileSave',
                    data: this.formData,
                }).then( (response) => {
                    this.userData = response.data.data;
                    this.mode = false;
                    this.toast.info(response.data.status);
                }).catch((err) => {
                    this.toast.error(err.message);
                });
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>
