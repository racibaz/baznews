<html>
<head>
</head>
<body>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-body">
                Kullanıcı Güncellendi
                <div class="form-group">
                    <b>Kullanıcı Ad-Soyad</b>:
                    {{$user_full_name}}
                </div>
                <div class="form-group">
                    <b>Kullanıcı Email</b>:
                    {{$userMail}}
                </div>
                <div class="form-group">
                    <b>Site Linki</b>:
                    {{ url('dys', $parameters = array(), $secure = null)}}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
