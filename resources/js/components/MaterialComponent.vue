<template>
<div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Material</h3>
      </div>
      
      <div class="box-body row display-flex-wrap">
        <div class="form-group col-xs-12">
          <label>Nama Material</label>
          <div class="row" v-for="(material,s) in materials">
            <div class="col-xs-11">
              <select :name="'materials['+s+'][material_list_id]'" v-model="material.material_list_id" class="form-control" required>
                  <option value="">--Pilih--</option>
                  <option v-for="(materiallist,sl) in materiallists" :value="materiallist.id">{{ materiallist.name }}</option>
              </select>
            </div>
              <button type="button" class="btn btn-box-tool" @click="remove(s)"><i class="fa fa-times"></i></button>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="form-group">
          <button type="button" @click="add()" class="btn btn-info col-xs-12">
            <span class="fa fa-plus"></span> Tambah
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      props:['edit_materials'],
        data(){
            return {
                materials:[{
                    material_list_id:''
                }],
                materiallists:[{}]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            this.edit_materials ? this.materials = this.edit_materials : null;
            axios.get('/api/materiallists').then(res=>{
                // console.log(res);
                this.materiallists = res.data;
            });
        },
        methods:{
            add(){
                this.materials.push({
                    material_list_id:''
                });
            },
            remove(index){
                this.materials.splice(index,1);
            }
        }
    }
</script>
