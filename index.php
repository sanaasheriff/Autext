<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autext</title>
	<style>
		.header{
			font-size: 50px;
			color: lemonchiffon;;
			padding: 30px;
			margin: 30px 30px 80px 30px;
			text-align: center;
			font-family: Arial,Helvetica and sans-serif;
			font-weight: bold;
			outline-style: double;
			outline-color: lemonchiffon;
			text-shadow: 3px 3px black;



		}
		.center{
			text-align:center;
			border: 3px solid white;
			background-color: darkseagreen;
			padding:100px;
			margin: 30px 30px 50px 30px;
			font-size: 50px;
			font-family: Arial,Helvetica and sans-serif;
			font-weight: bold;
			color: white;
			border-radius: 30px;
			text-shadow: 3px 3px black;
		}
		input{
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			background-color: ghostwhite;
			border-radius: 5px;
			height: 80px;
		}
		.input1{
			height: 30%;
			width: 20%;
			padding: 15px 32px;
			box-sizing: border-box;
			background-color: lemonchiffon;
			border-radius: 5px;
			font-weight: bold;
			font-family: Arial,Helvetica and sans-serif;
			font-size: 14px;
		}
	</style>
</head>
<body bgcolor="seagreen">
	<div class="header">AUTEXT</div>
	<div class="center">
    <!-- Input area -->
    <label>Speech To Text</label>
    <input type="text" name="" id="speechToText" placeholder="Speak Something" onclick="record()">
	</div>

    <!-- Below is the script for voice recognition and conversion to text-->
    <script>
        function record() {
            var recognition = new webkitSpeechRecognition();
            recognition.lang = "en-GB";

            recognition.onresult = function(event) {
                // console.log(event);
                document.getElementById('speechToText').value = event.results[0][0].transcript;
            }
            recognition.start();

        }
    </script>
    <!-- end of script -->


</body>
</html>


<div id="player"></div>
<form method="post">
	<div class="center">
	<label>Text to Audio   </label>

	<input type="textarea" id="txt" name="txt" placeholder="Type Something"/>
	<input class="input1" type="button" name="submit" value="Convert to Audio" onclick="getAudio()"/>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>



<script>
function getAudio(){
	var txt=jQuery('#txt').val()
	jQuery.ajax({
		url:'get.php',
		type:'post',
		data:'txt='+txt,
		success:function(result){
			jQuery('#player').html(result);
		}
	});
}
</script>
</div>
