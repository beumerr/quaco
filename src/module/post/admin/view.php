<?php


?>

<section id="view-pages">

	<?php if(isset($slug_404)) : ?>
	<div class="msg-container type-err border-light shadow-medium">
		<p><i class="la la-exclamation-triangle"></i> Unfortunately, we cannot link the requested URL to a page</p>
	</div>
	<?php endif; ?>

	<h2 class="section-title"><?php echo $module['name']; ?> management</h2>
	<div class="flex-row">
		<div class="flex-box flex-col view-box shadow-light">
			<div class="button-row clear-after">
				<div class="button-list float-left">
					<div class="submit-button small-button extend-button blue-bg icon-after border-light float-left"
						onclick="load_xml('LOAD_MODULE_PAGE', '<?php echo type_to_json($module['slug'], 'add'); ?>')">
						Add <?php echo $module['slug']; ?>
					</div>
				</div>
				<div class="button-list float-right">
					<div class="submit-button small-button action-button icon-after border-light float-left inactive">
						Action
					</div>
					<div class="submit-button small-button filter-button icon-after border-light float-left">
						Filter
					</div>
					<div class="submit-button small-button select-button icon-after border-light float-left"  onclick="select_all_posts()">
						Select all
					</div>
				</div>
			</div>
			<div class="table-row">
				<table id="view-all-pages">
					<thead>
					<tr>
						<th colspan="2">
							Title
							<div class="order-buttons">
								<i class="la la-angle-up"></i>
								<i class="la la-angle-down"></i>
							</div>
						</th>
						<th>
							Status
							<div class="order-buttons">
								<i class="la la-angle-up"></i>
								<i class="la la-angle-down"></i>
							</div>
						</th>
						<th>
							Author
							<div class="order-buttons">
								<i class="la la-angle-up"></i>
								<i class="la la-angle-down"></i>
							</div>
						</th>
						<th class="active order-desc align-right">
							Date
							<div class="order-buttons">
								<i class="la la-angle-up"></i>
								<i class="la la-angle-down"></i>
							</div>
						</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td class="td-checkbox">
							<label class="checkbox-container">
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
						</td>
						<td class="td-title">
							<div>
								The Mythbuster’s Guide to Savin..
								<ul class="hidden-tools">
									<li>View</li>
									<li>Edit</li>
									<li>Delete</li>
								</ul>
							</div>
						</td>
						<td class="td-seo align-center">
							<label class="seo-score green-bg">8.5</label>
						</td>
						<td class="td-status">
							<div class="status-circle green-bg">p</div>
						</td>
						<td class="td-focus">
							<div class="small-block">Special keyword</div>
						</td>
						<td class="td-author">
							<div class="small-block">T. Beumer</div>
						</td>
						<td class="td-date align-right">
							<div class="small-block">24 JAN</div>
						</td>
					</tr>
					<tr>
						<td class="td-checkbox">
							<label class="checkbox-container">
								<input type="checkbox" >
								<span class="checkmark"></span>
							</label>
						</td>
						<td class="td-title">
							<div>
								Rockstar Finance gave me $100 to sp...
								<ul class="hidden-tools">
									<li>View</li>
									<li>Edit</li>
									<li>Delete</li>
								</ul>
							</div>
						</td>
						<td class="td-seo align-center">
							<label class="seo-score green-bg">7.3</label>
						</td>
						<td class="td-status align-center">
							<div class="status-circle green-bg">p</div>
						</td>
						<td class="td-focus">
							<div class="small-block">Unicorn farm</div>
						</td>
						<td class="td-author">
							<div class="small-block">J. Bernal</div>
						</td>
						<td class="td-date align-right">
							<div class="small-block">20 JAN</div>
						</td>

					</tr>
					<tr>
						<td class="td-checkbox">
							<label class="checkbox-container">
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
						</td>
						<td class="td-title">
							<div>
								The Mythbuster’s Guide to Savin..
								<ul class="hidden-tools">
									<li>View</li>
									<li>Edit</li>
									<li>Delete</li>
								</ul>
							</div>
						</td>
						<td class="td-seo align-center">
							<label class="seo-score green-bg">8.5</label>
						</td>
						<td class="td-status">
							<div class="status-circle green-bg">p</div>
						</td>
						<td class="td-focus">
							<div class="small-block">Special keyword</div>
						</td>
						<td class="td-author">
							<div class="small-block">T. Beumer</div>
						</td>
						<td class="td-date align-right">
							<div class="small-block">24 JAN </div>
						</td>
					</tr>
					<tr>
						<td class="td-checkbox">
							<label class="checkbox-container">
								<input type="checkbox" >
								<span class="checkmark"></span>
							</label>
						</td>
						<td class="td-title">
							<div>
								Rockstar Finance gave me $100 to sp...
								<ul class="hidden-tools">
									<li>View</li>
									<li>Edit</li>
									<li>Delete</li>
								</ul>
							</div>
						</td>
						<td class="td-seo align-center">
							<label class="seo-score green-bg">7.3</label>
						</td>
						<td class="td-status align-center">
							<div class="status-circle green-bg">p</div>
						</td>
						<td class="td-focus">
							<div class="small-block">Unicorn farm</div>
						</td>
						<td class="td-author">
							<div class="small-block">J. Bernal</div>
						</td>
						<td class="td-date align-right">
							<div class="small-block">20 JAN</div>
						</td>

					</tr>
					<tr>
						<td class="td-checkbox">
							<label class="checkbox-container">
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
						</td>
						<td class="td-title">
							<div>
								The Mythbuster’s Guide to Savin..
								<ul class="hidden-tools">
									<li>View</li>
									<li>Edit</li>
									<li>Delete</li>
								</ul>
							</div>
						</td>
						<td class="td-seo align-center">
							<label class="seo-score green-bg">8.5</label>
						</td>
						<td class="td-status">
							<div class="status-circle green-bg">p</div>
						</td>
						<td class="td-focus">
							<div class="small-block">Special keyword</div>
						</td>
						<td class="td-author">
							<div class="small-block">T. Beumer</div>
						</td>
						<td class="td-date align-right">
							<div class="small-block">24 JAN</div>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
			<div class="table-pagination-row">
				<div class="showing-tool float-left">
					<div class="table-pagination-button icon-after">5 <i class="la la-angle-down"></i></div>
					<div class="table-showing-label">Showing</div>
				</div>
				<div class="load-tool float-right">
					<div class="table-pagination-button">Load more</div>
				</div>
			</div>
		</div>

	</div>
</section>