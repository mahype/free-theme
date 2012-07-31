<?php

?>
<div class="wrap">
	<div class="rs-theme-options">
		<h2><?php _e( 'Theme Options' ) ?></h2>
		
		<form name="theme-options">
			
		<!-- Template constructor //-->
		<div class="theme-options-liquid-left">
			<div class="theme-options-left">
				<div class="theme-options-page box-name">
					<div class="box-name-arrow"><br /></div>
					<h3>Seiten</h3>
				</div>
				<div class="theme-options-holder"></div>
			</div>
		</div>
		
		<!-- Template elements //-->
		<div class="theme-options-liquid-right">
			<div class="theme-options-right">
				
				<!-- Basic Element box //-->
				<div class="theme-options-element box-name">
					<div class="box-name-arrow"><br /></div>
					<h3>Basic</h3>
				</div>
				
				<!-- Elements //-->
				<div class="theme-options-elements">
					
					<!-- Menu element //-->
					<div class="theme-options-element">
						<div class="theme-options-element-title">
							<div class="box-name-arrow"><br /></div>
							Menu
						</div>
						<div class="theme-options-element-content">
							<table>
								<tbody>
									<tr>
										<td>Select a menu</td>
										<td>
											<select name="float">
												<option value="1">Main Menu</option>
												<option value="2">Sub Menu</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Name</td>
										<td><input type="text" name="name" /></td>
									</tr>
									<tr>
										<td>Width</td>
										<td>
											<input type="text" name="name" />
											<select name="unit">
												<option value="em">em</option>
												<option value="percentage">%</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Float</td>
										<td>
											<select name="float">
												<option value="left">left</option>
												<option value="right">right</option>
												<option value="none">none</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
										
				</div>
			</div>
		</div>		
		
		<!-- Actions after scripts //-->
		<?php do_action( 'rs_theme_admin_page_end' ); ?>
		
		</form>
	</div>
	<div class="clear"></div>
</div>