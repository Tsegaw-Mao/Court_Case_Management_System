<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <a href="{{ route('judge.report') }}"><button class="btn btn-primary end">back</button></a>
    <h1 style="text-align: center;">Report</h1>
    <div class="container">
        <table style="text-align: center;" class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th colspan="1" scope="col"></th>
                    <th colspan="8"><h4>ቅድመ ክስ ስራዎች</h4></th>
                    <th colspan="5"><h4>በክስ መስማት</h4></th>
                    <th colspan="2"><h4>ድህረ ክስ ስራዎች</h4></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">ክፍል</th>
                    <th>ጊዜ ቀጠሮ</th>
                    <th>በጊዜ ቀጠሮ ላይ በመርማሪ የተዘጋ</th>
                    <th>እምነት ቃል</th>
                    <th>ዋስትና</th>
                    <th>ብርበራ</th>
                    <th>የመያዣ ትዕዛዝ</th>
                    <th>እግድ ትዕዛዝ</th>
                    <th>የእግድ ትዕዛዝ የተነሳላቸው</th>
                    <th>ከባለፈው ዓመት የዞረ</th>
                    <th>አዲስ</th>
                    <th>ድምር</th>
                    <th>ውሳኔ ያገኘ</th>
                    <th>ወደ ቀጣይ የዞረ</th>
                    <th>አመክሮ</th>
                    <th>የመዝገብ ግልባጭ የተሰጣቸው</th>
                </tr>
                <tr>
                    <th scope="row">የማዕከል</th>
                    <td>{{$data['appointed']}}</td>
                    <td>{{$data['closedByAttorney']}}</td>
                    <td></td>
                    <td>{{$data['bail']}}</td>
                    <td>{{$data['warrant']}}</td>
                    <td>{{$data['catch']}}</td>
                    <td>{{$data['detained']}}</td>
                    <td>{{$data['undetained']}}</td>
                    <td>{{$data['lastYear']}}</td>
                    <td>{{$data['newCase']}}</td>
                    <td>{{$data['totalCase']}}</td>
                    <td>{{$data['verdicted']}}</td>
                    <td>{{$data['transfered']}}</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>