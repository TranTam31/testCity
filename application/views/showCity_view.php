<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  	<!-- đây là phần thêm font -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script type="text/javascript" src="<?php echo base_url() ?>lib/jquery-3.7.1.min.js"></script>
  	<script type="text/javascript" src="<?php echo base_url() ?>lib/json2.js"></script>
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Tra cứu thông tin các quận </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <!-- <form action="showData/insertData_controller" method="post" enctype="multidata/form-data"> -->
                                    <div class="input-group mb-3">
                                        <input name="search" type="text" class="form-control" id="search" placeholder="Search data">
                                        <!-- <button type="submit" class="btn btn-success btn-block" value="Search"> -->
                                        <button type="submit" class="btn btn-primary nutxulyajax">Search (Ajax)</button>
                                    </div>
                                <!-- </form> -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>District Name</th>
                                    <th>City Name</th>
                                    <th>Country Name</th>
                                </tr>
                            </thead>
                            <tbody id="load_data">
                                
                                	

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <script>
    	$('.nutxulyajax').click(function(event) {
    		$.ajax({
    		url: 'showData/ajax_show',
    		type: 'POST',
    		dataType: 'json',
    		data: {
    			search: $('#search').val()
    		},
	    	})
	    	.done(function() {
	    		console.log("success");   
	    	})
	    	.fail(function() {
	    		console.log("error");
	    	})
	    	.always(function(data) {
	    		console.log("ok");
	    		console.log(data);
	    		var str = "";
	    		if (data.length != 0) {
				  $.each(data,function(i, item) {
	    			str+= "<tr>";
	    			str+= "<td>" + item.district_id + "</td>"
	    			str+= "<td>" + item.district_name + "</td>"
	    			str+= "<td>" + item.city_name + "</td>"
	    			str+= "<td>" + item.country_name + "</td>"
	    			str+= "</tr>";
	    			});
				} else {
					str+="<h6 class='text-danger text-center mt-3'>No data Found</h6>";
				}
	    		$('#load_data').html(str);
	    	});
	    });
    </script>

</body>
</html>