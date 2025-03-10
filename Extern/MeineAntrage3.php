<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>asdasd</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <section>
    <h1>Meine Anträge</h1>
    <div class="wochennavigationswrapper">
        <button onclick="weekBack()">
            < </button>
                <p id="Wochenanzeige"></p>
                <button onclick="nextWeek()"> > </button>
    </div>
    <a asp-area="" asp-controller="Antraege" asp-action="MeineAntraege">Kachelansicht</a>
    <div class="tablewrapper">
        <table>
            <tr>
                <th>Typ/Tag</th>
                <th>Mo</th>
                <th>Di</th>
                <th>Mi</th>
                <th>Do</th>
                <th>Fr</th>
                <th>Sa</th>
                <th>So</th>
            </tr>
            <tr id="Urlaub">
                <th>Urlaub</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr id="Krankheit">
                <th>Krankheit</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr id="Zeitausgleich">
                <th>Zeitausgleich</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</section>
        <script src="script2.js" async defer></script>
    </body>
</html>