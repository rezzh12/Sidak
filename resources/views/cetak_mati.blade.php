
<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
</head>

<body>
<center>
<img src="images/AdminLTELogo.png"width="100px" height="100px" style="position:absolute; margin-left:30px"/>
<h2>PEMERINTAH KABUPATEN CIANJUR</h2>
<h3>KECAMATAN CILAKU
	<br>DESA SALAMNUNGGAL</h3>
<p>________________________________________________________________________</p>
</center>

<center>
<h4>
	<u>SURAT KETARANGAN MENINGGAL</u>
</h4>
<h4>No Surat :{{$no}}
	/Ket.Meninggal/
	@foreach($meninggal as $pd)
	{{$pd->created_at->format('m/Y')}}
	@endforeach
</h4>
</center>
<p>Yang bertandatangan dibawah ini Kepala Desa Salamnunggal Kecamatan Cilaku Kabupaten Cianjur, dengan ini menerangkan
bahwa :</P>
	<table>
		<tbody>
		@foreach($meninggal as $row)
		<tr>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					{{$row->penduduk->nik}}
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
				{{$row->penduduk->nama}}
				</td>
			</tr>
			<tr>
				<td>Tanggal Kematian</td>
				<td>:</td>
				<td>
				{{$row->tgl_meninggal}}
				</td>
			</tr>
			<tr>
				<td>Sebab</td>
				<td>:</td>
				<td>
				{{$row->sebab}}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<p>Benar-benar Telah datang dan berencana untuk tinggal di Desa Salamnunggal, Kecamatan Cilaku, Kabupuaten Cianjur.</P>
	<p>Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
	<br>
	<br>
	<br>
	<br>
	<br>
	<table>
        <td> 
        <div style="margin-left:500px"></div>
		</td>
        @foreach($ttd as $row)
        <td>
 <p>Cianjur. {{$dibuat}} <br> Kepala Desa Salamnunggal</p>
 <img src="images/cap.png"width="100px" height="80px" style="position:absolute"/>
 <img src="storage/tandatangan/{{$row->tandatangan}}" width="150px" height="80px" />
       <p>{{$row->name}}</p>
    
        
        @endforeach
</td>
</table>


	<script>
		window.print();
	</script>

</body>

</html>