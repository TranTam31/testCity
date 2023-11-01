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
                        <h4>Form Thêm </h4>
                    </div>
                    <div class="card-body load_select">
                        <div class="row select_group" id="select_group_1">
                            <div class="col-md-7">

                                <select class="form-control city">
								  <option value="">Select City</option>
								  <?php foreach ($mangketqua as $value): ?>
								  	<option value="<?= $value['city_id'] ?>"> <?= $value['city_name'] ?> </option>
								  <?php endforeach ?>
								</select>

                                <select class="form-control district">
								  <option>Select District</option>
								</select>
                                
                            </div>
                        </div>
                    </div>
                    <div>
                            <button type="submit" class="btn btn-primary nutxulyajax">Thêm một div</button>
                            <button type="submit" class="btn btn-warning guidulieu">Submit</button>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>

	<script>
        $('.load_select').on('change', '.select_group .city', function() {
            var $selectGroup = $(this).closest('.select_group');
            var city_id = $selectGroup.find('.city').val();
            var district = $selectGroup.find('.district');

            // Thực hiện AJAX request và xử lý dữ liệu với city_id
            if (city_id) {
                $.ajax({
                    url: 'showData/getDataDis',
                    type: 'POST',
                    data: { city_id: city_id },
                    dataType: 'json',
                })
                .done(function(data) {
                    console.log("success");
                    console.log(data);
                    district.empty();
                    district.append($('<option>', {
                        value: null,
                        text: 'Select District'
                    }));
                    $.each(data.dulieuquan, function(index, value_dis) {
                        district.append($('<option>', {
                            value: value_dis.district_id,
                            text: value_dis.district_name
                        }));
                    });
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            }
        });

        $('.nutxulyajax').click(function(event) {
        	$.ajax({
	            url: 'showData/ajax_showw',
	            type: 'POST',
	            dataType: 'json',
	        })
		    .done(function(data) {
	        	var newIndex = $('.select_group').length + 1;
	            var str = "";
	            str += "<hr>";
	            str += "<div class='row select_group' id='select_group_" + newIndex + "'>";
	            str += "<div class='col-md-7'>";
	            str += "<select class='form-control city'>";
	            str += '<option value="">Select City</option>';
	            $.each(data.dulieu, function(index, item) {
	                str += '<option value="' + item.city_id + '">' + item.city_name + '</option>';
	            });
	            str += "</select>";
	            str += "<select class='district form-control'>";
	            str += "<option>Chọn quận</option>";
	            str += "</select>";
	            str += "</div>";
	            str += "</div>";
	            
	            $('.load_select').append(str);
	        })
	        .fail(function() {
	            console.log("error");
	        })
	        .always(function(data) {
	            console.log("complete");
	        });
        });



        $('.guidulieu').click(function(event) {
        	var selectedData = [];
		    $('.select_group').each(function() {
		        var city = $(this).find('.city').val();
		        var district = $(this).find('.district').val();

		        if (city && district) {
		            selectedData.push({
		                city: city,
		                district: district
		            });
		        }
		    });

		    // Gửi dữ liệu lên server
		    $.ajax({
		        url: 'showData/pushDataToModel',
		        type: 'POST',
		        data: { selectedData: selectedData },
		        dataType: 'json',
		    })
		    .done(function(response) {
		        console.log("Success");
		    })
		    .fail(function() {
		        console.log("Error");
		        location.reload(); // reload lại trang nha.
		    });
        });
    </script>

</body>
</html>