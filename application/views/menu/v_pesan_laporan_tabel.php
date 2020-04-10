<table id="example1" class="table table-striped">
	<thead>
		<tr>
			<th style="width: 10px">No</th>
			<th>Pesan</th>
			<th>Pelapor</th>
			<th>No HP</th>
			<th>Jenis Laporan</th>
			<th>Waktu</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 1;
			foreach ($dataPesanLaporan as $pesanLaporan) { 
			?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $pesanLaporan->pesan ?></td>
			<td><?php echo $pesanLaporan->namaUser ?></td>
			<td><?php echo $pesanLaporan->noHP ?></td>
			<td><?php echo $pesanLaporan->jenis ?></td>
			<td><?php echo date("d-m-Y H:i:s", strtotime($pesanLaporan->waktu)) ?></td>
			<td>
				<a href="<?php echo base_url(); ?>pesanlaporan/hapuspesan/<?php echo $pesanLaporan->idPesanKhusus; ?>" class="btn btn-danger" title="Hapus Pesan" onclick="return confirm('Hapus pesan?')"><i class="nav-icon fas fa-trash"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
