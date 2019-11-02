<section id="speed-optimiser">

	<div class="section-header">
		<h2 class="section-title">Speed optimiser</h2>
		<span class="section-secondary">Optimise loading times for your theme</span>
	</div>

	<div class="flex-row">
		<div class="flex-box flex-row">
            <div class="tab-links-container">
                <div class="tab-links shadow-light">
                    <div id="tab-speed-link-1"
                         onclick="change_tab('speed',1)"
                         class="active tab-link la-after icon-dashboard">
                        <span class="link-title">Dashboard</span>
                        <span class="link-secondary">Global statistics</span>
                    </div>
                    <div id="tab-speed-link-2"
                         onclick="change_tab('speed',2)"
                         class="tab-link la-after icon-theme">
                        <span class="link-title">Theme analyser</span>
                        <span class="link-secondary">Scan your theme</span>
                    </div>

                </div>
            </div>

            <div id="tab-speed-section-1" class="active tab-section table-row shadow-light">
                <div class="tab-header clear-after">
                    <div class="float-left">
                        <div id="app clear-after">
                            <label class="checker float-left" onchange="remove_inactive('save-speed',1); change_label('enable_speed_module');">
                                <input class="checkbox" type="checkbox"/>
                                <div class="check-bg"></div>
                                <div class="smooth-checkmark">
                                    <svg viewBox="0 0 100 100">
                                        <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                            </label>
                            <div id="enable_speed_module" class="switch_labels float-left">
                                <span class="hidden-top green-label no-select">Enabled</span>
                                <span class="red-label no-select">Disabled</span>
                            </div>
                        </div>

                    </div>
                    <div class="float-right clear-after">
                        <div class="last-update float-left">
                            <div>
                                <span class="label">last update</span>
                                <span class="date">12 Jan, '19 - 10:45</span>
                            </div>
                            <div>
                                <span class="label">Trigger</span>
                                <span class="date">Post update</span>
                            </div>

                        </div>
                        <div id="save-speed-1" class="inactive shadow-light submit-button small-button extend-button blue-bg icon-after border-light float-right">Save</div>
                    </div>
                </div>
                <table id="dashboard" data-show_parent="false" onchange="remove_inactive('save-speed',1)">
                    <thead>
                    <tr>
                        <th colspan="2" class="align-left">Recommendation</th>
                        <th class="align-left">Type</th>
                        <th class="align-left">Prio</th>
                        <th class="align-right">Fix</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="even_row">
                            <td colspan="2" class="td-title"><div>Enable gzip compression</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix ">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                        <tr class="odd_row">
                            <td colspan="2" class="td-title"><div>Specify cache headers</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix">
                                <div class="view-container">
                                    <i class="la la-question-circle"></i>
                                    <div class="hidden-child-list shadow-medium">
                                        <ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim.</li></ul>
                                    </div>
                                </div>
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                        <tr class="even_row">
                            <td colspan="2" class="td-title"><div>Specify exipre headers</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix">
                                <div class="view-container">
                                    <i class="la la-question-circle"></i>
                                    <div class="hidden-child-list shadow-medium">
                                        <ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim.</li></ul>
                                    </div>
                                </div>
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                        <tr class="odd_row">
                            <td colspan="2" class="td-title"><div>Minify HTML</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix ">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                        <tr class="even_row">
                            <td colspan="2" class="td-title"><div>Minify JS</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                        <tr class="odd_row">
                            <td colspan="2" class="td-title"><div>Combine JS</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>

                        <tr class="even_row">
                            <td colspan="2" class="td-title"><div>Minify CSS</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix">

                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                        <tr class="odd_row">
                            <td colspan="2" class="td-title"><div>Critical inline CSS</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix ">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                        <tr class="even_row">
                            <td colspan="2" class="td-title"><div>Combine CSS</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                        <tr class="odd_row">
                            <td colspan="2" class="td-title"><div>Image compression</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix ">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                        <tr class="even_row">
                            <td colspan="2" class="td-title"><div>Lazy load images</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                        <tr class="odd_row">
                            <td colspan="2" class="td-title"><div>Content delivery network</div></td>
                            <td class="td-type"><div class="small-block">server</div></td>
                            <td class="td-prio"><div class="small-block">high</div></td>
                            <td class="td-fix">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" />
                                    <div class="check-bg"></div>
                                    <div class="smooth-checkmark">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M20,55 L40,75 L77,27" fill="none" stroke="#FFF" stroke-width="15" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="tab-speed-section-2" class="tab-section table-row shadow-light">
                <div class="tab-header clear-after">
                    <div class="float-left">
                        <div id="sel-1" onchange="remove_inactive('sel',2)" class="select-container icon-select la-after">
                            <select  class="normal-select">
                                <option value="1" selected="true" disabled="disabled">Scan option</option>
                                <option value="1">Post templates</option>
                                <option value="1">Post pages</option>
                                <option value="1">Post type</option>
                            </select>
                        </div>
                        <div id="sel-2" class="select-container icon-select la-after inactive">
                            <div class="normal-select custom-select">
                                <span id="label">Limit</span>
                                <div class="hidden-select-container">
                                    <div class="hidden-select tr-up shadow-medium" onchange="remove_inactive('sel', 3)">
                                        <div id="quick-search-posts">
                                            <label for="quick-search-input"><i class="la la-search"></i></label>
                                            <input id="quick-search-input" type="text"
                                                   oninput="quick_search('#view-all', this.value)"
                                                   placeholder="Quick search..">
                                            <div id="disable-quick-stats"> <i class="la la-close" onclick="show_default()"></i> </div>
                                        </div>
                                        <div class="select-options">
                                            <ul>
                                                <li class="select-all">
                                                    <label class="checkbox-container">
                                                        <input type="checkbox">
                                                        <span class="checkmark-normal"></span>
                                                        <span class="option">ALL</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-container">
                                                        <input type="checkbox">
                                                        <span class="checkmark-normal"></span>
                                                        <span class="option">Pages</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-container">
                                                        <input type="checkbox">
                                                        <span class="checkmark-normal"></span>
                                                        <span class="option">News</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-container">
                                                        <input type="checkbox">
                                                        <span class="checkmark-normal"></span>
                                                        <span class="option">Projects</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sel-3" class="submit-button small-button extend-button blue-bg icon-after border-light inactive">Analyse</div>
                    </div>
                    <div class="float-right">
                        <div class="align-right">
                            <span class="label">last measure</span>
                            <span class="date">12 Jan, 2019</span>
                        </div>
                    </div>

                </div>
                <table id="theme-analyser" data-show_parent="false">
                    <thead>
                    <tr>
                        <th colspan="2" class="align-left">Option</th>
                        <th class="align-center">Grade</th>
                        <th class="align-center">HDRS</th>
                        <th class="align-center">SRC</th>
                        <th class="align-center">HTML</th>
                        <th class="align-center">CSS</th>
                        <th class="align-center">JS</th>
                        <th class="align-right">IMG</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="even_row">
                        <td colspan="2" class="td-title"><div>News post type</div></td>
                        <td class="td-grade"><div class="status-circle orange-bg">5.6</div></td>
                        <td class="td-grade-secondary"><div class="status-circle red-bg">3.9</div></td>
                        <td class="td-grade-secondary"><div class="status-circle red-bg">4.1</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">7.3</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">8.1</div></td>
                        <td class="td-grade-secondary"><div class="status-circle red-bg">4.2</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">9.6</div></td>
                    </tr>
                    <tr class="odd_row">
                        <td colspan="2" class="td-title"><div>Page post type</div></td>
                        <td class="td-grade"><div class="status-circle green-bg">9.1</div></td>
                        <td class="td-grade-secondary"><div class="status-circle orange-bg">5.5</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">9.5</div></td>
                        <td class="td-grade-secondary"><div class="status-circle orange-bg">6.4</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">8.1</div></td>
                        <td class="td-grade-secondary"><div class="status-circle red-bg">4.2</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">9.6</div></td>
                    </tr>
                    <tr class="even_row">
                        <td colspan="2" class="td-title"><div>Project post type</div></td>
                        <td class="td-grade"><div class="status-circle red-bg">4</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">7.5</div></td>
                        <td class="td-grade-secondary"><div class="status-circle orange-bg">6.1</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">7.3</div></td>
                        <td class="td-grade-secondary"><div class="status-circle orange-bg">6</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">7</div></td>
                        <td class="td-grade-secondary"><div class="status-circle red-bg">4.2</div></td>
                    </tr>
                    <tr class="odd_row">
                        <td colspan="2" class="td-title"><div>Blog post type</div></td>
                        <td class="td-grade"><div class="status-circle green-bg">7.8</div></td>
                        <td class="td-grade-secondary"><div class="status-circle orange-bg">5.5</div></td>
                        <td class="td-grade-secondary"><div class="status-circle red-bg">4.1</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">7.3</div></td>
                        <td class="td-grade-secondary"><div class="status-circle red-bg">4.2</div></td>
                        <td class="td-grade-secondary"><div class="status-circle green-bg">7.5</div></td>
                        <td class="td-grade-secondary"><div class="status-circle orange-bg">6.1</div></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
	</div>

</section>