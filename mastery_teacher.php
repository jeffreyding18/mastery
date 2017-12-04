<!--
To Add:
- Take out DOB, switch Fname and Lname, Add teacher name
- Take out "comments"
- Backend (add, edit, delete)
- Course table (& add column to "students" as classID)
- Rescale Pie Chart
- JSON read in data

Last:
- Clean up student visual

- Private Comment by Teacher (V2.0)

-->
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
		<div class="infoRow">
			<div class="infoDesc">
				DOB
			</div>
			<div class="info" id="rThree">

			</div>
		</div>
		<div class="infoRow">
			<div class="infoDesc">
				Description
			</div>
			<div class="info" id="rFour">

			</div>
		</div>

	</div>

	<div class="studentCommentInput">
		<div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
			<textarea id="paragraphInput">
				Please enter student commentary here...
			</textarea>

		</div>
	</div>
	<div class="teacherInput">
		<div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1" id = "containerLH">
			<form method="post">
        <fieldset id="fieldOne">
                <legend>
									 Analytical and Creative Thinking
								</legend>
        </fieldset>
			</form>
			<form method="post">
        <fieldset id="fieldTwo">
                <legend>
									 Complex Communication
								</legend>
        </fieldset>
			</form>
			<form method="post">
        <fieldset id="fieldThree">
                <legend>
									 Leadership and Teamwork
								</legend>
        </fieldset>
			</form>
			<form method="post">
        <fieldset id="fieldFour">
                <legend>
									 Digitial and Quantitative Literacy
								</legend>
        </fieldset>
			</form>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1" id = "containerRH">
			<form method="post">
        <fieldset id="fieldFive">
                <legend>
									 Global Perspectives
								</legend>
        </fieldset>
			</form>
			<form method="post">
        <fieldset id="fieldSix">
                <legend>
									 Adaptability, Initiative, and Risk-Taking
								</legend>
        </fieldset>
			</form>
			<form method="post">
        <fieldset id="fieldSeven">
                <legend>
									 Integrity and Ethical Decision-Making
								</legend>
        </fieldset>
			</form>
			<form method="post">
        <fieldset id="fieldEight">
                <legend>
									 Habits of Mind
								</legend>
        </fieldset>
			</form>
		</div>

	</div>
</div>
	<div id="submitbutton">
		<input type="button" value="Submit" onclick="submitForms()" />
	</div>

	<script>
		$.ajax( {
			type: "POST",
			url: "php/getMasterList.php",
			error: function ( req, err ) {
				console.log( 'my message' + err );
			},
			success: function ( arr ) {
				{
					console.log(arr);
					console.log("Length = " + arr[0].length);

					for(a = 0; a < arr[0].length; a++) {
						var InputListOne = document.getElementById("fieldOne");
						InputListOne.appendChild(document.createElement("br"));
						InputListOne.appendChild(document.createTextNode(arr[0][a]+ "  "));
						var newNumberListItem = document.createElement("input");
						newNumberListItem.type = "checkbox";
						newNumberListItem.value = "" + arr[0][a];
						InputListOne.appendChild(newNumberListItem);

						InputListOne.appendChild(document.createElement("br"));
					}
					for(a = 0; a < arr[1].length; a++) {
						var InputListOne = document.getElementById("fieldTwo");
						InputListOne.appendChild(document.createElement("br"));
						InputListOne.appendChild(document.createTextNode(arr[1][a]+ "  "));
						var newNumberListItem = document.createElement("input");
						newNumberListItem.type = "checkbox";
						newNumberListItem.value = "" + arr[1][a];
						InputListOne.appendChild(newNumberListItem);

						InputListOne.appendChild(document.createElement("br"));
					}
					for(a = 0; a < arr[2].length; a++) {
						var InputListOne = document.getElementById("fieldThree");
						InputListOne.appendChild(document.createElement("br"));
						InputListOne.appendChild(document.createTextNode(arr[2][a]+ "  "));
						var newNumberListItem = document.createElement("input");
						newNumberListItem.type = "checkbox";
						newNumberListItem.value = "" + arr[2][a];
						InputListOne.appendChild(newNumberListItem);

						InputListOne.appendChild(document.createElement("br"));					}
					for(a = 0; a < arr[3].length; a++) {
						var InputListOne = document.getElementById("fieldFour");
						InputListOne.appendChild(document.createElement("br"));
						InputListOne.appendChild(document.createTextNode(arr[3][a]+ "  "));
						var newNumberListItem = document.createElement("input");
						newNumberListItem.type = "checkbox";
						newNumberListItem.value = "" + arr[3][a];
						InputListOne.appendChild(newNumberListItem);

						InputListOne.appendChild(document.createElement("br"));					}
						for(a = 0; a < arr[4].length; a++) {
							var InputListOne = document.getElementById("fieldFive");
							InputListOne.appendChild(document.createElement("br"));
							InputListOne.appendChild(document.createTextNode(arr[4][a]+ "  "));
							var newNumberListItem = document.createElement("input");
							newNumberListItem.type = "checkbox";
							newNumberListItem.value = "" + arr[4][a];
							InputListOne.appendChild(newNumberListItem);

							InputListOne.appendChild(document.createElement("br"));
						}
						for(a = 0; a < arr[5].length; a++) {
							var InputListOne = document.getElementById("fieldSix");
							InputListOne.appendChild(document.createElement("br"));
							InputListOne.appendChild(document.createTextNode(arr[5][a]+ "  "));
							var newNumberListItem = document.createElement("input");
							newNumberListItem.type = "checkbox";
							newNumberListItem.value = "" + arr[5][a];
							InputListOne.appendChild(newNumberListItem);

							InputListOne.appendChild(document.createElement("br"));
						}
						for(a = 0; a < arr[6].length; a++) {
							var InputListOne = document.getElementById("fieldSeven");
							InputListOne.appendChild(document.createElement("br"));
							InputListOne.appendChild(document.createTextNode(arr[6][a]+ "  "));
							var newNumberListItem = document.createElement("input");
							newNumberListItem.type = "checkbox";
							newNumberListItem.value = "" + arr[6][a];
							InputListOne.appendChild(newNumberListItem);

							InputListOne.appendChild(document.createElement("br"));					}
						for(a = 0; a < arr[7].length; a++) {
							var InputListOne = document.getElementById("fieldEight");
							InputListOne.appendChild(document.createElement("br"));
							InputListOne.appendChild(document.createTextNode(arr[7][a]+ "  "));
							var newNumberListItem = document.createElement("input");
							newNumberListItem.type = "checkbox";
							newNumberListItem.value = "" + arr[7][a];
							InputListOne.appendChild(newNumberListItem);

							InputListOne.appendChild(document.createElement("br"));					}
				}

			},
			dataType: 'json',
	} );
	</script>

	<script>
		function clearText() {
			let p = document.getElementById("paragraphInput");
			p.value = "";
		}
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
				document.getElementById( "rOne" ).innerHTML = arr[ 0 ] + ", " + arr[ 1 ];
				document.getElementById( "rTwo" ).innerHTML = arr[ 2 ];
				document.getElementById( "rThree" ).innerHTML = arr[ 3 ];
				document.getElementById( "rFour" ).innerHTML = arr[ 4 ];
				console.log( arr );
			},
			dataType: 'json',
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

		console.log( "stub: " + names_array );
	</script>

	<script>
		function submitForms() {
			var arrayChecked = [];

			//One
			let fOne = document.getElementById("fieldOne");
			let fOneLen = fOne.elements.length;
			let fOneElems = fOne.elements;
			for(a = 0; a < fOneLen; a++) {
				if(fOneElems[a].checked) {
					arrayChecked.push(a + 1);
				}
			}

			//Two
			let startIndex = fOneLen;
			let fTwo = document.getElementById("fieldTwo");
			let fTwoLen = fTwo.elements.length;
			let fTwoElems = fTwo.elements;
			for(a = 0; a < fTwoLen; a++) {
				if(fTwoElems[a].checked) {
					arrayChecked.push(startIndex + a + 1);
				}
			}

			//Three
			startIndex += fTwoLen;
			let fThree = document.getElementById("fieldThree");
			let fThreeLen = fThree.elements.length;
			let fThreeElems = fThree.elements;
			for(a = 0; a < fThreeLen; a++) {
				if(fThreeElems[a].checked) {
					arrayChecked.push(startIndex + a + 1);
				}
			}

			//Four
			startIndex += fThreeLen;
			let fFour = document.getElementById("fieldFour");
			let fFourLen = fFour.elements.length;
			let fFourElems = fFour.elements;
			for(a = 0; a < fFourLen; a++) {
				if(fFourElems[a].checked) {
					arrayChecked.push(startIndex + a + 1);
				}
			}

			//Five
			startIndex += fFourLen;
			let fFive = document.getElementById("fieldFive");
			let fFiveLen = fFive.elements.length;
			let fFiveElems = fFive.elements;
			for(a = 0; a < fFiveLen; a++) {
				if(fFiveElems[a].checked) {
					arrayChecked.push(startIndex + a + 1);
				}
			}

			//Six
			startIndex += fFiveLen;
			let fSix = document.getElementById("fieldSix");
			let fSixLen = fSix.elements.length;
			let fSixElems = fSix.elements;
			for(a = 0; a < fSixLen; a++) {
				if(fSixElems[a].checked) {
					arrayChecked.push(startIndex + a + 1);
				}
			}

			//Seven
			startIndex += fSixLen;
			let fSeven = document.getElementById("fieldSeven");
			let fSevenLen = fSeven.elements.length;
			let fSevenElems = fSeven.elements;
			for(a = 0; a < fSevenLen; a++) {
				if(fSevenElems[a].checked) {
					arrayChecked.push(startIndex + a + 1);
				}
			}

			//Eight
			startIndex += fSevenLen;
			let fEight = document.getElementById("fieldEight");
			let fEightLen = fEight.elements.length;
			let fEightElems = fEight.elements;
			for(a = 0; a < fEightLen; a++) {
				if(fEightElems[a].checked) {
					arrayChecked.push(startIndex + a + 1);
				}
			}

			console.log("array of checked checkboxes = " + arrayChecked)
			let nameId = document.getElementById("nameSelect").selectedIndex + 1;

			let textArea = document.getElementById("paragraphInput").value;
			console.log("name id = " + nameId);
			$.ajax( {
				type: "POST",
				url: "php/submitCheckboxes.php",
				data: {
					name: nameId,
					checkedArray: arrayChecked,
					text: textArea
				},
				error: function ( req, err ) {
					console.log("request = " + req);
					console.log( 'form problem is ' + err );
				},
				success: function ( value ) {
					console.log("Number = " + value);

				},
				dataType: 'json',
			} );
			location.reload();
			}
	</script>

	<script>
		function getInfo() {

			console.log( "going" );
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
					document.getElementById( "rOne" ).innerHTML = arr[ 0 ] + ", " + arr[ 1 ];
					document.getElementById( "rTwo" ).innerHTML = arr[ 2 ];
					document.getElementById( "rThree" ).innerHTML = arr[ 3 ];
					document.getElementById( "rFour" ).innerHTML = arr[ 4 ];
					console.log( arr[ 0 ] + ", " + arr[ 1 ] );
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
		}

	</script>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script>
	$('#paragraphInput').click(function() {
	var clickNum = $(this).data('clickNum');

	if (!clickNum) clickNum = 1;

	if(clickNum == 1) {
		let p = document.getElementById("paragraphInput");
		p.value = "";
	}

	$(this).data('clickNum', ++clickNum);
});
	</script>

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

</body>

</html>
