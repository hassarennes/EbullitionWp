<?php
// #####################################################################
// ### SLIDE ANYTHING PLUGIN - PHP FUNCTIONS FOR WORDPRESS FRONT-END ###
// #####################################################################

add_shortcode('slide-anything', 'slide_anything_shortcode');

/* ##### ROOT FUNCTION THAT IS CALLED TO BY THE 'slide-anything' SHORTCODE ##### */
function slide_anything_shortcode($atts) {
	wp_enqueue_script('jquery');
	wp_register_script('owl_carousel_js', SA_PLUGIN_PATH.'owl-carousel/owl.carousel.min.js', array('jquery'), '1.3.3', true);
	wp_enqueue_script('owl_carousel_js');
	wp_register_style('owl_carousel_css', SA_PLUGIN_PATH.'owl-carousel/owl.carousel.css');
	wp_enqueue_style('owl_carousel_css');
	wp_register_style('owl_theme_css', SA_PLUGIN_PATH.'owl-carousel/owl-theme.css');
	wp_enqueue_style('owl_theme_css');
		
	// EXTRACT SHORTCODE ATTRIBUTES
	extract(shortcode_atts(array(
		'id' => 0,
	), $atts));
	$output = '';
	
	if ($id == 0) {
		// AN 'id' PARAMETER HAS NOT BEEN PROVIDED IN THE SHORTCODE
		$output .= "<div id='sa_invalid_postid'>A valid 'Slide Anything' ID has not been provided</div>\n";
	} else {
		$metadata = get_metadata('post', $id);
		if (count($metadata) == 0) {
			// THE 'id' PARAMETER PROVIDED IN THE SHORTCODE IS INVALID
			$output .= "<div id='sa_invalid_postid'>A valid 'Slide Anything' ID has not been provided</div>\n";
		} else {
			// ### VALID 'id' PROVIDED - PROCESS SHORTCODE ###
			// GET SLIDE DATA FROM DATABASE AND SAVE IN ARRAY
			$slide_data = array();
			$slide_data['num_slides'] = $metadata['sa_num_slides'][0];
			for ($i = 1; $i <= $slide_data['num_slides']; $i++) {
				// apply 'the_content' filter to slide content to process any shortcodes
				$slide_data["slide".$i."_content"] = apply_filters('the_content', $metadata["sa_slide".$i."_content"][0]);
				$slide_data["slide".$i."_image_id"] = $metadata["sa_slide".$i."_image_id"][0];
				$slide_data["slide".$i."_image_size"] = $metadata["sa_slide".$i."_image_size"][0];
				$slide_data["slide".$i."_image_repeat"] = $metadata["sa_slide".$i."_image_repeat"][0];
				$slide_data["slide".$i."_image_color"] = $metadata["sa_slide".$i."_image_color"][0];
			}
			$slide_data['slide_duration'] = floatval($metadata['sa_slide_duration'][0]) * 1000;
			if ($slide_data['slide_duration'] == 0) {
				$slide_data['slide_duration'] = 'false';
			}
			$slide_data['slide_transition'] = floatval($metadata['sa_slide_transition'][0]) * 1000;
			$slide_data['loop_slider'] = $metadata['sa_loop_slider'][0];
			if ($slide_data['loop_slider'] == '1') {
				$slide_data['loop_slider'] = 'true';
			} else {
				$slide_data['loop_slider'] = 'false';
			}
			$slide_data['stop_hover'] = $metadata['sa_stop_hover'][0];
			if ($slide_data['stop_hover'] == '1') {
				$slide_data['stop_hover'] = 'true';
			} else {
				$slide_data['stop_hover'] = 'false';
			}
			$slide_data['random_order'] = $metadata['sa_random_order'][0];
			if ($slide_data['random_order'] == '1') {
				$slide_data['random_order'] = 'true';
			} else {
				$slide_data['random_order'] = 'false';
			}
			$slide_data['nav_arrows'] = $metadata['sa_nav_arrows'][0];
			if ($slide_data['nav_arrows'] == '1') {
				$slide_data['nav_arrows'] = 'true';
			} else {
				$slide_data['nav_arrows'] = 'false';
			}
			$slide_data['pagination'] = $metadata['sa_pagination'][0];
			if ($slide_data['pagination'] == '1') {
				$slide_data['pagination'] = 'true';
			} else {
				$slide_data['pagination'] = 'false';
			}
			$slide_data['items_width1'] = $metadata['sa_items_width1'][0];
			$slide_data['items_width2'] = $metadata['sa_items_width2'][0];
			$slide_data['items_width3'] = $metadata['sa_items_width3'][0];
			$slide_data['items_width4'] = $metadata['sa_items_width4'][0];
			$slide_data['items_width5'] = $metadata['sa_items_width5'][0];
			$slide_data['css_id'] = $metadata['sa_css_id'][0];
			$slide_data['background_color'] = $metadata['sa_background_color'][0];
			$slide_data['border_width'] = $metadata['sa_border_width'][0];
			$slide_data['border_color'] = $metadata['sa_border_color'][0];
			$slide_data['border_radius'] = $metadata['sa_border_radius'][0];
			$slide_data['wrapper_padd_top'] = $metadata['sa_wrapper_padd_top'][0];
			$slide_data['wrapper_padd_right'] = $metadata['sa_wrapper_padd_right'][0];
			$slide_data['wrapper_padd_bottom'] = $metadata['sa_wrapper_padd_bottom'][0];
			$slide_data['wrapper_padd_left'] = $metadata['sa_wrapper_padd_left'][0];
			$slide_data['slide_min_height'] = $metadata['sa_slide_min_height'][0];
			$slide_data['slide_padding_tb'] = $metadata['sa_slide_padding_tb'][0];
			$slide_data['slide_padding_lr'] = $metadata['sa_slide_padding_lr'][0];
			$slide_data['slide_margin_lr'] = $metadata['sa_slide_margin_lr'][0];
			
			// RE-ORDER SLIDES IN A RANDOM ORDER IF 'Random Order' CHECKBOX IS CHECKED
			if ($slide_data['random_order'] == 'true') {
				$reorder_arr = array();
				for ($i = 1; $i <= $slide_data['num_slides']; $i++) {
					$reorder_arr[$i-1]['content'] = $slide_data["slide".$i."_content"];
					$reorder_arr[$i-1]['image_id'] = $slide_data["slide".$i."_image_id"];
					$reorder_arr[$i-1]['image_size'] = $slide_data["slide".$i."_image_size"];
					$reorder_arr[$i-1]['image_repeat'] = $slide_data["slide".$i."_image_repeat"];
					$reorder_arr[$i-1]['image_color'] = $slide_data["slide".$i."_image_color"];
				}
				shuffle($reorder_arr);
				for ($i = 1; $i <= $slide_data['num_slides']; $i++) {
					$slide_data["slide".$i."_content"] = $reorder_arr[$i-1]['content'];
					$slide_data["slide".$i."_image_id"] = $reorder_arr[$i-1]['image_id'];
					$slide_data["slide".$i."_image_size"] = $reorder_arr[$i-1]['image_size'];
					$slide_data["slide".$i."_image_repeat"] = $reorder_arr[$i-1]['image_repeat'];
					$slide_data["slide".$i."_image_color"] = $reorder_arr[$i-1]['image_color'];
				}
			}
			
			// GENERATE HTML CODE FOR THE OWL CAROUSEL SLIDER
			$wrapper_style =  "background:".$slide_data['background_color']."; ";
			$wrapper_style .=  "border:solid ".$slide_data['border_width']."px ".$slide_data['border_color']."; ";
			$wrapper_style .=  "border-radius:".$slide_data['border_radius']."px; ";
			$wrapper_style .=  "padding:".$slide_data['wrapper_padd_top']."px ";
			$wrapper_style .= $slide_data['wrapper_padd_right']."px ";
			$wrapper_style .= $slide_data['wrapper_padd_bottom']."px ";
			$wrapper_style .= $slide_data['wrapper_padd_left']."px;";
			$output .= "<div style='".esc_attr($wrapper_style)."'>\n";
			if ($slide_data['pagination'] == 'true') {
				$output .= "<div id='".esc_attr($slide_data['css_id'])."' class='owl-carousel owl-pagination-true'>\n";
			} else {
				$output .= "<div id='".esc_attr($slide_data['css_id'])."' class='owl-carousel'>\n";
			}
			for ($i = 1; $i <= $slide_data['num_slides']; $i++) {
				$slide_content = $slide_data["slide".$i."_content"];
				$slide_image_src = wp_get_attachment_image_src($slide_data["slide".$i."_image_id"], 'full');
				$slide_image_size = $slide_data["slide".$i."_image_size"];
				$slide_image_repeat = $slide_data["slide".$i."_image_repeat"];
				$slide_image_color = $slide_data["slide".$i."_image_color"];
				$slide_style =  "padding:".$slide_data['slide_padding_tb']."% ".$slide_data['slide_padding_lr']."%; ";
				$slide_style .= "margin:0px ".$slide_data['slide_margin_lr']."%; ";
				$slide_style .= "min-height:".$slide_data['slide_min_height']."px; ";
				$slide_style .= "background-image:url(\"".$slide_image_src[0]."\"); ";
				$slide_style .= "background-size:".$slide_image_size."; ";
				$slide_style .= "background-repeat:".$slide_image_repeat."; ";
				$slide_style .= "background-color:".$slide_image_color."; ";
				$output .= "<div style='".esc_attr($slide_style)."'>".wp_kses_post($slide_content)."</div>\n";
			}
			$output .= "</div>\n";
			$output .= "</div>\n";
			
			// GENERATE JQUERY CODE FOR THE OWL CAROUSEL SLIDER
			if (wp_script_is('jquery', 'done')) { // Only generate JQuery code if JQuery has been loaded
				$output .= "<script type='text/javascript'>\n";
				$output .= "	jQuery(document).ready(function() {\n";
				$output .= "		jQuery('#".esc_attr($slide_data['css_id'])."').owlCarousel({\n";
				$output .= "			itemsCustom : [\n";
				$output .= "				[0,".esc_attr($slide_data['items_width1'])."],\n";
				$output .= "				[480,".esc_attr($slide_data['items_width2'])."],\n";
				$output .= "				[768,".esc_attr($slide_data['items_width3'])."],\n";
				$output .= "				[980,".esc_attr($slide_data['items_width4'])."],\n";
				$output .= "				[1200,".esc_attr($slide_data['items_width5'])."]\n";
				$output .= "			],\n";
				$output .= "			autoPlay : ".esc_attr($slide_data['slide_duration']).",\n";
				$output .= "			paginationSpeed : ".esc_attr($slide_data['slide_transition']).",\n";
				$output .= "			slideSpeed : ".esc_attr($slide_data['slide_transition']).",\n";
				$output .= "			rewindSpeed : 1000,\n";
				$output .= "			rewindNav : ".esc_attr($slide_data['loop_slider']).",\n";
				$output .= "			stopOnHover : ".esc_attr($slide_data['stop_hover']).",\n";
				$output .= "			navigation : ".esc_attr($slide_data['nav_arrows']).",\n";
				$output .= "			navigationText : ['',''],\n";
				$output .= "			pagination : ".esc_attr($slide_data['pagination']).",\n";
				$output .= "			itemsScaleUp : false,\n";
				$output .= "			mouseDrag : true,\n";
				$output .= "			touchDrag : true\n";
				$output .= "		});\n";
				$output .= "	});\n";
				$output .= "</script>\n";
			}		
		}
	}
	return $output;
}
?>