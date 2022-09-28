<table cellspacing="3" cellpadding="4">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Karyawan</th>
            <th class="text-center">Penilaian Atas </th>
            <th class="text-center">Nilai</th>
            <th class="text-center">Periode</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($penilaian as $key => $row) { ?>
            <tr>
                <td class="text-center"><?php echo $key + 1; ?></td>
                <td class="text-center"><?php echo $row['nama']; ?></td>
                <td class="text-center"><?php echo $row['penilaian_atas']; ?></td>
                <td class="text-center"><?php echo $row['nilai']; ?></td>
                <td class="text-center"><?php echo $row['periode']; ?></td>
            </tr>
            <?php } ?>
    </tbody>
</table>