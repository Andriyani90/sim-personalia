<table cellspacing="3" cellpadding="4">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Pelamar</th>
            <th class="text-center">Tanggal Interview </th>
            <th class="text-center">Start Kontrak</th>
            <th class="text-center">End Kontrak</th>
            <th class="text-center">Status</th>
            <th class="text-center">Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($penerimaan as $key => $row) { ?>
        <tr>
            <td class="text-center"><?php echo $key + 1; ?></td>
            <td class="text-center"><?php echo $row['nama']; ?></td>
            <td class="text-center"><?php echo $row['tanggal_interview']; ?></td>
            <td class="text-center"><?php echo $row['start_kontrak']; ?></td>
            <td class="text-center"><?php echo $row['end_kontrak']; ?></td>
            <td class="text-center"><?php echo $row['status']; ?></td>
            <td class="text-center"><?php echo $row['deskripsi']; ?></td>
        </tr>
        <?php } ?>

    </tbody>
</table>