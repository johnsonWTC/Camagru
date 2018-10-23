var video = document.querySelector("#videoElement");//get the video element
var canvas = document.querySelector("#canv"); //get the canvas element
var button = document.querySelector("#btn");//get the button element
var ctx = canvas.getContext('2d');
var localMediaStream = null;

//to make sure it works cross browser
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

//ensure it works cross browser
window.URL = window.URL || window.mozURL || window.webkitURL;

if (navigator.getUserMedia)
{
	navigator.getUserMedia({video: true, audio: true}, handleVideo, videoError);
}
else
{
	if (!fallback())
	{
		alert("getUserMedia is not supported in your browser");
	}
	else
		fallback();
}

//function used if the browser does not support getUserMedia
function fallback(e)
{
	video.src = 'fallbackvideo.webm';
}

//function called calling video is successful
function handleVideo(stream)
{
	//set the video element to receive input from the webcam
	video.src = window.URL.createObjectURL(stream);
	localMediaStream = stream;
}

//function called if there is error accessing the webcam
function videoError(e)
{
	document.write("Error accessing your webcam");
}

function snapShot()
{
	console.log(localMediaStream);
	if (localMediaStream)
	{
		ctx.drawImage(video, 0, 0);//draw the video frame to the canvas

		//extract image data from canvas in base64
		//encode png format or you could use image/jpeg
		var imgData = canvas.toDataURL('image/png');
		imgData = imgData.replace('data:image/png; base64,', '');

		//JSON encode it
		var postData = JSON.stringify({ imageData: imgData });

		//post to server
		/*$.ajax({
			url: '[host]',
			type: 'POST',
			data: postData,
			contentType: 'application/json'});*/
		//remember that this data is encoded and you have decode first
		//and serialize the array to be stored in the server
		//.done(function(respond){console.log("done: " + respond);})
		//.fail(function(respond){console.log("fail");})
		//.always(function(respond){console.log("always");})

		document.querySelector('img').src = canvas.toDataURL('image/png');//filter images
	}
}


//var butn = document.getElementById('btn');
button.setAttribute('disabled', 'disabled');
//console.log(butn);

/*another way of taking a pic by a button*/
//button.addEventListener('click',snapShot, false);

/*function to take the image uploaded to the canvas*/
function loadFile(event)
{
	var output = document.getElementById('image');
	output.src = URL.createObjectURL(event.target.files[0]);
};

function returnPop(e)
{
	console.log(button);
	var image1 = document.getElementById(e).classList;
	button.setAttribute('disabled', true);
	console.log(button);
	if (image1.contains('selected'))
	{
		image1.remove('selected');
		image1.add('images');
	}
}

function popUp(e)
{
	var image1 = document.getElementById(e).classList;
	console.log(image1);
	if (image1.contains('images'))
	{
		console.log(button);
		image1.remove('images');
		image1.add('selected');
		button.removeAttribute('disabled');
		console.log(button);
		setTimeout(function(){ returnPop(e) }, 5000);
	}
}
