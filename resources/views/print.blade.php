<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan {{$kondisi}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body>
    <h3 class="text-center">Laporan {{$kondisi}} </h3>
    <h2 class="text-center">Desa Salamnunggal</h2>
    <p class="text-center">Jl. KH Abdullah Bin Nuh No.103, Kab. Cianjur 43281</p>
    <br />

    <div class="container-fluid">
    <div>

                    <div>
                    <table id="table-data" class="table table-striped table-white">
                    <thead style = "background-color:Aquamarine">
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Tanggal Datang</th>
                            <th>Pelapor</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                        @foreach ($pendatang as $row)
                            <tr>
                                <td >{{ $no++ }}</td>
                                <td >{{ $row->nik }}</td>
                                <td >{{ $row->nama }}</td>
                                <td >{{ $row->gender }}</td>
                                <td >{{ $row->tgl_datang }}</td>
                                <td >{{ $row->pelapor }}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table>

        @foreach($profile as $row)
        <td> 
 <p>Mengetahui,</p> <p>Kepala Desa Salamnunggal</p>
 <img src="storage/tandatangan/{{$row->tandatangan}}" width="150px" height="80px" />
       <p>{{$row->name}}</p>

        
        @endforeach</td>
        <div style="margin-left:350px"></div>

        @foreach($profile1 as $row)
        <td>
 <p>Cianjur. {{$tanggal->format('d-M-Y')}}</p><p>Skretaris</p>
 <img src="images/cap.png"width="100px" height="80px" style="position:absolute"/>
 <img src="storage/tandatangan/{{$row->tandatangan}}" width="150px" height="80px" />
       <p>{{$row->name}}</p>
    
        
        @endforeach
</td>
</table>
</body>

</html>