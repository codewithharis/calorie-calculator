
  jQuery( function() {


    jQuery( "#calorie_calculator_tabs" ).tabs();


    jQuery( "#calorie_calculator_form_us_units" ).submit(function(e) {
    	e.preventDefault();


		var formData = jQuery(this).serializeArray().reduce(function(obj, item) {


		if(item.value == '') {
			jQuery('#calorie_calculator_us_show_errors').html('<p class="calorie_calculator_show_errors">Please Fill up all of the fields!</p>');
			return;
		}

		    obj[item.name] = item.value;
		    return obj;
		}, {});

    	//console.log(formData);
    	

    	// ref: http://www.calculator.net/calorie-calculator.html 
    	
    	/*
    	 * BMR calculation
    	 */
    	
    	 var BMR =  0;

    	 var age = formData.calorie_calculator_age,
    	 	 gender = formData.calorie_calculator_gender,
    	 	 height = (formData.calorie_calculator_height_feet * 30.48) + (formData.calorie_calculator_height_inch * 2.54),
    	 	 weight = formData.calorie_calculator_weight * 0.453592,
    	 	 activity_factor = formData.calorie_calculator_activity;

    	 if(formData.calorie_calculator_gender == 'male') {

    	 	BMR = 10 * weight + 6.25 * height - 5 * age + 5
    	 }

    	 if(formData.calorie_calculator_gender == 'female') {

    	 	BMR = 10 * weight + 6.25 * height - 5 * age - 161;
    	 }

    	 //Now apply activity factor to BMR
    	 
    	 BMR = Math.round(BMR * activity_factor);

    	 if( activity_factor == 1) {

    	 	var result = '<p class="calorie_calculator_single_result green">BMR = <span class="bmr_val">' + BMR + '</span> Calories/day.</p>';

    	 } else {

	    	var result = '<p class="calorie_calculator_single_result green"><span>&#9755;</span>  You need <span class="bmr_val">' + BMR + '</span> Calories/day to maintain your weight.</p>';

		 	result += '<p class="calorie_calculator_single_result"><span>&#9755;</span> You need ' + (BMR - 500) + ' Calories/day to lose 1 lb per week.</p>';
		 	result += '<p class="calorie_calculator_single_result"><span>&#9755;</span>  You need ' + (BMR - 1000) + ' Calories/day to lose 2 lb per week.</p>';
		 	result += '<p class="calorie_calculator_single_result"><span>&#9755;</span>  You need ' + (BMR + 500) + ' Calories/day to gain 1 lb per week.</p>';
		 	result += '<p class="calorie_calculator_single_result"><span>&#9755;</span>  You need ' + (BMR + 1000) + ' Calories/day to gain 2 lb per week.</p>';
		}

    	jQuery("#calorie_calculator_result").html(result);
    });




    jQuery( "#calorie_calculator_form_metric_units" ).submit(function(e) {
    	e.preventDefault();


		var formData = jQuery(this).serializeArray().reduce(function(obj, item) {

			if(item.value == '') {
				jQuery('#calorie_calculator_metric_show_errors').html('<p class="calorie_calculator_show_errors">Please Fill up all of the fields!</p>');
				return;
			}

		    obj[item.name] = item.value;
		    return obj;
		}, {});

    	//console.log(formData);
    	

    	// ref: http://www.calculator.net/calorie-calculator.html 
    	
    	/*
    	 * BMR calculation
    	 */
    	
    	 var BMR =  0;

    	 var age = formData.calorie_calculator_age,
    	 	 gender = formData.calorie_calculator_gender,
    	 	 height = formData.calorie_calculator_height,
    	 	 weight = formData.calorie_calculator_weight,
    	 	 activity_factor = formData.calorie_calculator_activity;




    	 if(formData.calorie_calculator_gender == 'male') {

    	 	BMR = 10 * weight + 6.25 * height - 5 * age + 5
    	 }

    	 if(formData.calorie_calculator_gender == 'female') {

    	 	BMR = 10 * weight + 6.25 * height - 5 * age - 161;
    	 }

    	 //Now apply activity factor to BMR
    	 
    	 BMR = Math.round(BMR * activity_factor);


    	 if( activity_factor == 1) {

    	 	var result = '<p class="calorie_calculator_single_result green">BMR = <span class="bmr_val">' + BMR + '</span> Calories/day.</p>';

    	 } else {

	    	var result = '<p class="calorie_calculator_single_result green"><span>&#9755;</span>  You need <span class="bmr_val">' + BMR + '</span> Calories/day to maintain your weight.</p>';

		 	result += '<p class="calorie_calculator_single_result"><span>&#9755;</span> You need ' + (BMR - 500) + ' Calories/day to lose 1 lb per week.</p>';
		 	result += '<p class="calorie_calculator_single_result"><span>&#9755;</span>  You need ' + (BMR - 1000) + ' Calories/day to lose 2 lb per week.</p>';
		 	result += '<p class="calorie_calculator_single_result"><span>&#9755;</span>  You need ' + (BMR + 500) + ' Calories/day to gain 1 lb per week.</p>';
		 	result += '<p class="calorie_calculator_single_result"><span>&#9755;</span>  You need ' + (BMR + 1000) + ' Calories/day to gain 2 lb per week.</p>';
		}


    	jQuery("#calorie_calculator_result").html(result);
    });




  } );