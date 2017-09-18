
<?php
if(isset($_POST['name'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    $filename = time() . substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'], '.'));

    $response = array();

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $filename)) {
        $response['isSuccess'] = true;
        $response['name'] = $name;
        $response['gender'] = $gender;
        $response['photo'] = $filename;
    } else {
        $response['isSuccess'] = false;
    }

    echo json_encode($response);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title> FormData Demo </title>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <script type="text/javascript">
        <!--
        function fsubmit(){
            var data = new FormData($('#form1')[0]);
            $.ajax({
                url: 'server.php',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                cache: false,
                processData: false,
                contentType: false
            }).done(function(ret){
                if(ret['isSuccess']){
                    var result = '';
                    result += 'name=' + ret['name'] + '<br>';
                    result += 'gender=' + ret['gender'] + '<br>';
                    result += '<img src="'%20+%20ret['photo']%20%20+%20'" width="100">';
                    $('#result').html(result);
                }else{
                    alert('提交失敗');
                }
            });
            return false;
        }
        -->
    </script>

</head>

<body>
<form name="form1" id="form1">
    <p>name:<input type="text" name="name" ></p>
    <p>gender:<input type="radio" name="gender" value="1">male <input type="radio" name="gender" value="2">female</p>
    <p>photo:<input type="file" name="photo" id="photo"></p>
    <p><input type="button" name="b1" value="submit" onclick="fsubmit()"></p>
</form>
<div id="result"></div>
</body>
</html>  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title> FormData Demo </title>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <script type="text/javascript">
        <!--
        function fsubmit(){
            var data = new FormData($('#form1')[0]);
            $.ajax({
                url: 'server.php',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                cache: false,
                processData: false,
                contentType: false
            }).done(function(ret){
                if(ret['isSuccess']){
                    var result = '';
                    result += 'name=' + ret['name'] + '<br>';
                    result += 'gender=' + ret['gender'] + '<br>';
                    result += '<img src="'%20+%20ret['photo']%20%20+%20'" width="100">';
                    $('#result').html(result);
                }else{
                    alert('提交失敗');
                }
            });
            return false;
        }
        -->
    </script>

</head>

<body>
<form name="form1" id="form1">
    <p>name:<input type="text" name="name" ></p>
    <p>gender:<input type="radio" name="gender" value="1">male <input type="radio" name="gender" value="2">female</p>
    <p>photo:<input type="file" name="photo" id="photo"></p>
    <p><input type="button" name="b1" value="submit" onclick="fsubmit()"></p>
</form>
<div id="result"></div>
</body>
</html>