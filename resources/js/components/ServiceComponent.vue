<template>
<div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Layanan</h3>
      </div>
      
      <div class="box-body row display-flex-wrap">
        <div class="form-group col-xs-12">
          <label>Nama Layanan</label>
          <div class="row" v-for="(service,s) in services">
            <div class="col-xs-11">
              <select :name="'services['+s+'][service_list_id]'" v-model="service.service_list_id" class="form-control" required>
                  <option value="">--Pilih--</option>
                  <option v-for="(servicelist,sl) in servicelists" :value="servicelist.id">{{ servicelist.name }}</option>
              </select>
            </div>
              <button type="button" class="btn btn-box-tool" @click="remove(s)"><i class="fa fa-times"></i></button>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="form-group">
          <button type="button" @click="add()" class="btn btn-primary col-xs-12">
            <span class="fa fa-plus"></span> Tambah
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        props:['edit_services'],
        data(){
            return {
                services:[{
                    service_list_id:''
                }],
                servicelists:[{}]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            this.edit_services ? this.services = this.edit_services : null;
            axios.get('/api/servicelists').then(res=>{
                // console.log(res);
                this.servicelists = res.data;
            });
        },
        methods:{
            add(){
                this.services.push({
                    service_list_id:''
                });
            },
            remove(index){
                this.services.splice(index,1);
            }
        }
    }
</script>
