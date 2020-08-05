<template>
   <form  method="POST" @submit.prevent="postBarang()">
       <input type="hidden" name="_token" :value="csrf">

    <div class="form-group row">
      <label  class="col-sm-2 col-form-label">Nama Barang</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  v-model="nama_barang" id="nama_barang">
      </div>
        
    </div>

     <div class="form-group row">
      <label  class="col-sm-2 col-form-label">Nama Barang</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  v-model="price" id="nama_barang">
      </div>
        
    </div>


 
      <div align="center">
        <button type="submit"  class="btn btn-primary btn-lg">Tambah</button>
      </div>
   
  </form>
</template>
<script>
  export default {
    data() {
      return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
       
        nama_barang : '',
        price : ''

      }
    },
    created() {
       this.fetchData();
    },
    methods: {
      postBarang : function() {
          console.log(this.nama_barang);
            axios.post('http://127.0.0.1:3000/v1/products',  {name : this.nama_barang, price: this.price}).then(function (resp) {
                      console.log(resp);
                }).catch(function (resp) {
                    console.log(resp);
                    alert("Could not create your company");
                });
         this.fetchData();
      },
      fetchData : function() {
        axios.get('http://127.0.0.1:3000/v1/products').then((res) => {
                   console.log(res.data);
                });
      }      
    }
  }
</script>