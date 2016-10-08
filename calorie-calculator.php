<?php 
/*
Plugin Name: Calorie Calculator
Plugin URI: http://wordpress.org/plugins/calorie-calculator/
Description: The Calorie Calculator can be used to estimate the calories you need to consume each day. This calculator can also provide some simple guideline if you want to gain or lose weight. Use the "metric units" tab if you are more comfortable with the international standard metric units.
Author: Md. Zubaer Ahammed
Version: 1.0.0
Author URI: http://zubaer.com
License: GPL2+
*/

class Zubaer_Calorie_Calculator extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'my_widget',
			'description' => 'The Calorie Calculator can be used to estimate the calories you need to consume each day.',
		);
		parent::__construct( 'my_widget', 'Calorie Calculator', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		?>

		<!-- tabs html starts -->

		<div id="calorie_calculator_tabs">


		  <ul>
		    <li><a href="#tabs-1">US Units</a></li>
		    <li><a href="#tabs-2">Metric Units</a></li>
		  </ul>
		  <div id="tabs-1">

		  <div id="calorie_calculator_us_show_errors"></div>

		  <form action="" id="calorie_calculator_form_us_units" name="calorie_calculator_form_us_units">
		    
		    <div>
			    <label for="calorie_calculator_age">Age:</label>
				<input type="number" name="calorie_calculator_age" id="calorie_calculator_age" class="calorie_calculator_age" placeholder="28">
			</div>

			<div>
			    <label for="gender">Gender:</label>
				<input type="radio" name="calorie_calculator_gender" value="male" id="calorie_calculator_gender" class="calorie_calculator_male" checked> Male <input type="radio" name="calorie_calculator_gender" value="female" id="calorie_calculator_gender" class="calorie_calculator_female"> Female
			</div>

			<div>
			    <label for="calorie_calculator_height_feet">Height:</label>
			    <div class="height_feet_inch">
					<input type="number" name="calorie_calculator_height_feet" class="calorie_calculator_height_feet" placeholder="5 Feet">

					<input type="number" name="calorie_calculator_height_inch" class="calorie_calculator_height_inch" id="calorie_calculator_height_inch" placeholder="8 Inch">
				</div>
			</div>

			<div>
			    <label for="calorie_calculator_weight">Weight:</label>
				<input type="number" name="calorie_calculator_weight" id="calorie_calculator_weight" class="calorie_calculator_weight" placeholder="165 Pounds">	
			</div>
	
			<div>
				<label for="calorie_calculator_activity">Activity: </label>		
				<select id="calorie_calculator_activity" name="calorie_calculator_activity" class="calorie_calculator_activity">
					<option value="1">Basal Metabolic Rate (BMR)</option>
					<option value="1.2">Sedentary - little or no exercise</option>
					<option value="1.375" selected>Lightly Active - exercise/sports 1-3 times/week</option>
					<option value="1.55">Moderatetely Active - exercise/sports 3-5 times/week</option>
					<option value="1.725">Very Active - hard exercise/sports 6-7 times/week</option>
					<option value="1.9">Extra Active - very hard exercise/sports or physical job</option>
				</select>	
			</div>

			<input type="submit" value="Calculate">

		  </form>

		  </div>
		  <div id="tabs-2">
		
		  <div id="calorie_calculator_metric_show_errors"></div>	

		  <form action="" id="calorie_calculator_form_metric_units" name="calorie_calculator_form_metric_units">
		    
			<div>
			    <label for="calorie_calculator_age">Age:</label>
				<input type="number" name="calorie_calculator_age" id="calorie_calculator_age" class="calorie_calculator_age" placeholder="28">
			</div>

			<div>
			    <label for="gender">Gender:</label>
				<input type="radio" name="calorie_calculator_gender" value="male" id="calorie_calculator_gender" class="calorie_calculator_male" checked> Male <input type="radio" name="calorie_calculator_gender" value="female" id="calorie_calculator_gender" class="calorie_calculator_female"> Female
			</div>

			<div>
			    <label for="calorie_calculator_height">Height:</label>
				<input type="number" name="calorie_calculator_height" class="calorie_calculator_height" placeholder="180 Centimeters"> 
			</div>

			<div>
			    <label for="calorie_calculator_weight">Weight:</label>
				<input type="number" name="calorie_calculator_weight" id="calorie_calculator_weight" class="calorie_calculator_weight" placeholder="68 Kilograms">	
			</div>

			<div>
				<label for="calorie_calculator_activity">Activity: </label>		
				<select id="calorie_calculator_activity" name="calorie_calculator_activity" class="calorie_calculator_activity">
					<option value="1">Basal Metabolic Rate (BMR)</option>
					<option value="1.2">Sedentary - little or no exercise</option>
					<option value="1.375" selected>Lightly Active - exercise/sports 1-3 times/week</option>
					<option value="1.55">Moderatetely Active - exercise/sports 3-5 times/week</option>
					<option value="1.725">Very Active - hard exercise/sports 6-7 times/week</option>
					<option value="1.9">Extra Active - very hard exercise/sports or physical job</option>
				</select>
			</div>	

			<input type="submit" value="Calculate">

		  </form>
		  



		  </div>


		  <div id="calorie_calculator_result"></div>	

		</div>
		
		<!-- tabs html ends -->


		<?php

		echo $args['after_widget'];

	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		
		//var_dump($instance);
		
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Calorie Calculator', 'zubaer_calorie_calculator' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 

	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;


	}
}

add_action( 'widgets_init', function(){
	register_widget( 'Zubaer_Calorie_Calculator' );
});


function my_scripts_method() {


  // if( !wp_script_is('jquery-ui-tabs') ) { 	
  // 	wp_enqueue_script('jquery-ui-tabs');
  // }

  wp_register_style('calorie-calculator-jquery-ui-css', plugins_url( 'css/jquery-ui.css', __FILE__ ));

  wp_enqueue_style( 'calorie-calculator-stylesheet', plugins_url( 'css/calorie_calculator.css', __FILE__ ), array('calorie-calculator-jquery-ui-css') );
  wp_enqueue_script( 'calorie-calculator-javascript', plugins_url( 'js/calorie_calculator.js', __FILE__ ), array('jquery', 'jquery-ui-tabs') );

}

add_action('wp_enqueue_scripts', 'my_scripts_method');


