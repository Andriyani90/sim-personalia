<table cellspacing="3" cellpadding="4">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Pelamar</th>
            <th class="text-center">Alamat </th>
            <th class="text-center">Agama</th>
            <th class="text-center">Tanggal Lahir</th>
            <th class="text-center">Pendidikan Terakhir</th>
            <th class="text-center">Pengalaman</th>
            <th class="text-center">CV</th>
            <th class="text-center">Ijazah</th>
            <th class="text-center">Ktp</th>
            <th class="text-center">KK</th>
            <th class="text-center">Lowongan</th>
            <th class="text-center">Status</th>
            <th class="text-center">Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pelamar as $key => $row) { ?>
            <tr>
                <td class="text-center"><?php echo $key + 1; ?></td>
                <td class="text-center"><?php echo $row['nama']; ?></td>
                <td class="text-center"><?php echo $row['alamat']; ?></td>
                <td class="text-center"><?php echo $row['agama']; ?></td>
                <td class="text-center"><?php echo $row['tanggal_lahir']; ?></td>
                <td class="text-center"><?php echo $row['pendidikan_terakhir']; ?></td>
                <td class="text-center"><?php echo $row['pengalaman']; ?></td>
                <td class="text-center"><img class="modal-content" id="myImg" src="<?= base_url('uploads/ijazah/' . $row['ijazah']); ?>" alt="Snow" style="width:100%;max-width:300px"></td>
                <td class="text-center"><img class="modal-content" id="myImg" src="<?= base_url('uploads/ktp/' . $row['ktp']); ?>" alt="Snow" style="width:100%;max-width:300px"></td>
                <td class="text-center"><img class="modal-content" id="myImg" src="<?= base_url('uploads/kk/' . $row['kk']); ?>" alt="Snow" style="width:100%;max-width:300px"></td>
                <td class="text-center"><?php echo $row['status']; ?></td>
                <td class="text-center"><?php echo $row['deskripsi']; ?></td>
                <td class="text-center"><?php echo $row['nama_lowongan']; ?></td>
            <?php } ?>
            </tr>
    </tbody>
</table>