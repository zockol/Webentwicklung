<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Antrag2</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <header> Antrag2  </header>
    <body>
    <main>
        <?php $path = __DIR__ . '/data.json';
            if(file_exists($path)){
                $data = file_get_contents($path);
                $jsonData = json_decode($data,true);
                foreach($jsonData as $item){ ?>
                <div>
                <label><?php  echo " Startzeit: ". $item['Startzeit']; ?></label> 
                </div>
                <div>
                <label><?php echo "Endzeit: " . $item['Endzeit']; ?> </label>
                </div>
                <div> <label><?php echo "Endzeit: " . $item['Bezeichnung']; ?> </label></div>
               <?php }
            }
        ?>
        
       
    </main>
        <script src="" async defer></script>
    </body>
    <footer>
</html>