<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>No RM</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td></td>
        </tr>
    </thead>
    <?php foreach($tmp as $tmp):?>
    <tr>
        <td><?php echo $tmp->norm;?></td>
        <td><?php echo $tmp->nama;?></td>
        <td><?php echo $tmp->alamat;?></td>
        <td><a href="#" class="hapus" kode="<?php echo $tmp->norm;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
    <tr>
        <td colspan="2">Total Berkas</td>
        <td colspan="2"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp;?>" class="form-control"></td>
    </tr>
</table>