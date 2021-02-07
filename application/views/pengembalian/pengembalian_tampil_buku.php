<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>No RM</td>
            <td>Nama Pasien</td>
            <td>Alamat</td>
        </tr>
    </thead>
    <?php foreach($berkas as $row):?>
    <tr>
        <td><?php echo $row->kode_berkas;?></td>
        <td><?php echo $row->judul;?></td>
        <td><?php echo $row->pengarang;?></td>
    </tr>
    <?php endforeach;?>
</table>