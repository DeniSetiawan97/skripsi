<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>rating</title>
 <link rel="stylesheet" type="text/css" href="css/star-rating.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
 <div class="text-center">
    <p>
        <h4>Rate Data</h4>
        <input id="rating-input" type="text" title=""/>
    </p>
    </div>
    
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/star-rating.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
  var $inp = $('#rating-input');
  
  
   
  $inp.rating({
                min: 0,
                max: 5,
                step: 1,
                size: 'sm',
                showClear: false
            });
  $inp.on('rating.change', function () {
   alert('Nilai rating : '+$('#rating-input').val());
  });
 });
</script>
</body>
</html>