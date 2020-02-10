<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>

        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Match</th>
            <th>Team 1</th>
            <th>Team 2</th>
            <th>Odd 1</th>
            <th>Odd X</th>
            <th>Odd 2</th>
            <th>Bookie 1</th>
            <th>Bookie 2</th>
            <th>Bookie 3</th>
            <th>Percentage</th>
        </tr>


        @foreach($surebets as $surebet)
        <tr>
            <td>{{$surebet->id}}</td>
            <td>{{$surebet->date}}</td>
            <td>{{$surebet->match}}</td>
            <td>{{$surebet->team1}}</td>
            <td>{{$surebet->team2}}</td>
            <td>{{$surebet->odd1}}</td>
            <td>{{$surebet->odd2}}</td>
            <td>{{$surebet->odd3}}</td>
            <td>{{$surebet->bookie1_id}}</td>
            <td>{{$surebet->bookie2_id}}</td>
            <td>{{$surebet->bookie3_id}}</td>
            <td>{{$surebet->percentage}}</td>
        </tr>
        @endforeach

    </table>

    <?php var_dump($surebets) ?>
</body>

</html>