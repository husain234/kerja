<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('berkas/edit/'.$edit['norm']); ?>">Berkas</a></li>
            <li class="active">Edit Berkas</li>
        </ol>

        <?php
            echo validation_errors();
            //buat message nis
            if(!empty($message)) {
            echo $message;
            }
        ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">

            <div class="panel-heading">
                Edit Berkas
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('berkas/update', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>
            <div class="form-group">
                    <p class="col-sm-2 text-left">No RM </p>

                    <div class="col-sm-10">
                        <input type="text" name="norm" class="form-control" placeholder="No RM" value="<?php echo $edit['norm']; 
                        ?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Nama </p>

                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $edit['nama'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Kelamin </p>

                    <div class="col-sm-10">
                    <?php 
                    $jenis_kelamin = array('L' => 'Laki-Laki', 'P' => 'Perempuan'); 
                    echo form_dropdown('jenis',$jenis_kelamin,$edit['jk'],"class='form-control'");    
                    ?>
                   
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Lahir </p>

                    <div class="col-sm-10">
                        <input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" id="tanggal"  value="<?php echo $edit['ttl'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Alamat </p>

                    <div class="col-sm-10">
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat"  value="<?php echo $edit['alamat']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Rak</p>

                    <div class="col-sm-10">
                        <input type="text" name="rak" class="form-control" placeholder="Rak"  value="<?php echo $edit['rak']; ?>">
                    </div>
                </div>
                
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('berkas', 'Cancel', array('class' => 'btn btn-danger btn-sm')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group pull-right">
                            <input type="submit" name="update" value="Update" class="btn btn-success btn-sm">
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>



<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/tinymce/tinymce.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>



<script type="text/javascript">

tinymce.init({selector:'textarea'});

$(document).ready(function() {
    $("#tanggal1").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal2").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal").datepicker({
        format:'yyyy-mm-dd'
    });
})



</script>