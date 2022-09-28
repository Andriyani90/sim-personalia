<html>
<body>
    <div>
        <table cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama karyawan</th>
                    <th class="text-center">NIK </th>
                    <th class="text-center">Telephone </th>
                    <th class="text-center">Alamat </th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Tanggal Masuk </th>
                    <th class="text-center">Jabatan </th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($karyawan as $key => $row) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['nik']; ?></td>
                        <td><?php echo $row['telephone']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['tanggal_lahir'];?></td>
                        <td><?php echo $row['tanggal_masuk']; ?></td>
                        <td><?php echo $row['jabatan']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                    <?php } ?>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>