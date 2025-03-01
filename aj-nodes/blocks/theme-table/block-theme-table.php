<?php
/**
 * Block Name: Faq
 *
 * The template for displaying the custom gutenberg block named Faq.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package AJNodes
 * @since 1.0.0
 */

AJNodes::block(
	$block,
	function ( $ajn_block_id, $ajn_block_name, $ajn_block_fields, $ajn_option_fields ) {

		// Block variables.
		$ajn_var_theme_table_title = $ajn_block_fields['ajn_var_theme_table_title'] ?? null;
		$ajn_var_tth_col_one  = $ajn_block_fields['ajn_var_tth_col_one'] ?? null;
		$ajn_var_tth_col_two  = $ajn_block_fields['ajn_var_tth_col_two'] ?? null;
		$ajn_var_tth_col_three  = $ajn_block_fields['ajn_var_tth_col_three'] ?? null;
		$ajn_var_tth_col_four  = $ajn_block_fields['ajn_var_tth_col_four'] ?? null;
		$ajn_var_tt_data  = $ajn_block_fields['ajn_var_tt_data'] ?? null;
		$ajn_var_button_one = $ajn_block_fields['button_one'] ?? null;
		$ajn_var_button_column_two = $ajn_block_fields['button_column_two'] ?? null;
		$ajn_var_button_column_three = $ajn_block_fields['button_column_three'] ?? null;
		?>
			<div class="comparison-table-block">
				<?php if(AJNodes::is_block_title($ajn_var_theme_table_title)){ ?>
				<div class="table-head">
					<?php 	AJNodes::the_block_title($ajn_var_theme_table_title,"heading-2") ?>
				</div>
				<?php } ?>
				<div class="gl-s96"></div>
				<div class="comparison-table">
					<table>
						<thead>
							<tr>
								<th>
									<?php
										if($ajn_var_tth_col_one){
											echo esc_html($ajn_var_tth_col_one);
										}
									?>
								</th>
								<th>
									<?php
										if($ajn_var_tth_col_two){
											echo esc_html($ajn_var_tth_col_two);
										}
									?>
								</th>
								<th>
									<?php
										if($ajn_var_tth_col_three){
											echo esc_html($ajn_var_tth_col_three);
										}
									?>
								</th>
								<th>
									<?php
										if($ajn_var_tth_col_four){
											echo esc_html($ajn_var_tth_col_four);
										}
									?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ( $ajn_var_tt_data ) {
								foreach( $ajn_var_tt_data as $ajn_key =>  $ajn_var_tt_col_data ){
									$ajn_column_one_text  = $ajn_var_tt_col_data['column_one_text'] ?? null;
									$ajn_text_check  = $ajn_var_tt_col_data['text_check'] ?? null;
									$ajn_colunn_two_text  = $ajn_var_tt_col_data['colunn_two_text'] ?? null;
									$ajn_colunn_two_check  = $ajn_var_tt_col_data['colunn_two_check'] ?? null;
									$ajn_text_check_col_three  = $ajn_var_tt_col_data['text_check_col_three'] ?? null;
									$ajn_colunn_three_text  = $ajn_var_tt_col_data['colunn_three_text'] ?? null;
									$ajn_colunn_three_check  = $ajn_var_tt_col_data['colunn_three_check'] ?? null;
									$ajn_text_check_col_four  = $ajn_var_tt_col_data['text_check_col_four'] ?? null;
									$ajn_colunn_four_text  = $ajn_var_tt_col_data['colunn_four_text'] ?? null;
									$ajn_colunn_four_check  = $ajn_var_tt_col_data['colunn_four_check'] ?? null;

									?>
									<tr>
								<td>
									<?php
									if($ajn_column_one_text){
										echo esc_html($ajn_column_one_text);
									}
									?>
								</td>
								<?php
								if($ajn_text_check == "check"){
									if($ajn_colunn_two_check){?>
									<td class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/images/tick-icon.png" alt=""></td>
									<?php } else{ ?>
									<td class="checkmark"></td>
									<?php	} }
									else{ ?>
										<td>
											<?php if($ajn_colunn_two_text){
												echo esc_html($ajn_colunn_two_text);

											} ?>
										</td>
									<?php }
								?>
								<?php
								if($ajn_text_check_col_three  == "check"){
									if($ajn_colunn_three_check){?>
									<td class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/images/tick-icon.png" alt=""></td>
									<?php } else{ ?>
									<td class="checkmark"></td>
									<?php	} }
									else{ ?>
										<td>
											<?php if($ajn_colunn_three_text){
												echo esc_html($ajn_colunn_three_text);

											} ?>
										</td>
									<?php }
								?>
								<?php
								if($ajn_text_check_col_four == "check"){
									if($ajn_colunn_four_check){?>
									<td class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/images/tick-icon.png" alt=""></td>
									<?php } else{ ?>
									<td class="checkmark"></td>
									<?php	} }
									else{ ?>
										<td>
											<?php if($ajn_colunn_four_text){
												echo esc_html($ajn_colunn_four_text);

											} ?>
										</td>
									<?php }
								?>
							</tr>
									<?php
								}
							}
							?>


							<tr>
								<td></td>
								<td><?php
								if($ajn_var_button_one){
									echo AJNodes::animated_button($ajn_var_button_one,"ajn-button arrow-btn");
								}
								?>
								</td>
								<td><?php
								if($ajn_var_button_column_two){
									echo AJNodes::animated_button($ajn_var_button_column_two,"ajn-button arrow-btn");
								}
								?>
								</td>
								<td><?php
								if($ajn_var_button_column_three){
									echo AJNodes::animated_button($ajn_var_button_column_three,"ajn-button arrow-btn");
								}
								?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		<?php
	}
);

