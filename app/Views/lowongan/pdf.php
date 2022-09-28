<html>
<body>
    <div>
        <table cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Lowongan</th>
                    <th class="text-center">Tanggal Input </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lowongan as $key => $row) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $row['nama_lowongan']; ?></td>
                        <td><?php echo $row['tanggal_input']; ?></td>
                    <?php } ?>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>