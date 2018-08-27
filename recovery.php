<!-- js -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="plugins/combogrid/jquery-ui-1.10.1.custom.min.js"></script>
<script src="plugins/combogrid/jquery.ui.combogrid-1.6.3.js"></script>
<!-- css -->
<link rel="stylesheet" type="text/css" media="screen" href="plugins/combogrid/jquery-ui-1.10.1.custom.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="plugins/combogrid/jquery.ui.combogrid.css"/>

<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>


<!-- content -->
<!-- <div class="container"> -->
  <br>
  <br>
  <br>
  <section class="content-header">
    <!-- <label for="">Cari</label> -->
    <h1>
      Cari
      <input type="text" id="searchTB" placeholder="cari..." name="" value="">
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-6">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Data Pengguna</h3>
            <smal class="label-default">(Read Only)</smal>
          </div>

          <!-- read only  -->
          <div class="box-body  table-responsive">
            <table class="table table-border table-hover">
              <tr>
                <td>Nama Depan</td>
                <td type="text" id="nama_dpnTD">...</td>
              </tr>
              <tr>
                <td>Nama Belakang</td>
                <td type="text" id="nama_blkTD">...</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td type="text" id="genderTD">...</td>
              </tr>
              <tr>
                <td>username</td>
                <td type="text" id="usernameTD">...</td>
              </tr>
              <tr>
                <td>Email</td>
                <td type="text" id="emailTD">...</td>
              </tr>
              <tr>
                <td>Nominal</td>
                <td type="text" id="nominalTD">...</td>
              </tr>
              <tr>
                <td>Tgl Join</td>
                <td type="text" id="tgl_joinTD">...</td>
              </tr>
              <tr>
                <td>Tgl Lunas</td>
                <td type="text" id="tgl_lunasTD">...</td>
              </tr>
              <tr>
                <td>Paytren ID</td>
                <td type="text" id="paytren_idTD">...</td>
              </tr>
              <tr>
                <td>Jaguar</td>
                <td type="text" id="jaguarTD">...</td>
              </tr>
              <tr>
                <td>Referal</td>
                <td type="text" id="referalTD">...</td>
              </tr>
              <tr>
                <td>Web Training</td>
                <td type="text" id="web_trainingTD">...</td>
              </tr>
              <tr>
                <td>Marketing</td>
                <td type="text" id="marketingTD">...</td>
              </tr>
              <tr>
                <td>DNA ID</td>
                <td type="text" id="dna_idTD">...</td>
              </tr>
              <tr>
                <td>DNA Seq</td>
                <td type="text" id="dna_seqTD">...</td>
              </tr>
              <tr>
                <td>DNA Level</td>
                <td type="text" id="dna_levelTD">...</td>
              </tr>
              <tr>
                <td>MLM type</td>
                <td type="text" id="mlm_typeTD">...</td>
              </tr>
            </table>
          </div>

        </div>
      </div><!-- end of col-md-6 -->

      <div class="col-md-6">
      <!-- form -->
        <form class="" onsubmit="saveform();return false;" action="" method="post">
          <div class="container">

             <div class="box box-info">
               <div class="box-header with-border">
                 <h3 class="box-title">Data Pengguna</h3>
                 <smal class="label-info">(Edit)</smal>
               </div>

               <!-- <div class="form-group"> -->
              <div class="box-body">
                <!-- primary key -->
                <input type="hidden" id="id_penggunaH" name="id_penggunaH" >

                <label>Tgl Expired</label>
                <div class="input-group">
                  <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                  </div>
                  <input readonly id="tgl_expTB" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>

                <label>Tgl Expired Baru (+ 2hari)</label> | format yyyy-mm-dd:
                <!-- <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div> -->

                <div class="input-group date">
                  <span class="input-group-addon">
                    <input disabled onchange="tglexp();" id="tgl_exp_newCB" name="tgl_exp_newCB" type="checkbox">
                  </span>
                  <input disabled name="tgl_exp_newTB" id="tgl_exp_newTB" type="text" class="form-control">
                </div>

                <label for="">FB </label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input disabled id="nama_fbTB" name="nama_fbTB" type="web" class="form-control" placeholder="fb">
                </div>

                <label for="">WA/Telp </label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input disabled id="no_waTB" name="no_waTB" type="web" class="form-control" placeholder="wa">
                </div>

                <br>
                <input type="submit" id="submit" value="Simpan" class="btn btn-info" />
            					
            				</div>
	            		</div>
					</form>
				</div>
			</div>

			<br />

		</div>
		<br />
	</body>

	<script>
		$(document).ready(function(){
			setTimeout(function(){
				$('.pageLoader').attr('style','display:none');
			}, 700);
		});
		
		function no_wa(nama_fbTB) {
			$.ajax({
				url:'recoveryProses.php',
				data:{
					'aksi':'no_wa',
					'nama_fb ':nama_fbTB
				},type:'post',
				dataType:'json',
				beforeSend:function () {
					$('.pageLoader').removeAttr('style');
				},success:function(ret){
					setTimeout(function(){
						$('.pageLoader').attr('style','display:none');

						var opt='';
						if(ret.total==0) opt+='<option>-data kosong-</option>';
						else{
							opt+='<option value="">-- Pilih --</option>';
							$.each(ret.returns.data, function  (id,val) {
								opt+='<option value="'+val.id_penggunaH+'"></option>';
							});
						}$('#hargacombo').html(opt);
					}, 700);
				}, error : function (xhr, status, errorThrown) {
					$('.pageLoader').attr('style','display:none');
			        alert('error : ['+xhr.status+'] '+errorThrown);
			    }
			});
		}


		function saveform(){
	        var urlx ='&mode=create';
	        $.ajax({
	            url:'recoveryProsess.php',
	            cache:false,
	            type:'post',
	            dataType:'json',
	            data:$('form').serialize()+urlx,
	            success:function(dt){
	            	console.log(dt.returns.success);
	                if(dt.returns.success==false){
	                    alert('Gagal menyimpan data');
	                }else{
	                    alert('sukses menyimpan data');
	                    resetform();
	                }
	            }
	        });
	    }

<script src="recovery.js" type="text/javascript"></script>
<script type="text/javascript">
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

  // tambahan 2 hari
  var myDate = new Date();
  $("#tgl_exp_newTB").datepicker({
      minDate: new Date(myDate.getTime() + 2 * 24 * 60 * 60 * 1000)
  });
</script>
