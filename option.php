<?php
$con = mysqli_connect('localhost','root','','testing');
$sql = mysqli_query($con, "SELECT ");
?>
<!DOCTYPE html>
<html>
<head>
<title>Spot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  
  html, body {
    margin-top: 30px;
	padding-top: 20px;
}

  [data-role="dynamic-fields"] > .form-inline + .form-inline {
    margin-top: 0.5em;
}

[data-role="dynamic-fields"] > .form-inline [data-role="add"] {
    display: none;
}

[data-role="dynamic-fields"] > .form-inline:last-child [data-role="add"] {
    display: inline-block;
}

[data-role="dynamic-fields"] > .form-inline:last-child [data-role="remove"] {
    display: none;
}
  </style>
<script type="text/javascript"> 
$(document).ready(function() {
        
            /* affix the navbar after scroll below header */
$('#nav').affix({
      offset: {
        top: $('header').height()-$('#nav').height()
      }
});    

/* highlight the top nav as scrolling occurs */
$('body').scrollspy({ target: '#nav' })

/* smooth scrolling for scroll to top */
$('.scroll-top').click(function(){
  $('body,html').animate({scrollTop:0},1000);
})

/* smooth scrolling for nav sections */
$('#nav .navbar-nav li>a').click(function(){
  var link = $(this).attr('href');
  var posi = $(link).offset().top;
  $('body,html').animate({scrollTop:posi},700);
});

});
</script>
<script type='text/javascript'>

$(function() {
    // Remove button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
        function(e) {
            e.preventDefault();
            $(this).closest('.form-inline').remove();
        }
    );
    // Add button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
        function(e) {
            e.preventDefault();
            var container = $(this).closest('[data-role="dynamic-fields"]');
            new_field_group = container.children().filter('.form-inline:first-child').clone();
            new_field_group.find('input').each(function(){
                $(this).val('');
            });
            container.append(new_field_group);
        }
    );
});


    	$(document).ready(function(){
    //@naresh action dynamic childs
    var next_exp = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#fielda" + next_exp;
        var addRemove = "#fielda" + (next_exp);
        next_exp = next_exp + 1;
        var newInp = '<div id="fielda'+ next_exp +'" name="field1'+ next_exp +'"><hr/> <div class="form-group"> <label for="csetitle">Question</label> <textarea type="text" class="form-control" id="question" name="question" placeholder="Type Question Here" cols="40" rows="5" style="resize:vertical;" required></textarea> </div> <div class="form-group"> <label for="nt">Upload Image</label> <input type="file" name="file" class="filestyle" data-iconName="glyphicon glyphicon-inbox"> </div> <div class="form-group"> <label for="options">Options</label> <div data-role="dynamic-fields"> <div class="form-inline"> <div class="form-group"> <div class="col-md-12"> <input type="radio" name="reason" value="Answer"> Answer <span>-</span> <label class="sr-only" for="field-name">Option</label> <input type="text" class="form-control" id="field-name" placeholder="Field Name"> </div> </div> <button class="btn btn-danger" data-role="remove"> <span class="glyphicon glyphicon-remove"></span> </button> <button class="btn btn-primary" data-role="add"> <span class="glyphicon glyphicon-plus"></span> </button> </div><!-- /div.form-inline --> </div> <!-- /div[data-role="dynamic-fields"] --> </div> <div class="form-group"> <label for="csetitle">Slug</label> <textarea type="text" class="form-control" id="question" name="question" placeholder="Explain You Answer" cols="40" rows="5" style="resize:vertical;" required></textarea> </div> <div class="form-group"> <label for="csetitle">Point</label> <input type="number" class="form-control" id="question" name="question" placeholder="Allocate Score Here" required><hr/></div></div>';
        var newInput = $(newInp);
	
        var removeBtn = '<div class="form-group"><button id="remove' + (next_exp - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#fielda" + next_exp).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next_exp);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#fielda" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
    
    
			
		});

</script>
</head>
<body>
<nav class="navbar navbar-findcond navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html">Spot</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> Me <span class="badge">0</span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#"><i class="fa fa-fw fa-tag"></i> <span class="badge">Music</span> sayfası <span class="badge">Video</span> sayfasında etiketlendi</a></li>
					</ul>
				</li>
				<li class="active"><a href="../explore/explore.html">Explore<span class="sr-only">(current)</span></a></li>
				<li><a href="../planner/planner.html">Be A Planner</a></li>
				<ul class="nav navbar-nav navbar-right">
                  <li><a href="../view_trip/view_trip.html">View Trip</a></li>
                  <li class="dropdown" style="margin-right: 50px;">
                     <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> Remember me
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-success btn-block">Sign in</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                        </li>
                     </ul>
                  </li>
               </ul>
			</ul>
			<div class="col-md-4 col-md-offset-3" style="margin-top: 12px;">
            <form action="" class="search-form">
                <div class="form-group has-feedback">
            		<label for="search" class="sr-only">Find Your Journey</label>
            		<input type="text" class="form-control" name="search" id="search" placeholder="Find Your Journey">
              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
            	</div>
            </form>
        </div>
		</div>
</nav>
   <div class="container">
             <div class="name" style="margin-top: 50px;"><h2 align="center">Edit Your Package </h2></div>
			    <form action="package_update.php" method="post" enctype="multipart" />
                    <div id="fielda">
                        <div id="fielda0">
							<div class="form-group">
								    <label for="">Your Package Name</label>
									<input type="text" class="form-control" name="package_name" id="package_name" placeholder="You name the package">
							</div>
                            <div class="form-group" id="place">
                                        <label for="place">List of Place You Wish To Guide</label>
                                        <div data-role="dynamic-fields">
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input type="radio" name="reason" value="Botanical Garden"> Ex: <i>botanical garden</i>
                                                        <span>-</span>
                                                        <label class="sr-only" for="field-name">List of Place You Wish To Guide</label>
                                                        <input type="text" class="form-control" name="place" id="field-name" placeholder="Field Name">
                                                    </div>
                                                </div>
                                                <button class="btn btn-danger" data-role="remove">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                                <button class="btn btn-primary" data-role="add">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </div>  <!-- /div.form-inline -->
                                        </div>  <!-- /div[data-role="dynamic-fields"] -->

                            </div>
							<div class="form-group">
								<label for="price">Price</label>
								<span id="price" name="price"></span>
								<span id="reminder"><h6><i>All the price will be decided by Spot</i></h6></span>
							</div>
                            <!--end field0-->
                        </div>
					</div>
					<div class="button" style="margin-top: 50px;">
						<button class="btn btn-success btn-lg pull-right" type="button" type="submit">Finish</button> 
					</div>
                        <!--end field-->
				</form>
		</div>
		<script>
$(document).ready(function(){
    $("button").click(function(){
        var x = $("#place").serializeArray();
        });
    });
  </script>
		</body>
		</html>

