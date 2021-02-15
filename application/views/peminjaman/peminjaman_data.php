<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('peminjaman'); ?>">Transaksi</a></li>
            <li class="active">Peminjaman</li>
        </ol>

        <?php
            
            if(!empty($message)) {
                echo $message;
            }
        ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        
    <!-- <legend>Transaksi</legend> -->
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo site_url('peminjaman/simpan');?>" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">No. Transaksi</label>
                            <div class="col-lg-7">
                                <input type="text" id="no_transaksi" name="no_transaksi" class="form-control" value="<?php echo $autonumber ?>" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Tgl Pinjam</label>
                            <div class="col-lg-7">
                                <input type="text" id="tgl_pinjam" name="tgl_pinjam" class="form-control" value="<?php 
                                echo $tglpinjam; ?>" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Tgl Kembali</label>
                            <div class="col-lg-7">
                                <input type="text" id="tgl_kembali" name="tgl_kembali" class="form-control" value="<?php echo $tglkembali; ?>" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">No Poli</label>
                            <div class="col-lg-7">
                                <select name="id_unit" class="form-control" id="id_unit">
                                    <option> </option>
                                    <?php foreach($poli as $da): ?> 
                                    <option  value="<?php echo $da->id_unit ?>"><?php echo $da->unit ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- <div class="form-group">
                            <label class="col-lg-4 ">Nama Poli</label>
                            <div class="col-lg-7">
                                <input type="text" name="unit" id="unit" class="form-control">
                            </div>
                        </div> -->
                    </div>
                </form>
            </div>
        </div>

        <!-- data berkas -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Data Berkas</strong>
            </div>
            
            <div class="panel-body">
                <div class="form-inline">
                    <div class="form-group">
                        <label>No RM</label>
                        <input type="text" class="form-control"  id="norm" >
                    </div>
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" class="form-control"  id="nama" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label >Alamat</label>
                        <input type="text" class="form-control"  id="alamat" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label >Rak</label>
                        <input type="text" class="form-control"  id="rak" readonly="readonly">
                    </div>
                    <div class="form-group ">
                        <label class="sr-only">Alamat</label>
                        <button id="tambah_berkas" class="btn btn-primary"> Confirm <i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Alamat</label>
                        <button id="cari" class="btn btn-success"> Search <i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                <br /><br />

                <!-- buat tampil tabel tmp     -->
                <div id="tampil"></div>
            </div>
            
            
            
            <div class="panel-footer">
                <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
            </div>
        </div>
        <!-- end data berkas -->

        
    </div>
    <!-- /.col-lg-12 -->

</div>
<!-- /.end row -->

 

<!-- Modal Cari Berkas -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Search</strong></h4>
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label">Cari Nama Nasabah</label>-->
            <input type="text" name="cariberkas" id="cariberkas" class="form-control" placeholder="please search book code">

            <div id="tampilberkas"></div>

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

    //alert('');

    $('#dataTables-example').DataTable({
        responsive: true
    });


    //load data tmp 
    function loadData()
    {
        $("#tampil").load("<?php echo site_url('peminjaman/tampil_tmp') ?>");
    }
    loadData();

    //function buat mengkosong form data berkas setelah di tambah ke tmp
    function EmptyData()
    {
        $("#norm").val("");
        $("#nama").val("");
        $("#alamat").val("");
    }

    //ambil data poli berdasarkan id_unit
    // $("#id_unit").click(function(){
    // Langsung menggunakan nama poli
            // $("#id_unit").change(function(){    
            //     var id_unit = $("#id_unit").val();
                
            //     $.ajax({
                    // url:" echo site_url('peminjaman/cari_poli');?>",
            //         type:"POST",
            //         data:"id_unit="+id_unit,
            //         cache:false,
            //         success:function(html){
            //             $("#unit").val(html);
            //             // document.write(html)
            //         }
            //     })
                
            // });

    //show modal search berkas
    $("#cari").click(function(){
        $("#myModal2").modal("show");
        //return false;  biar gk langsung ilang
    })

    //search berkas
    $("#cariberkas").keyup( $cari = function(){
        var cariberkas = $('#cariberkas').val();

         $.ajax({
            url:"<?php echo site_url('peminjaman/cari_berkas');?>",
            type:"POST",
            data:"cariberkas="+cariberkas,
            cache:false,
            success:function(hasil){
                $("#tampilberkas").html(hasil);
                
            }
        })
        
    })

    $cari();




    //tambah berkas dari modal ke form
    
    // $(".tambah").live("click", function(){
    $('body').on('click', '.tambah', function(){
        
        var norm = $(this).attr("kode");
        var nama     = $(this).attr("nama");
        var alamat = $(this).attr("alamat");
        var rak = $(this).attr("rak");
        
        $("#norm").val(norm);
        $("#nama").val(nama);
        $("#alamat").val(alamat);
        $("#rak").val(rak);

        $("#myModal2").modal("hide");
        //console.log(norm);
       
    });


    //event keypress cari kode
    $("#norm").keypress(function(){
        
        //13 adalah kode asci buat enter
        if(event.which == 13) {
            var norm = $("#norm").val();

            $.ajax({
                url:"<?php echo site_url('peminjaman/cari_kode_berkas');?>",
                type:"POST",
                data:"norm="+norm,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                   data = hasil.split("|");
                   if(data==0) {
                       alert("Berkas " + norm + " Book Not Found");
                       $("#nama").val("");
                       $("#alamat").val("");
                   }
                   else{
                       $("#nama").val(data[0]);
                       $("#alamat").val(data[1]);
                       $("#tambah_berkas").focus();
                   }

                   //console.log(data);
                }
            })
            
        } 

    }) //end event keypress

    //tambah_berkas ke tmp
    $("#tambah_berkas").click(function(){
        
        var norm = $("#norm").val();
        var nama    = $("#nama").val();
        var alamat = $("#alamat").val();
        var rak = $("#rak").val();

        if(norm == "") {
            alert("Kode " + norm + " Masih Kosong ");
            $("#norm").focus();
            return false;
        }
        else if(nama == ""){
            alert("Nama " + nama + " Masih Kosong ");
            return false;
        }
        else if(rak == "Dipinjam"){
            alert("Berkas Sedang Dipinjam ");
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('peminjaman/save_tmp');?>",
                type:"POST",
                data:"norm="+norm+"&nama="+nama+"&alamat="+alamat,
                cache:false,
                success:function(hasil){
                    loadData();
                    EmptyData();
                    //alert(hasil);
                   //console.log(data);
                }
            })
        }

    }) //end tambahberkas 

    // //delete tabel tmp
    $('body').on('click', '.hapus', function(){
        
        //ambil dulu atribute kodenya
        var norm = $(this).attr('kode');
        $.ajax({
            url:"<?php echo site_url('peminjaman/hapus_tmp');?>",
            type:"POST",
            data:"norm="+norm,
            cache:false,
            success:function(hasil){
                // alert(hasil);
                loadData();
            }
        })
        

    }); //end delete table tmp

    //simpan transaksi 
    //$("#simpan").click(function(){
    $('body').on('click', '#simpan', function(){    
        
        //tampung data dari form buat dikirim 
        var no_transaksi = $("#no_transaksi").val();
        var tgl_pinjam   = $("#tgl_pinjam").val();
        var tgl_kembali  = $("#tgl_kembali").val();
        var id_unit          = $("#id_unit").val();

        var jumlah_tmp   = parseInt($("#jumlahTmp").val(), 10);

        //cek id_unit jika kosong 
        if(id_unit == "") {
            alert("Pilih No Poli");
            $("#id_unit").focus();
            return false;
        }
        else if(jumlah_tmp == 0){
            alert("Pilih Berkas yang di pinjam");
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('peminjaman/simpan_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi+"&tgl_pinjam="+tgl_pinjam+"&tgl_kembali="+tgl_kembali+
                "&id_unit="+id_unit+"&jumlah_tmp="+jumlah_tmp,
                cache:false,
                success:function(hasil){
                  //console.log(hasil);
                 
                  alert("Transaksi Peminjaman Berhasil");
                  
                  location.reload();
                }
            })
        }
        
    })


  

});
</script>



