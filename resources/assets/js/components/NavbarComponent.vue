<template>
	 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	 	<div class="container">
	 		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
              <li v-for="link in links"  v-if=" !link.dropdown" class="nav-item">
                <a class="nav-link" :href="$data.urllink+'/'+link.url">{{link.link_name}}</span></a>
              </li>
           
              <li class="nav-item dropdown" v-for="(link, index) in links" v-if="link.dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{link.link_name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a v-for="navdrop in links[index].navdropdwons" class="dropdown-item" :href="$data.urllink+'/'+navdrop.url">{{navdrop.name}}</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
    </nav>

</template>
<script>
	export default {

		data() {
			return {
				urllink : window.location.protocol +'//' + window.location.hostname +':'+ window.location.port,
				links : [
					{id: 1, link_name : 'Home', url : 'home', dropdown : false},
					{id: 2, link_name : 'Barang', url : 'barang', dropdown : true, navdropdwons : [
							{name : 'Tambah Data Barang',  url : 'tambah-data-barang'},
							{name : 'Data Barang',  url : 'data-barang'} 
						]
					},
					{id: 3, link_name : 'Transaksi', url : 'transaksi', dropdown : true, navdropdwons : [
							{name : 'Tambah Data Transaksi', url : 'tambah-data-transaksi'},
							{name : 'Data Transaksi',  url : 'data-transaksi'}
						] 
					}
				],
			}
		},
		
	}
</script>

