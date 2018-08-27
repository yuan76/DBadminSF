$(document).ready(function () {
  $('#searchTB').focus();
});
function tglexp() {
  if ($('#tgl_exp_newCB').is(':checked')) {
    $('#tgl_exp_newTB').removeAttr('disabled');
    $('#tgl_exp_newTB').attr('required',true);
  }else{
    $('#tgl_exp_newTB').attr('disabled',true);
    $('#tgl_exp_newTB').removeAttr('required');
  }
}

    var col = [
        {
            'align':'left',
            'columnName':'fullname',
            // 'hide':true,
            'width':'20',
            'label':'Full Name'
        },{
            'align':'left',
            'columnName':'gender',
            'width':'8',
            'label':'Gender'
        },{
            'align':'left',
            'columnName':'username',
            'width':'13',
            'label':'Username'
        },{
            'align':'left',
            'columnName':'nama_fb',
            'width':'15',
            'label':'FB'
        },{
            'align':'left',
            'columnName':'tgl_exp_id',
            'width':'20',
            'label':'Expired'
    }];

    $('#searchTB').combogrid({
        debug:true,
        width:'800px',
        colModel: col ,
        url: 'recoveryProcess.php?aksi=combogrid&rows=5',
        select: function( event, ui ) { // event setelah data terpilih
          // form (edit)
            $('#id_penggunaH').val(ui.item.id);
            $('#tgl_expTB').val(ui.item.tgl_exp);
            $('#nama_fbTB').val(ui.item.nama_fb);
            $('#no_waTB').val(ui.item.no_wa);
            $('#tgl_exp_newCB').removeAttr('disabled');
            $('#nama_fbTB').removeAttr('disabled');
            $('#no_waTB').removeAttr('disabled');
            $('#simpanBtn').removeAttr('disabled');
            $('#simpanBtn').addClass('btn-info');
          // read only
            $('#usernameTD').html(': '+ui.item.username);
            $('#nama_dpnTD').html(': '+ui.item.nama_dpn);
            $('#nama_blkTD').html(': '+ui.item.nama_blk);
            $('#genderTD').html(': '+ui.item.gender);
            $('#emailTD').html(': '+ui.item.email);
            $('#nominalTD').html(': '+ui.item.nominal);
            $('#tgl_joinTD').html(': '+ui.item.tgl_join);
            $('#tgl_lunasTD').html(': '+ui.item.tgl_lunas);
            $('#paytren_idTD').html(': '+ui.item.paytren_id);
            $('#jaguarTD').html(': '+ui.item.jaguar);
            $('#referalTD').html(': '+ui.item.referal);
            $('#web_trainingTD').html(': '+ui.item.web_training);
            $('#marketingTD').html(': '+ui.item.marketing);
            $('#dna_idTD').html(': '+ui.item.dna_id);
            $('#dna_seqTD').html(': '+ui.item.dna_seq);
            $('#dna_levelTD').html(': '+ui.item.dna_level);
            $('#mlm_typeTD').html(': '+ui.item.mlm_type);

            // validasi input (tidak sesuai data dr server)
                // $('#'+el+'TB').on('keyup', function(e){
                //     var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
                //     var keyCode = $.ui.keyCode;
                //     if(key != keyCode.ENTER && key != keyCode.LEFT && key != keyCode.RIGHT && key != keyCode.UP && key != keyCode.DOWN ) {
                //         if($('#'+el+'H').val()!=''){
                //             $('#'+el+'H').val('');
                //             $('#'+el+'TB').val('');
                //
                //             $('#out_come_sisaanggaran'+(el.substring(22))+'H').val(''); // :: out_come
                //             $('#'+el+'sisaH').val(''); // sisa rekening :: in/out/ju/
                //             collectArr();
                //         }
                //     }
                // });

                // $('#'+el+'TB').on('blur,change',function(){
                //     if($('#'+el+'H').val()=='') {
                //         $('#'+el+'TB').val(''); // :: all
                //         if(subaksi=='out_come'){
                //             var x = el.substring(22);
                //             $('#out_come_sisaanggaran'+x+'H').val(''); // :: out_come
                //             $('#out_come_detilanggaran'+x+'H').val(''); // :: out_come
                //         }
                //     }
                // });
            return false;
        }
    });

    function saveform(){
      // var urlx ='&mode=create';
      $.ajax({
        // url:'action.php',
        url:'recoveryProcess.php',
        cache:false,
        type:'post',
        dataType:'json',
        data:$('form').serialize(),
        // data:$('form').serialize()+urlx,
				// beforeSend:function () {
				// 	$('.pageLoader').removeAttr('style');
				// },
        success:function(dt){
					setTimeout(function(){
          	console.log(dt.status);
						// $('.pageLoader').attr('style','display:none');
            if(dt.status==false){
              alert('gagal menyimpan data');
            	// alertinfo('danger','<strong>Gagal !</strong>  menyimpan data');
            }else{
              resetAll();
              alert('berhasil menyimpan data');
            	// alertinfo('success','<strong>Berhasil !</strong>  menyimpan data');
            }
          },700);
        }
      });
    }

	    function alertinfo(clr,msg) {
	    	$('#alert-div').removeAttr('style');
            $('#alert-msg').html(msg);
            $('#alert-div').addClass('alert-'+clr);
    	}

	    // function resetform() {
	    // 	$('#nama').val('');
	    // 	$('#no_tlp').val('');
	    // 	$('#jeniscombo').val('');
	    // 	$('#hargacombo').val('');
	    // }

function resetAll() {
  $('#searchTB').focus();
// form ---
// value --
  $('#searchTB').val('');
  $('#tgl_expTB').val('');
  $('#tgl_exp_newTB').val('');
  $('#no_waTB').val('');
  $('#nama_fbTB').val('');
  $('#tgl_exp_newTB').removeAttr('required');

// disabled --
  $('#tgl_exp_newTB').attr('disabled',true);
  $('#no_waTB').attr('disabled',true);
  $('#nama_fbTB').attr('disabled',true);
  $('#simpanBtn').attr('disabled',true);
  $('#simpanBtn').removeClass('btn-info');
// table (read only)
  $('#nama_dpnTD').html(':');
  $('#nama_blkTD').html(':');
  $('#genderTD').html(':');
  $('#usernameTD').html(':');
  $('#emailTD').html(':');
  $('#nominalTD').html(':');
  $('#tgl_joinTD').html(':');
  $('#tgl_lunasTD').html(':');
  $('#paytren_idTD').html(':');
  $('#jaguarTD').html(':');
  $('#referalTD').html(':');
  $('#web_trainingTD').html(':');
  $('#marketingTD').html(':');
  $('#dna_idTD').html(':');
  $('#dna_seqTD').html(':');
  $('#dna_levelTD').html(':');
  $('#mlm_typeTD').html(':');
}
