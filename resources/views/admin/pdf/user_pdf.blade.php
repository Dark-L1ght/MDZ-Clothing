<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>
  table {
    border-spacing: -1px;
  }
</style>
</head>
    <body>
        <table border="1">
            <thead>
              <tr>
                <th> # </th>
                <th> Nama </th>
                <th> Email </th>
                <th> Role </th>
                <th> Alamat </th>
                <th> Nomor Telepon </th>
              </tr>
            </thead>
            @foreach ($users as $user)
            <tbody>
              <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{ $user->name }}  </td>
                <td> {{ $user->email }}  </td>
                <td> {{ $user->usertype }} </td>
                <td> {{ $user->address }}  </td>
                <td> {{ $user->phone }} </td>
              </tr>
            </tbody>
            @endforeach
          </table>
    </body>
</html>