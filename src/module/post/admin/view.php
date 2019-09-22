
<section id="view-pages">

	<?php if(isset($slug_404)) : ?>
	<div class="msg-container type-err border-light shadow-medium">
		<p><i class="la la-exclamation-triangle"></i> Unfortunately, we cannot link the requested URL to a page</p>
	</div>
	<?php endif; ?>

    <div class="section-header">
        <h2 class="section-title"><?php echo $module['name']; ?> management</h2>
        <ul class="section-stats">
            <li>102 Pages</li>
            <li>24.085 Words</li>
            <li>120.456 Chars</li>
        </ul>
    </div>

	<div class="flex-row">
		<div class="flex-box flex-col view-box shadow-light">
			<div class="button-row clear-after">
				<div class="button-list align-left">
                    <div class="flex-row no-margin">
                        <div class="submit-button small-button extend-button blue-bg icon-after border-light float-left"
                             onclick="load_xml('LOAD_MODULE_PAGE', '<?php echo _type_to_json($module['slug'], 'add'); ?>')">
                            Add <?php echo $module['slug']; ?>
                        </div>
                        <div id="quick-search-posts">
                            <label for="quick-search-input"><i class="la la-search"></i></label>
                            <input id="quick-search-input" type="text"
                                   oninput="quick_search('#view-all', this.value)"
                                   placeholder="Quick search..">
                            <div id="disable-quick-stats">
                                <i class="la la-close" onclick="show_default()"></i>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="button-list align-right">
					<div class="submit-button small-button action-button icon-after border-light inactive">
						Action
					</div>
					<div class="submit-button small-button select-button icon-after border-light "
                         onclick="select_all_posts()">
						Select all
					</div>
				</div>
			</div>
			<?php $table->draw_view_table(); ?>
		</div>
	</div>
</section>
<div class="popup-wrapper">
    <div class="popup-overlay" onclick="close_popup()"></div>
    <div class="popup-container">
        <div class="popup-content shadow-medium">
            <div class="popup-bar clear-after">
                <span class="popup-alert float-left"><i class="la la-warning"></i> Attention please</span>
                <i class="la la-close float-right"></i>
            </div>

            <p class="popup-msg">Are you sure you want to delete this 'post'?</p>
            <p class="popup-msg">Your selection contains '34' items.</p>
            <div class="popup-buttons">
                <button onclick="close_popup()" class="popup-close"><i class="la la-close"></i> Close</button>
                <button onclick="delete_item()" class="popup-delete"><i class="la la-trash"></i> Delete</button>
            </div>
        </div>
    </div>
</div>