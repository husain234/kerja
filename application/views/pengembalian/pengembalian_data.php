<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('pengembalian'); ?>">Transaksi</a></li>
            <li class="active">Pengembalian</li>
        </ol>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $title;?>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 ">No. Transaksi</label>
                            <div class="col-lg-5">
                                <input type="text" name="no_transaksi" id="no_transaksi" class="form-control">
                                <span class="text-danger">*) tekan enter</span>
                            </div>
                            
                            <div class="col-lg-2">
                                <a href="#" class="btn btn-success" id="cari_nis"> Search &nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</a>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 ">Tgl. Pinjam</label>
                            <div class="col-lg-8">
                                <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 ">Tgl. Kembali</label>
                            <div class="col-lg-8">
                                <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">ID Unit</label>
                            <div class="col-lg-8">
                                <input type="text" name="id_unit" id="id_unit" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Nama Poli</label>
                            <div class="col-lg-8">
                                <input type="text" name="unit" id="unit" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Telat</label>
                            <div class="col-lg-8">
                                <select name="telat" id="telat" class="form-control">
                                    <option></option>
                                    <option value="Y">Y</option>
                                    <option value="N">N</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Rak</label>
                            <div class="col-lg-8">
                            <input type="text" name="rak" id="rak" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                    </div>
                </form>

            <!-- tampil berkas -->
            <!-- <div id="tampilberkas"></div> -->
            <!-- end tampil berkas -->
            
            </div>
            
            <div class="panel-footer">
                <button id="simpan_transaksi" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
                <p ><i class="tgl_sama text-danger"></i></p>
            </div>
        </div><!-- end panel -->

    </div> <!-- end lg -->
</div> <!-- end row -->



 

<!-- Modal Cari Berkas -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Transaksi Pengembalian</strong></h4>
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label">Cari Nama Nasabah</label>-->
            <input type="text" name="carinis" id="carinis" class="form-control" placeholder="please search id_unit member">

            <div id="tampilnis"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari Berkas -->





<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {

    // Date format
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }

    //load datatable
    $('#dataTables-example').DataTable({
        responsive: true
    });

    //show modal id_unit
    $("#cari_nis").click(function(){
        $("#myModal3").modal("show");
    });

    //cari by id_unit
    $("#carinis").keyup(function(){
        var id_unit = $("#carinis").val();
        
        $.ajax({
            url:"<?php echo site_url('pengembalian/cari_nis');?>",
            type:"POST",
            data:"id_unit="+id_unit,
            cache:false,
            success:function(hasil){
                // console.log(hasil);
                $("#tampilnis").html(hasil);
            }
        })
    })


    //tambahkan data dari modal ke form berdasarkan id_transaksi
    $('body').on('click', '.tambahkan', function(){

        var id_transaksi = $(this).attr("no_transaksi");
        // console.log(id_transaksi);
        $("#no_transaksi").val(id_transaksi);
        $("#myModal3").modal("hide");
        $("#no_transaksi").focus();

    });

    //keypress no_transaksi
    $("#no_transaksi").keypress(function(){

        if(event.which == 13) {

            var no_transaksi = $("#no_transaksi").val();
            // var datekembali = formatDate(Date());
            
            $.ajax({
                url:"<?php echo site_url('pengembalian/cari_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                  
                   if(hasil=="") {
                       alert("Data tidak ditemukan");
                   }
                   else{
                    //    console.log(hasil);
                       data = hasil.split("|");
                       $("#id_unit").val(data[0]);  
                       $("#tgl_pinjam").val(data[1]);
                       $("#tgl_kembali").val(data[2]);
                       $("#unit").val(data[3]);
                       $("#rak").val(data[4]);

                       if(data[1] == formatDate(Date())) {
                            console.log(formatDate(Date()));
                            $('#simpan_transaksi').attr('disabled','disabled');
                            $('.tgl_sama').append("Pengembalian dilakukan miniman h+! peminjaman");
                       }

                       $("#telat").attr("disabled", false);
                       $("#telat").focus();

                    //    $("#tampilberkas").load("<?php echo site_url('pengembalian/tampil_berkas') ?>",
                    //    "no_transaksi="+no_transaksi);
                   }

                   //console.log(data);
                }
            }) //end ajax

        } //end event

    }) //end keypress

    //buat disable telat dan nominal sebagai nilai default
    $("#nominal").attr("disabled",true);
    $("#telat").attr("disabled",true);

    //disable enabled combobox
    $("#telat").click(function(){
        var telat = $("#telat").val();
        if(telat == "Y") {
            $("#nominal").attr("disabled", false);
           
        }
        else{
            $("#nominal").attr("disabled", true);
            
        }

    });

    $("#simpan_transaksi").click(function(){

        var no_transaksi = $("#no_transaksi").val();
        var id_unit      = $("#id_unit").val();  
        var telat        = $("#telat").val();
        var nominal      = parseInt($("#nominal").val());
        var nominal2     = $("#nominal").val();
        var rak          = $("#rak").val(); 

        if(no_transaksi == "" || id_unit == ""){
            alert("Pilih ID Transaksi");
            $("#no_transaksi").focus();
            return false;
        }
        else if(telat == ""){
            alert("Pilih Terlambat");
            $("#telat").focus();
            return false;
        }
        else if(telat == "Y"){
            
            if(nominal2 == "") {
                alert("Masukan nominal telat");
                $("#nominal").focus();
                return false;
            }
        else if(rak == ""){
            alert("Masukkan Rak");
            $("#rak").focus();
            return false;
        }
            //kalau sudah lengkap lakukan insert ke database 
            else{
                $.ajax({
                    url:"<?php echo site_url('pengembalian/simpan_transaksi');?>",
                    type:"POST",
                    data:"no_transaksi="+no_transaksi+"&telat="+telat+"&rak="+rak,
                    cache:false,
                    success:function(){
                        alert("Transaksi berhasil disimpan");
                        location.reload();
                    }
                })//end ajax
            }
        }
        else {
            $.ajax({
                url:"<?php echo site_url('pengembalian/simpan_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi+"&telat="+telat+"&rak="+rak,
                cache:false,
                success:function(){
                    alert("Transaksi berhasil disimpan");
                    location.reload();
                }
            })//end ajax
        }
       
     

    }) //end simpan_transaksai

    

    
   


  

});
</script>



