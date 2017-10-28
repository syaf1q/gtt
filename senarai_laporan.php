<script>
	function laporan(){
		window.location.target="_blank"
		window.open('page.php?menushort=laporan_keseluruhan','_blank');
	}
	function laporan_agihan(){
		window.location.target="_blank"
		window.open('page.php?menushort=laporan_agihan','_blank');
	}
	function laporan_agihan_pemegang_saham(){
		window.location.target="_blank"
		window.open('page.php?menushort=laporan_agihan_pemegang_saham','_blank');
	}
</script>
<div class="container">
  <div class="row">
    <div class="col-md-12">   
        <div class="panel panel-primary">
        	<div class="panel-heading">Senarai Laporan-laporan</div>
  			<div class="panel-body">
            	<table>
                	<tr>
                    	<td>
                        	<button onclick="laporan()" class="btn btn-danger btn-lg" type="button" aria-expanded="false">Laporan Keseluruhan</button>
                        </td>
						<td>
                        	&nbsp;
                        </td>
						<td>
                        	<button onclick="laporan_agihan()" class="btn btn-danger btn-lg" type="button" aria-expanded="false">Laporan Agihan Komisen</button>
                        </td>
						<td>
                        	&nbsp;
                        </td>
						<td>
                        	<button onclick="laporan_agihan_pemegang_saham()" class="btn btn-danger btn-lg" type="button" aria-expanded="false">Laporan Agihan Pemegang Saham</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>