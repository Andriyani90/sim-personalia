<table cellspacing="3" cellpadding="4">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Karyawan</th>
            <th class="text-center">Event Training </th>
            <th class="text-center">Tanggal Event</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($training as $key => $row) { ?>
            <tr>
                <td class="text-center"><?php echo $key + 1; ?></td>
                <td class="text-center"><?php echo $row['nama']; ?></td>
                <td class="text-center"><?php echo $row['event']; ?></td>
                <td class="text-center"><?php echo $row['tanggal_training']; ?></td>

            <?php } ?>
            </tr>
    </tbody>
</table>