<!DOCTYPE html>
<html>
<head>
    <title>Report Table</title>
    <style type="text/css">

        html {
            font-family: sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        table {
            border-spacing: 0;
            border-collapse: collapse
        }

        td, th {
            padding: 0
        }

        .table {
            border-collapse: collapse !important
        }

        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff
        }

        .row {
            margin-right: -15px;
            margin-left: -15px
        }

        table {
            background-color: transparent
        }

        th {
            text-align: left
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px
        }

        .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd
        }

        .table > thead > tr > th {
            vertical-align: bottom;
            border-bottom: 2px solid #ddd
        }

        .table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > td {
            border-top: 0
        }

        .table > tbody + tbody {
            border-top: 2px solid #ddd
        }

        .table-striped > tbody > tr:nth-child(odd) > td, .table-striped > tbody > tr:nth-child(odd) > th {
            background-color: #f9f9f9
        }

        .footer {
            bottom: 0px;
            width: 100%;
            text-align: center;
            position: fixed;
        }

        .center {
            text-align: center;
        }
        .row {
            margin-right: -15px;
            margin-left: -15px;
        }
        . .col-md-4, .col-md-5, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }
        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        h1 {
            margin: .67em 0;
            font-size: 2em;
        }
    </style>

</head>
<body>
<!-- In production server. If you choose this, then comment the local server and uncomment this one-->
<!-- <img src="<?php // echo $_SERVER['DOCUMENT_ROOT']."/media/dist/img/no-signal.png"; ?>" alt=""> -->
<!-- In your local server -->
<!--<img src="<?php /*echo $_SERVER['DOCUMENT_ROOT']."/ci-dompdf6/media/dist/img/no-signal.png"; */?>" alt="">-->
<div class="container">
<div class="row">
    <div>
        <h1 class="center"> <u>K F T.TRANSPORT</u></h1>
       <p class="center"> ABIDJAN Tel: 05 27 90 07 / 08 81 27 30 / 21 32 55 05<br>
        ODIENNE Tel: 45 26 55 45 / 05 23 50 84 / 06 29 76 85</p>
        Date: <?php echo date('d/m/Y');?> <br>
        <p>Entrées bagages : <span style="margin-left: 60%; font-size: 18px;color: red;"><?php
                if ($bagage[0]['prix']){
                    echo   $bagage[0]['prix'];
                }else{
                    echo "0 F";
                } ?></span> </p>
        <p>Entrées courriers :  <span style="margin-left: 60%; font-size: 18px;color: red;"><?php
                if ($colis[0]['montant']){
                    echo   $colis[0]['montant']." F";
                }else{
                    echo "0 F";
                }?></span></p>
        <p>Total :  <span style="margin-left: 70%; font-size: 18px;color: red;"><?php
                $total = $colis[0]['montant'] +$bagage[0]['prix'];
                echo $total . " F" ; ?></span></p>
    </div>
</div>
<div id="outtable">
    <?php if ($depenses) :; ?>
    <table class="table table-striped ">
        <thead class="center">
        <tr>
            <th class="short">N°</th>
            <th class="short">BENEFICIAIRE</th>
            <th class="normal">MOTIF</th>
            <th class="normal">MONTANT</th>
        </tr>
        </thead>
        <tbody class="center">
        <?php $no=1; ?>

        <?php foreach($depenses as $depense): ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $depense['nom_beneficiaire']; ?></td>
                <td><?php echo $depense['motif']; ?></td>
                <td><?php echo $depense['montant']; ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>


        </tbody>
    </table>
    <?php endif; ?>
    <p>Total depense :  <span style="margin-left: 60%; font-size: 18px;color: red;"><?php if ($depenseTotal){ echo $depenseTotal." F";}else{ echo "0". " F";} ?></span></p>
    <p>Solde  :  <span style="margin-left: 70%; font-size: 18px;color: red;"><?php
            $sold = $total - $depenseTotal;
            if ($sold){ echo $sold." F";}else{ echo "0". " F";}
            ?></span></p>
</div>
</div>
</body>
</html>