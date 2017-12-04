<!doctype html>

<!--
	Active -> 1 or 0

-->

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
	<script src="assets/js/bootstrap-select.js">
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

	<div class="mainAdmin">
		<div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
			<select class="form-control" id="categorySelect" onchange="repopulate()">
			</select>
		</div>



	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
			<div id="editArea">
			</div>
	</div>


	<div id="submitbutton">
		<input type="button" value="Submit" onclick="submitForms()" />
	</div>

	<script>
		function submitForms() {

			var x = document.getElementById("editArea");

			let c = x.getElementsByTagName("input");
			var checks = [];
			for (a = 0; a < c.length; a++) {
				if(c[a].checked == true) {
					checks.push(1);
				} else {
					checks.push(0);
				}

			}

			console.log("checks: " + checks);

			var texts = [];
			let t = x.getElementsByTagName("textarea");
			for (a = 0; a < t.length; a++) {
				texts.push(t[a].value);
			}

			console.log("texts: " + texts);

			var ids = [];
			let i = x.getElementsByTagName("div")
			for (a = 0; a < i.length; a++) {
				ids.push(i[a].id);
			}

			console.log("ids: " + ids);

			$.ajax( {
				type: "POST",
				url: "php/submitNewAttributes.php",
				data: {
					checks: checks,
					texts: texts,
					ids: ids
				},
				error: function ( req, err ) {
					console.log( 'my message' + err );
				},
				success: function ( arr ) {
					console.log(arr);
				},
				dataType: 'json',
			} );
		}

	</script>
	<script>
		function repopulate() {
			let catID = document.getElementById("categorySelect").selectedIndex + 1;
			$.ajax( {
				type: "POST",
				url: "php/getAttributesForCategory.php",
				data: {
					category: catID
				},
				error: function ( req, err ) {
					console.log( 'my message' + err );
				},
				success: function ( arr ) {
				$('#editArea').empty();
				for(a = 0; a < arr[1].length; a++ ) {
						let appendTo = document.getElementById("editArea");

						var header = document.createElement("div");
						header.id = arr[0][a];
						header.appendChild(document.createTextNode("Attribute " + (a+1) + " (ID = " + arr[0][a] + "): "));
						header.appendChild(document.createTextNode("active --->  "));
						//appendTo.appendChild(header);
						var newNumberListItem = document.createElement("input");
						newNumberListItem.type = "checkbox";
						if(arr[2][a] == "1") {
							newNumberListItem.checked = true;
						}
						header.appendChild(newNumberListItem);
						appendTo.appendChild(header);

						var textElement = document.createElement("textarea");
						var textNode = document.createTextNode(arr[1][a]);
						textElement.appendChild(textNode);
						appendTo.appendChild(textElement);

					}
					console.log(arr);
				},
				dataType: 'json',
			} );

			a.getElementsByTagName("input")[0].checked=true
		}



	</script>
	<script>
	$.ajax( {
		type: "POST",
		url: "php/getCategories.php",
		error: function ( req, err ) {
			console.log( 'my message' + err );
		},
		success: function ( arr ) {

			var x = document.getElementById("categorySelect");

			for(a = 0; a < arr.length; a++) {
				var option = document.createElement("option");
				option.text = arr[a];
		 		x.add(option);
			}

			x.selectedIndex = -1;


		},
		dataType: 'json',
	} );
	</script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</body>

</html>
