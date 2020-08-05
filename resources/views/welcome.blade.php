<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
         <style>
          body {
            padding-top: 54px;
          }
          @media (min-width: 992px) {
            body {
              padding-top: 56px;
            }
          }

        </style>

    </head>
    <body>
        <div id="app">

            <navbar-component></navbar-component>

            <!-- Page Content -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <?php for($i=0;$i< 5; $i++){?>
                                    <th><?= $i?></th>
                                    <?php }?>
                                </tr>
                            </thead>
                            
                            <tbody> 
                                <?php for($j=0; $j < 10; $j++){ ?>
                                <tr>
                                    <td><?= $j ?></td>
                                 <?php for($i=0;$i< 5; $i++){?>
                                    <td><?= $i?></td>
                                    <?php }?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </body>
    <script src="js/app.js"></script>
    <script>
         $(document).ready(function(){

         });
    </script>
</html>
