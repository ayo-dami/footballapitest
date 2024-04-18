<!DOCTYPE html>
<html>
<header>
    <title>Football stats</title>
</header>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
    <h1>Football Competitions</h1>
    <table style="width:100%">
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Type</th>
        </tr>
        <tr>
            @foreach ($competitions as $competition) 
                <td> {{ $competition['name'] }} </td>
                <td> {{ $competition['code'] }} </td>
                <td> {{ $competition['type'] }} </td>
            @endforeach
        </tr>
    </table>
</body>
</html>