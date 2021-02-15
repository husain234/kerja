<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('laporan/berkas'); ?>">Laporan</a></li>
            <li class="active">Data Berkas</li>
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
        
        <div class="panel panel-default">

            <div class="panel-heading">
                Data Berkas
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>No Rekam Medis</td>
                                        <td>Nama</td>
                                        <td>Alamat</td>
                                        <td>Rak</td>
                                        <td class="aksi">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($berkas->result() as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <!-- jika ada berkas di dalam database maka tampilkan -->
                                        <td><?php echo $row->norm;?></td>
                                        <td><?php echo $row->nama;?></td>
                                        <td><?php echo $row->alamat;?></td>
                                        <td><?php echo $row->rak;?></td>
                                        <td class="aksi text-center">
                                            <a href="<?php echo base_url('berkas/edit/'.$row->norm) ?>"><input type="submit" class="edit btn btn-success btn-xs" name="edit" value="Edit"></a>
                                            <a href="#" name="<?php echo $row->nama;?>" class="hapus btn btn-danger btn-xs" kode="<?php echo $row->norm;?>">Hapus</a>
                                        </td>
                                    </tr>
                                <?php $no++; } ?>    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
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
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>

<script>
    <?php if($this->session->userdata('role') == "kepala") { ?>
 
        $(document).ready(function(){

            $(".hapus").remove();
            $(".edit").remove();
            $(".aksi").remove();

        });

    <?php } elseif($this->session->userdata('role') == "petugas") {?>

        $(document).ready(function(){

            $(".hapus").remove();
            $(".edit").remove();
            $(".aksi").remove();

        });

    <?php } elseif($this->session->userdata('role') == "admin") { } else {}; ?>
</script>



