<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @for ($i = 0; $i < 10; $i++)
        <p></p>
    @endfor
    
    {{-- <div class="page">
        <p>Laporan Siswa / i</p>
    </div>

    <p></p><p></p> --}}

    <div class="page">
        <table>
            <thead>
                <tr>
                    <th style="text-align: left;">No</th>
                    <th>Nis</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Agama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $index => $row)
                    <tr>
                        <td style="text-align: left;" align="left">{{++$index}}</td>
                        <td>{{$row->nis}}</td>
                        <td>{{$row->nisn}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone ?? '-'}}</td>
                        <td>{{\Modules\Master\Constants\ReligionConstant::label($row->religion)}}</td>
                        <td>{{\Modules\Master\Constants\SexConstant::label($row->sex)}}</td>
                        <td>{{$row->room}}</td>
                        <td>{{\Modules\Master\Constants\StudentConstant::label($row->status)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>