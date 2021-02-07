<?php if($berkas->num_rows() > 0) { ?>
<br /><br />
<table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>No Rekam Medis</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Rak</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($berkas->result() as $data):?>
        <tr>
            <td><?php echo $data->norm;?></td>
            <td><?php echo $data->nama;?></td>
            <td><?php echo $data->alamat;?></td>
            <td><?php echo $data->rak;?></td>
            <td><a href="#" class="tambah" 
                kode="<?php echo $data->norm;?>"
                nama="<?php echo $data->nama;?>"
                alamat="<?php echo $data->alamat;?>"
                rak="<?php echo $data->rak;?>"><i class="glyphicon glyphicon-plus"></i></a></td>
        </tr>
        <?php endforeach;?>
    </table>
<?php }else{ ?>
<br />
<strong>Book Not Found</strong>

<?php } ?>
