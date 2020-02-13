<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="table-responsive">
        <table class="table  table-striped  table-bordered table-sm table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Country</th>
                    <th scope="col">Sport</th>
                    <th scope="col">League</th>
                    <th scope="col">Match</th>
                    <th scope="col">Team 1</th>
                    <th scope="col">Team 2</th>
                    <th scope="col">Odd 1</th>
                    <th scope="col">Odd X</th>
                    <th scope="col">Odd 2</th>
                    <th scope="col">Bookie 1</th>
                    <th scope="col">Bookie 2</th>
                    <th scope="col">Bookie 3</th>
                    <th scope="col">Percentage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($surebets as $surebet)

                <tr scope="row">
                    @if(isset($surebet->bookie3->name))
                    <td>{{$surebet->id}}</td>
                    <td>{{$surebet->date}}</td>
                    <td>{{$surebet->country}}</td>
                    <td>{{$surebet->sport->name}}</td>
                    <td>{{$surebet->league->name}}</td>
                    <td>{{$surebet->match}}</td>
                    <td>{{$surebet->team1}}</td>
                    <td>{{$surebet->team2}}</td>
                    <td>{{$surebet->odd1}}</td>
                    <td>{{$surebet->odd2}}</td>
                    <td>{{$surebet->odd3}}</td>
                    <td>{{$surebet->bookie1->name}}</td>
                    <td>{{$surebet->bookie2->name}}</td>
                    <td>{{$surebet->bookie3->name}}</td>
                    <td>{{$surebet->percentage}}</td>
                    @else


                    <td>{{$surebet->id}}</td>
                    <td>{{$surebet->date}}</td>
                    <td>{{$surebet->country}}</td>
                    <td>{{$surebet->sport->name}}</td>
                    <td>{{$surebet->league->name}}</td>
                    <td>{{$surebet->match}}</td>
                    <td>{{$surebet->team1}}</td>
                    <td>{{$surebet->team2}}</td>
                    <td>{{$surebet->odd1}}</td>
                    <td>{{$surebet->odd2}}</td>
                    <td></td>

                    <td>{{$surebet->bookie1->name}}</td>
                    <td>{{$surebet->bookie2->name}}</td>
                    <td></td>
                    <td>{{$surebet->percentage}}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>