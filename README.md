#BasicForm
========

BasicForm, HTML formu oluşturmak için kullanabileceğiniz bir PHP kütüphanesidir.

- [Kurulum](#kurulum)
- [Basit Kullanımı](#kullanimi)
- [Örnek](#ornek)


<a href="#kurulum"></a>
## Kurulum

Öncelikle Composer ile projenizin bulunduğu dizinde terminal üzerinden aşağıda bulunan kodu çalıştırınız.

> composer require miracsengonul/basic_form @dev

Daha sonra, eğer bir framework kullanmıyorsanız veya sayfanızda herhangi bir Composer autoload komutu yok ise sayfanınızın başına şu komutu ekleyiniz.

```php
require_once __DIR__ . '/vendor/autoload.php';
```
Hemen altına

```php
use mirac\BasicForm\Form;
```

Use kodunu ekleyerek kütüpheneyi sisteme import etmiş olacaksınız.

Import tam hali : 
```php
require_once __DIR__ . '/vendor/autoload.php';
use mirac\BasicForm\Form;
```
şeklinde olmalıdır.

<a href="#kullanimi"></a>
## Basit Kullanımı

- [Başlangıç](#baslangic)
- [Özel Input Oluşturmak](#ozel-input)
- [Text Input Oluşturmak](#input-text)
- [Password Input Oluşturmak](#input-password)
- [Date Input Oluşturmak](#input-date)
- [Mail Input Oluşturmak](#input-mail)
- [Select Input Oluşturmak](#input-select)
- [Textarea Oluşturmak](#textarea)
- [Label Oluşturmak](#label)
- [Submit Input Oluşturmak](#input-submit)
- [Bitiş](#bitis)

- [Örnek](#ornek)

<a href="#baslangic"></a>
### Form Tagını açarak başlayalım.

#Array parametresi ile elementlere custom olarak tanımlayacabileceğiniz özellikler eklemeniz mümkündür.

Form::open('Hedef','Method')

```php

Form::open('Kaydet','POST');
Form::open('Kaydet','GET');
```

<a href="#ozel-input"></a>
### Özel Input Oluşturmak

Form::input() komutu ile kişiselleştirilebilir bir input oluşturabilirsiniz.

Form::input(Array)
```php

Form::input(['type'=>'number','value'=>5,'placeholder'=>'Lütfen Bir Sayı Girin','class'=>'form-control']);
```

Kullanabileceğiniz diğer type türleri için :

https://www.w3schools.com/tags/att_input_type.asp

Kaynağından ulaşabilirsiniz.

<a href="#input-text"></a>
### Text Input Oluşturmak

Form::text('Name',Array) komutunu 
type türü "text" olan bir input oluşturmak için kullanabilirsiniz.

```php
Form::text('isim',
[
           'placeholder'=>'Lütfen İsminizi Girin',
           'class'=>'form-control'
]);
```

<a href="#input-password"></a>
### Password Input Oluşturmak

Form::pass('Name',Array) komutunu
type türü "password" olan bir input oluşturmak için kullanabilirsiniz.

```php
Form::pass('parola',
[
           'placeholder'=> 'Lütfen Parolanızı Girin',
           'class'=> 'form-control',
           'style'=> 'font-size:25px;color:red;border:none;'
]);
```

<a href="#input-date"></a>
### Date Input Oluşturmak

Form::date('Name',Array) komutunu 
type türü "date" olan bir input oluşturmak için kullanabilirsiniz.

```php
Form::date('dogum_tarih,['placeholder'=>'Lütfen Doğum Tarihinizi Girin','class'=>'form-control']);
```



<a href="#input-mail"></a>
### Mail Input Oluşturmak

Form::mail('Name',Array) komutunu
type türü "date" olan bir input oluşturmak için kullanabilirsiniz.

```php
Form::mail('mail,['placeholder'=>'Lütfen Mail adresini Girin','class'=>'form-control']);
```

<a href="#input-select"></a>
### Select Input Oluşturmak

Form::select(Name,Array Options,Array Field) komutunu
type türü "select" olan bir input oluşturmak için kullanabilirsiniz.

```php
 Form::select('cinsiyet',
            [
                '1'=>'Erkek',
                '2'=>'Kadın'
            ]
            ,
            [
                'class'=>'form-control',
                'id'=>'cinsiyet'
            ]);
```

<a href="#textarea"></a>
### Textarea Oluşturmak

Form::textarea(Name,Array) komutunu
textarea alanı oluşturmak için kullanabilirsiniz.

```php
Form::textarea('hakkinda',
[
             'class'=>'form-control',
             'placeholder'=>'Lütfen kendinizden bahsedin',
             'id'=> 'hakkinda'
]);
```


<a href="#label"></a>
### Label Oluşturmak

Form::label(Name, For ID, Array) komutunu
label oluşturmak için kullanabilirsiniz.

```php
Form::label('hakkinda','hakkinda');
```


<a href="#input-submit"></a>
### Submit Input Oluşturmak

Form::submit(Name,Value,Array) komutunu
type türü "submit" olan bir input butonu oluşturmak için kullanabilirsiniz.

```php
Form::submit('duzenle','Düzenle',
[
             'class'=>'btn btn-success'
]);
```



<a href="#bitis"></a>
### Kapanış Tagı

Form::close() komutu ile formu sonlandırabiliriz.

```php
Form::close();
```


<a href="#ornek"></a>
### Örne Uygulama

```php


<?php

require_once __DIR__ . '/vendor/autoload.php';

use mirac\BasicForm\Form;

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
            <a class="navbar-brand" href="#">KolayForm</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Anasayfa</a></li>
            <li><a href="#">Sayfa 1</a></li>
            <li><a href="#">Sayfa 2</a></li>
            <li><a href="#">Sayfa 3</a></li>
        </ul>
    </div>
</nav>
<div class="col-md-12">



    <?php echo Form::open('kaydet','POST',NULL); ?>
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

```


> Kütüphane örnekte gösterildiği şekilde çalışmaktadır.

![ekran_goruntusu](http://image.ibb.co/kQ9Obk/ana_goruntu.png) 
