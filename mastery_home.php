<!doctype html>
<html>

<head>
	<!-- BOOTSTRAP CORE STYLE CSS -->
	<link href="assets/css/bootstrap.css" rel="stylesheet"/>
	<link href="assets/css/masteryV6.css" rel="stylesheet"/>
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>
	<script src="assets/js/jquery-1.11.3.min.js">
	</script>
	<script src="assets/js/jquery-1.10.2.js">
	</script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<meta charset="UTF-8">
	<title> Student Personality</title>

</head>

<body>
	<div class="navbar navbar-light navbar-absolute-top " id="menu">
		<div class="container">
			<div class="nav navbar-nav navbar-left"><br>
				<div class="topbar-left-element">
					Student Characteristics Assessment
				</div>

			</div>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<input id="userIn" type="text" name="Username" value="username" onClick="removeText()"><br>
				</li>
				<li>
					<input id="passIn" type="text" name="Password" value="password" onClick="removeText()"><br><br>
				</li>
				<li>
					<input type="submit" value="Log In">
				</li>
			</ul>
		</div>
	</div>

	<div class="select">
		<select id="nameSelect" onchange="getInfo()">
	</select>
	</div>
	<div class="mainStats">
		<div class="col-lg-6 col-md-6 col-sm-6">
				<div id="pie-student"></div>
		</div>

	<div class="col-lg-6 col-md-6 col-sm-6" id="basicInfo">
		<div class="infoRow">
			<div class="infoDesc">
				Name
			</div>
			<div class="info" id="rOne">

			</div>

		</div>
		<div class="infoRow">
			<div class="infoDesc">
				Grade
			</div>
			<div class="info" id="rTwo">

			</div>
		</div>
		<div class="infoRow" style="height:150px !important;">
			<div class="infoDesc"  style="height:130px !important;">
				Description
			</div>
			<div class="info" id="rThree" style="height:150px !important;">

			</div>
		</div>

	</div>
</div>
	<div class="individualElements">
		<div class="skillSet col-lg-6 col-md-6 col-sm-6">
			<h1> Analytical and Creative Thinking </h1>
			<div id="skillsOne">

			</div>
		</div>
		<div class="skillSet col-lg-6 col-md-6 col-sm-6">
			<h1> Complex Communication - Oral and Written </h1>
			<div id="skillsTwo">

			</div>
		</div>
		<div class="skillSet col-lg-6 col-md-6 col-sm-6">
			<h1> Leadership and Teamwork </h1>
			<div id="skillsThree">

			</div>
		</div>
		<div class="skillSet col-lg-6 col-md-6 col-sm-6">
			<h1> Digital and Quantitative Literacy </h1>
			<div id="skillsFour">

			</div>
		</div>
		<div class="skillSet col-lg-6 col-md-6 col-sm-6">
			<h1> Global Perspective </h1>
			<div id="skillsFive">

			</div>
		</div>
		<div class="skillSet col-lg-6 col-md-6 col-sm-6">
			<h1> Adaptability, Initiative, and Risk-Taking </h1>
			<div id="skillsSix">

			</div>
		</div>
		<div class="skillSet col-lg-6 col-md-6 col-sm-6" style="margin-bottom:20px;">
			<h1> Integrity and Ethical Decision-Making </h1>
			<div id="skillsSeven">

			</div>
		</div>
		<div class="skillSet col-lg-6 col-md-6 col-sm-6" style="margin-bottom:20px;">
			<h1> Habits of Mind </h1>
			<div id="skillsEight">

			</div>

		</div>
		</div>
	</div>

	<script>
		$( function () {
			$.ajax( {
				type: "POST",
				url: "php/getChartInfo.php", //getChartInfo returns arr (see success function: arr), which contains values for pie chart
				data: {
					name: $( "#nameSelect" ).val()
				},
				error: function ( req, err ) {
					console.log( 'Chart two parser: ' + err );
				},
				success: function ( arr ) {
					console.log(arr);
					var data = [ {
						name: "Analytical and Creative Thinking",
						y: 10,
						color: 'red'
					}, {
						name: "Complex Communication - Oral and Written",
						y: 10,
						color: 'blue'
					}, {
						name: "Leadership and Teamwork",
						y: 10,
						color: 'purple'
					}, {
						name: "Digital and Quantitative Literacy",
						y: 10,
						color: 'green'
					}, {
						name: "Global Perspective",
						y: 10,
						color: 'red'
					}, {
						name: "Adaptability, Initiative, and Risk-Taking",
						y: 10,
						color: 'blue'
					}, {
						name: "Integrity and Ethical Decision-Making",
						y: 10,
						color: 'purple'
					}, {
						name: "Habits of Mind",
						y: 10,
						color: 'green'
					} ];

					var total = data.map( function ( el ) {
							return el.y;
						} )
						.reduce( function ( p, c ) {
							return p + c;
						} );

					var newData = data.map( function ( el ) {
						el.count = el.y;
						el.y = el.y * 100 / total;
						return el;
					} );
					data = newData;

					var start = -90;
					var series = [];
					//set and push pie chart values
					for ( var i = 0; i < data.length; i++ ) {
						console.log(arr[i] * 100);
						var end = start + 360 * data[ i ].y / 100;
						series.push( {
							name: "Count",
							type: 'pie',
							size: 1 + (arr[i] * 350),
							innerSize: 50,
							startAngle: start,
							endAngle: end,
							data: [ data[ i ] ]
						} );
						start = end;
					};
					console.log( series );
					$( '#pie-student' ).highcharts( {
						series: series
					} );
				},
				dataType: 'json',
			} );
		} );
	</script>

	<script>
		console.log( "going" );
		var names_array = new Array();
		$.ajax( {
			url: "php/getNames.php",
			type: "GET",
			error: function ( req, err ) {
				console.log( 'my message' + err );
			},
			success: function ( arr ) {
				console.log( "array: " + arr );
				names_array = arr;
				console.log( "names array - " + names_array );
				$( "#nameSelect" ).select2( {

					data: names_array

				} )
			},
			dataType: 'json',
		} );

		console.log( "stub: " + names_array );
	</script>

	<script>
		console.log( "going" );
		$.ajax( {
			type: "POST",
			url: "php/getInitialInfo.php",
			error: function ( req, err ) {
				console.log( 'my message' + err );
			},
			success: function ( arr ) {
				document.getElementById( "rOne" ).innerHTML = arr[ 1 ] + ", " + arr[ 0 ];
				document.getElementById( "rTwo" ).innerHTML = arr[ 2 ];
				document.getElementById( "rThree" ).innerHTML = arr[ 4 ];
				console.log( arr );
			},
			dataType: 'json',
		} );

		$.ajax( {
			type: "POST",
			url: "php/getAttributes.php",
			data: {
				name: $( "#nameSelect" ).val()
			},
			error: function ( req, err ) {
				console.log( 'Get Attributes Error = ' + err );
			},
			success: function ( arr ) {
				var strArr = [];
			for(i = 0; i < 8; i++) {
				str = "";
				for(j = 0; j < arr[i].length; j += 3) {
						str += arr[i][j] + ": " + arr[i][j+2];
						str += "<br />";
				}
				strArr.push(str);
			}
				document.getElementById( "skillsOne" ).innerHTML = strArr[0];
				document.getElementById( "skillsTwo" ).innerHTML = strArr[1];
				document.getElementById( "skillsThree" ).innerHTML = strArr[2];
				document.getElementById( "skillsFour" ).innerHTML = strArr[3];
				document.getElementById( "skillsFive" ).innerHTML = strArr[4];
				document.getElementById( "skillsSix" ).innerHTML = strArr[5];
				document.getElementById( "skillsSeven" ).innerHTML = strArr[6];
				document.getElementById( "skillsEight" ).innerHTML = strArr[7];
				console.log("attributes array = " + arr[0][0] + ": " + arr[0][2] + ". Commentary - " + arr[0][1]);
			},
			dataType: 'json',
		} );
	</script>

	<script>
		function getInfo() {
			console.log( "getting info" );
			$.ajax( {
				type: "POST",
				url: "php/getInfo.php",
				data: {
					name: $( "#nameSelect" ).val()
				},
				error: function ( req, err ) {
					console.log( 'my message' + err );
				},
				success: function ( arr ) {
					document.getElementById( "rOne" ).innerHTML = arr[ 1 ] + ", " + arr[ 0 ];
					document.getElementById( "rTwo" ).innerHTML = arr[ 2 ];
					document.getElementById( "rThree" ).innerHTML = arr[ 4 ];
				},
				dataType: 'json',
			} );

			$.ajax( {
				type: "POST",
				url: "php/getChartInfo.php", //getChartInfo returns arr (see success function: arr), which contains values for pie chart
				data: {
					name: $( "#nameSelect" ).val()
				},
				error: function ( req, err ) {
					console.log( 'Chart two parser: ' + err );
				},
				success: function ( arr ) {
					console.log(arr);
					var data = [ {
						name: "Analytical and Creative Thinking",
						y: 10,
						color: 'red'
					}, {
						name: "Complex Communication - Oral and Written",
						y: 10,
						color: 'blue'
					}, {
						name: "Leadership and Teamwork",
						y: 10,
						color: 'purple'
					}, {
						name: "Digital and Quantitative Literacy",
						y: 10,
						color: 'green'
					}, {
						name: "Global Perspective",
						y: 10,
						color: 'red'
					}, {
						name: "Adaptability, Initiative, and Risk-Taking",
						y: 10,
						color: 'blue'
					}, {
						name: "Integrity and Ethical Decision-Making",
						y: 10,
						color: 'purple'
					}, {
						name: "Habits of Mind",
						y: 10,
						color: 'green'
					} ];

					var total = data.map( function ( el ) {
							return el.y;
						} )
						.reduce( function ( p, c ) {
							return p + c;
						} );

					var newData = data.map( function ( el ) {
						el.count = el.y;
						el.y = el.y * 100 / total;
						return el;
					} );
					data = newData;

					var start = -90;
					var series = [];
					//set and push pie chart values
					for ( var i = 0; i < data.length; i++ ) {
						console.log(arr[i] * 100);
						var end = start + 360 * data[ i ].y / 100;
						series.push( {
							name: "Count",
							type: 'pie',
							size: 1 + (arr[i] * 350),
							innerSize: 50,
							startAngle: start,
							endAngle: end,
							data: [ data[ i ] ]
						} );
						start = end;
					};
					console.log( series );
					$( '#pie-student' ).highcharts( {
						series: series
					} );
				},
				dataType: 'json',
			} );

			$.ajax( {
				type: "POST",
				url: "php/getAttributes.php",
				data: {
					name: $( "#nameSelect" ).val()
				},
				error: function ( req, err ) {
					console.log( 'Get Attributes Error = ' + err );
				},
				success: function ( arr ) {
					var strArr = [];
				for(i = 0; i < 8; i++) {
					str = "";
					for(j = 0; j < arr[i].length; j += 3) {
							str += arr[i][j] + ": " + arr[i][j+2];
							str += "<br />";
					}
					strArr.push(str);
				}
					document.getElementById( "skillsOne" ).innerHTML = strArr[0];
					document.getElementById( "skillsTwo" ).innerHTML = strArr[1];
					document.getElementById( "skillsThree" ).innerHTML = strArr[2];
					document.getElementById( "skillsFour" ).innerHTML = strArr[3];
					document.getElementById( "skillsFive" ).innerHTML = strArr[4];
					document.getElementById( "skillsSix" ).innerHTML = strArr[5];
					document.getElementById( "skillsSeven" ).innerHTML = strArr[6];
					document.getElementById( "skillsEight" ).innerHTML = strArr[7];
					console.log("attributes array = " + arr[0][0] + ": " + arr[0][2] + ". Commentary - " + arr[0][1]);
				},
				dataType: 'json',
			} );
		}
	</script>


	<script>
		function removeText() {

			document.getElementById( "userIn" ).value = "";
			document.getElementById( "passIn" ).value = "";

		}
	</script>

</body>

</html>
