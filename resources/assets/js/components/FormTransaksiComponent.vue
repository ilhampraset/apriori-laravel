<template>
   <form @submit.prevent="postBarang()">
    <input  type="hidden" name="_token" value="csrf">
    <div class="form-group row">
      <label  class="col-sm-2 col-form-label">Nama Barang</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" v-model='nama_barang' id="nama_barang" placeholder="Nama Barang">
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
        products:[],
        nama_barang: ''
      }
    },
    created() {
        let uri = 'http://127.0.0.1:3000/v1/products';
            axios.get(uri).then((response) => {
                this.products = response.data;
                console.log(this.products);
            });
       
    },
    methods: {
      postBarang : function() {
        console.log(this.nama_barang);
        axios.post('http://127.0.0.1:3000/v1/products', {name : this.nama_barang},  {headers: { 'Content-Type': 'application/x-www-form-urlencoded' }})
              .then(function (resp) {
                 
              })
              .catch(function (resp) {
                  
                  alert("Could not create your company");
              });
      }
    }
  }
</script>