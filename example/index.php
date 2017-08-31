<?php

use mirac\BasicForm\Form;

require_once '../vendor/autoload.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">BasicForm</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Main Page</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
        </ul>
    </div>
</nav>
<div class="col-md-12">

    <?php echo Form::open('POST', 'google.com'); ?>
    <div class="form-group">
        <?php
        echo Form::label('İsminizi Giriniz','isim');
        echo Form::input([
            'type'=>'text',
            'name'=>'name',
            'id'=> 'isim',
            'placeholder'=>'Lütfen isminizi yazınız.',
            'class'=>'form-control'
        ]);
        ?>
    </div>

    <div class="form-group">
        <?php
        echo Form::label('Cinsiyet','cinsiyet');
        echo Form::select('cinsiyet',
            [
                '1'=>'Erkek',
                '2'=>'Kadın'
            ]
            ,
            [
                'class'=>'form-control',
                'id'=>'cinsiyet'
            ]);
        ?>
    </div>

    <div class="form-group">
        <?php
        echo Form::label('Parola','parola');
        echo Form::pass('parola',['class'=>'form-control','placeholder'=>'Parolanızı girin.','id'=>'parola']);
        ?>
    </div>


    <div class="form-group">
        <?php
        echo Form::label('Kendinizden Bahsedin','bahsedin');
        echo Form::textarea('about',['class'=>'form-control','placeholder'=>'Kendinizden biraz bahsedebilir misiniz ?.','id'=>'bahsedin']);
        ?>
    </div>


    <div class="form-group">
        <?php
        echo Form::label('Doğum Tarihi','dogum_tarihi');
        echo Form::date('dogum_tarihi',['class'=>'form-control','placeholder'=>'Doğum Tarihiniz','id'=>'dogum_tarihi']);
        ?>
    </div>


    <div class="form-group">
        <?php
        echo Form::label('Mail Adresi','mail');
        echo Form::date('mail',['class'=>'form-control','placeholder'=>'Mail adresiniz','id'=>'mail']);
        ?>
    </div>


    <div class="form-group">
        <?php echo Form::submit('gonder','Gönder',['class'=>'form-control btn btn-success'] ); ?>
    </div>


    <?php echo Form::close(); ?>


</div>
</body>
</html>
