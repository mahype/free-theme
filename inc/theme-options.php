<?php

?>
<div class="wrap">
	<div class="rs-theme-options">
		<h2><?php _e( 'Theme Options' ) ?></h2>
		
		<ul class="subsubsub">
			<li><a class="current" href="#">Layout</a> |</li>
			<li><a href="#">Color Schemes</a> |</li>
			<li><a href="#">CSS Editor</a> |</li>
			<li><a href="#">Import/Export</a> |</li>
		</ul>
		
		<form name="theme-options">
		<?php wp_nonce_field( 'save_theme_layout' ); ?> 
			
		<!-- Template elements //-->
		<div class="theme-options-liquid-right">
			<div class="theme-options-right">
				
				<!-- Basic Element box //-->
				<div class="box-name">
					<div class="box-name-arrow"><br /></div>
					<h3>Basic</h3>
				</div>
				
				<!-- Elements //-->
				<div class="theme-options-elements">
					
					<!-- Menu element //-->
					<div class="theme-options-element">
						
						<div class="theme-options-element-title">
							<div class="box-settings"><br /></div>
							<p class="box-title">Menu</p>
						</div>
						
						<div class="theme-options-element-content">
							<div class="box-close"><br /></div>
							<table>
								<tbody>
									<tr>
										<td>Select a menu</td>
										<td>
											<select name="menu">
												<option value="1">Main Menu</option>
												<option value="2">Sub Menu</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Name</td>
										<td>
											<input type="text" name="name" />
										</td>
									</tr>
									<tr>
										<td>Width</td>
										<td>
											<input type="text" name="width" />
											<select name="width-unit">
												<option>em</option>
												<option>%</option>
												<option>px</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Height</td>
										<td>
											<input type="text" name="height" />
											<select name="height-unit">
												<option>em</option>
												<option>%</option>
												<option>px</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Float</td>
										<td>
											<select name="float" class="text">
												<option value="none">none</option>
												<option value="left">left</option>
												<option value="right">right</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Class</td>
										<td><input type="text" name="class" /></td>
									</tr>
									<tr>
										<td>ID</td>
										<td><input type="text" name="id" /></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
										
				</div>
			</div>
		</div>
		
		<!-- Template constructor //-->
		<div class="theme-options-liquid-left">
			<div class="theme-options-left">
				<div class="theme-options-page box-name">
					<div class="box-name-arrow"><br /></div>
					<h3>Seiten</h3>
				</div>
				<div class="theme-options-holder">
					<div class="theme-options-holder-content"></div>
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
		
		<!-- Actions after scripts //-->
		<?php do_action( 'rs_theme_admin_page_end' ); ?>
		
		</form>
	</div>
	<div class="clear"></div>
</div>