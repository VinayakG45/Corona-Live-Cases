<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'link/links.php'; ?>
	<?php include 'Css/style.php'; ?>
</head>
<body onload="fetch()">
	
<nav class="navbar navbar-expand-lg nav_style p-3">
  <a class="navbar-brand pl-5" href="#">COVID-19</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto pr-5 text-capitalize">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">about</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Symptoms</a>
      </li>
	<li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
	<li class="nav-item">
        <a class="nav-link" href="#">Prevention</a>
      </li>

    </ul>

  </div>
</nav>

<div class="main.header">
	<div class="row w-100 h-100"> 
		<div class="col-lg-5 col-md-5 col-12 order-lg-1 order 2">
			<div class="leftside w-100 h-100 d-flex justify-content-center align-items-center"> 
				<img src="images/eksath.jpg" width="300" height="300">
			</div>
		</div>
		<div class="col-lg-7 col-md-7 col-12 order-lg-2 order 1">
			<div class="rightside w-100 h-100 d-flex justify-content-center align-items-center">
				<h1> Let's Stay Safe & Fight Together Against Cor<span> <img src="images/corona.png" width="70" height="70"> 
				</span>na Virus</h1>
		</div>
	</div>
</div>	

<!-- ************************* Project Done Starts ******************************* -->

<section class="corona_update container-fluid"> 
	<div clas="mb-3">
		<h3 class="text-uppercase text-center " style= "font-weight: bolder;" style="font-size: 5rem;">COVID-19 LIVE UPDATES OF THE WORLD</h3>
	</div>

	<div class="table-respoonsive">
		<table class="table table-borderd table-striped text-center "  id="tbval">
			<tr>
			<th bgcolor="#EEE8AA">Country</th>
			<th bgcolor="#EEE8AA">NewConfirmed</th>
			<th bgcolor="#EEE8AA">TotalConfirmed</th>
			<th bgcolor="#EEE8AA">NewDeaths</th>
			<th bgcolor="#EEE8AA">TotalDeaths</th>
						
			</tr>
		</table>	
</div>
</section>


<!-- ************************* Project Done Ends ******************************* -->

<!-- ******************************** Footer Part ******************** -->

<footer class="mt-5">
	<div class="footer_style bg-dark text-white container-fluid text-center"> 
		<p>copyright by GPM Students</p>
	</div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>

$('.count').counterUp({
	delay:10,
	time:3000
})

//********************************* top arrow script ***************************

mybutton = document.getElementById("myBtn");
//When the ueser scrolls down 20px from the top of the document, show the button

window.oncscroll = function() { scrollFunction();}
function scrollFunction() {
	if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100)
	{
		mybutton.style.display = "block";
	} else {
		mybutton.style.display = "none";
	}
}
//When the user clicks on the button, scroll to the top of the document 
function topFunction(){
	document.body.scrollTop = 0; //For Safari
	document.documentElement.scrollTop = 0; //For Chrome, Firefox, IE and Opera
}


function fetch(){
	$.get("https://api.covid19api.com/summary",

		function (data)
		{
			//console.log(data['Countries'].length);
			var tbval = document.getElementById('tbval');

			for(var i=1; i<(data['Countries'].length); i++)
			{
				var x = tbval.insertRow();
				x.insertCell(0);

				tbval.rows[i].cells[0].innerHTML = data['Countries'][i-1]['Country'];
				tbval.rows[i].cells[0].style.background = '#7a4a91';
				tbval.rows[i].cells[0].style.color = '#fff';

				x.insertCell(1);
				tbval.rows[i].cells[1].innerHTML = data['Countries'][i-1]['NewConfirmed'];
				tbval.rows[i].cells[1].style.background = '#4bb7d8';

				x.insertCell(2);
				tbval.rows[i].cells[2].innerHTML = data['Countries'][i-1]['TotalConfirmed'];
				tbval.rows[i].cells[2].style.background = '#9cc850';

				x.insertCell(3);
				tbval.rows[i].cells[3].innerHTML = data['Countries'][i-1]['NewDeaths'];
				tbval.rows[i].cells[3].style.background = '#A52A2A';
				tbval.rows[i].cells[3].style.color = '#fff';

				x.insertCell(4);
				tbval.rows[i].cells[4].innerHTML = data['Countries'][i-1]['TotalDeaths'];
				tbval.rows[i].cells[4].style.background = '#4bb7d8';

				
			}


		}


	);
}
</script>
</body>
</html>