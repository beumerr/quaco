<section id="speed-optimiser">

	<div class="section-header">
		<h2 class="section-title">Content optimiser</h2>
		<span class="section-secondary">Write content according the latest SEO guidelines</span>
	</div>

	<div class="flex-row">
		<div class="flex-box flex-row">
            <div class="tab-links-container">
                <div class="tab-links shadow-light">
                    <div id="tab-content-link-1"
                         onclick="change_tab('content',1)"
                         class="active tab-link la-inner">
                        <div><i class="la la-tachometer"></i></div>
                        <span class="link-title">Global rules</span>
                        <span class="link-secondary">Conditional SEO logics</span>
                    </div>
                    <div id="tab-content-link-2"
                         onclick="change_tab('content',2)"
                         class="tab-link la-inner">
                        <div><i class="la la-tag"></i></div>
                        <span class="link-title">Keywords</span>
                        <span class="link-secondary">Keywords used in content</span>
                    </div>
                    <div id="tab-content-link-3"
                         onclick="change_tab('content',3)"
                         class="tab-link la-inner">
                        <div><i class="la la-file-archive-o"></i></div>
                        <span class="link-title">Page support</span>
                        <span class="link-secondary">Post type: 'page'</span>
                    </div>
                    <div id="tab-content-link-4"
                         onclick="change_tab('content',4)"
                         class="tab-link la-inner">
                        <div><i class="la la-file-archive-o"></i></div>
                        <span class="link-title">News support</span>
                        <span class="link-secondary">Post type: 'news'</span>
                    </div>

                </div>
            </div>

            <div id="tab-content-section-1" class="active tab-section">
                <div class="table-row shadow-light">
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
                            <div id="save-speed-1" class="inactive shadow-light submit-button small-button extend-button blue-bg icon-after border-light ">Save</div>
                            <div id="save-speed-2" class="margin-left-small shadow-light submit-button small-button extend-button blue-bg icon-after border-light float-right">Add</div>
                        </div>
                    </div>
                    <table id="dashboard" data-show_parent="false" onchange="remove_inactive('save-speed',1)">
                        <thead>
                        <tr>
                            <th colspan="2" class="align-left">Recommendation</th>
                            <th class="align-center small-col">Prio</th>
                            <th class="align-center small-col">Settings</th>
                            <th class="align-right small-col">Enable</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="even_row">
                            <td colspan="2" class="td-title"><div>Title length</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Title keyword interference</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
                            <td class="td-fix">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" checked="checked"/>
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
                            <td colspan="2" class="td-title"><div>Title slug interference</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Title  meta description interference</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Title content interference</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
                            <td class="td-fix">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" checked="checked"/>
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
                            <td colspan="2" class="td-title"><div>Slug length</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Slug keyword interference</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
                            <td class="td-fix">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" checked="checked"/>
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
                            <td colspan="2" class="td-title"><div>Slug meta description interference</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Title slug interference</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Slug content interference</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Long-tail keywords commits</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
                            <td class="td-fix">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" checked="checked"/>
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
                            <td colspan="2" class="td-title"><div>Disable H1 in content block</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Force ALT tags</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>First 150 words control</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
                            <td class="td-fix ">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" checked="checked"/>
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
                            <td colspan="2" class="td-title"><div>Dwell time improvement</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Minimum amount of words</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Headings without paragraph</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
                            <td class="td-fix">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" checked="checked"/>
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
                            <td colspan="2" class="td-title"><div>Give psychology advise</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
                            <td class="td-fix ">
                                <label class="checker float-right">
                                    <input class="checkbox" type="checkbox" checked="checked"/>
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
                            <td colspan="2" class="td-title"><div>Force compressed images</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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
                            <td colspan="2" class="td-title"><div>Outbound links</div></td>
                            <td class="td-type align-center"><div class="small-block">high</div></td>
                            <td class="td-prio align-center"><div class="small-settings shadow-button"><i class="la la-edit"></i></div></td>
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

                        </tbody>
                    </table>
                </div>
                <div class="add-row">Add new</div>
            </div>
            <div id="tab-content-section-2" class="tab-section">
                <div class="table-row shadow-light">
                    <div class="tab-header clear-after">
                        <div class="float-left">
                            <div class="last-update">
                                <div class="no-margin no-padding">
                                    <span class="label">Total</span>
                                    <span class="date green-label">45</span>
                                </div>
                                <div>
                                    <span class="label">Last update</span>
                                    <span class="date">12 Jan, '19 - 10:45</span>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <div class="submit-button small-button action-button icon-after border-light inactive">
                                Action
                            </div>
                            <div class="submit-button green-bg shadow-light small-button select-button icon-after border-light "
                                 onclick="select_all_posts()">
                                Select all
                            </div>
                            <div id="sel-3" class="submit-button small-button extend-button blue-bg icon-after border-light shadow-light">Add</div>
                        </div>
                    </div>
                    <table id="theme-analyser" data-show_parent="false">
                        <thead>
                        <tr>
                            <th colspan="2" class="align-left">Option</th>
                            <th class="align-center small-col">Prio</th>
                            <th class="align-center small-col">enable</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="odd_row">
                                <td class="td-checkbox">
                                    <label class="checkbox-container">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="td-title left-no-padding">
                                    <div>High-end CMS
                                        <ul class="hidden-tools">
                                            <li onclick="delete_item(308)">Delete</li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="td-block">
                                    <div class="small-block">high</div>
                                </td>
                                <td class="td-fix">
                                    <label class="checker float-right">
                                        <input class="checkbox" type="checkbox" checked="checked" />
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
                                <td class="td-checkbox">
                                    <label class="checkbox-container">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="td-title left-no-padding">
                                    <div>Content management system
                                        <ul class="hidden-tools">
                                            <li onclick="delete_item(308)">Delete</li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="td-block">
                                    <div class="small-block">high</div>
                                </td>
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
                                <td class="td-checkbox">
                                    <label class="checkbox-container">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="td-title left-no-padding">
                                    <div>Cool keyword here
                                        <ul class="hidden-tools">
                                            <li onclick="delete_item(308)">Delete</li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="td-block">
                                    <div class="small-block">high</div>
                                </td>
                                <td class="td-fix">
                                    <label class="checker float-right">
                                        <input class="checkbox" type="checkbox" checked="checked"/>
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
                                <td class="td-checkbox">
                                    <label class="checkbox-container">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="td-title left-no-padding">
                                    <div>Inspiring keyword
                                        <ul class="hidden-tools">
                                            <li onclick="delete_item(308)">Delete</li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="td-block">
                                    <div class="small-block">high</div>
                                </td>
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
                <div class="add-row">Add new</div>
            </div>
            <div id="tab-content-section-3" class="tab-section">
                <div class="table-row shadow-light">
                    <div class="tab-header clear-after">
                    <div class="float-left">
                        <div class="last-update">
                            <div class="no-margin no-padding">
                                <span class="label">Rules</span>
                                <span class="date">5</span>
                            </div>
                            <div>
                                <span class="label">Last update</span>
                                <span class="date">12 Jan, '19 - 10:45</span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="submit-button green-bg shadow-light small-button select-button icon-after border-light "
                             onclick="select_all_posts()">
                            save
                        </div>
                        <div id="sel-3" class="submit-button small-button extend-button blue-bg icon-after border-light shadow-light">Add</div>
                    </div>
                </div>
                    <table id="theme-analyser" data-show_parent="false">
                    <thead>
                    <tr>
                        <th colspan="2" class="align-left">Option</th>
                        <th class="align-center small-col">Enable</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="odd_row">
                        <td class="td-checkbox right-no-padding">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="td-title left-no-padding">
                            <div>Title length
                                <ul class="hidden-tools">
                                    <li onclick="delete_item(308)">Delete</li>
                                </ul>
                            </div>
                        </td>

                        <td class="td-fix">
                            <label class="checker float-right">
                                <input class="checkbox" type="checkbox" checked="checked" />
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
                        <td class="td-checkbox right-no-padding">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="td-title left-no-padding">
                            <div>Title keyword interference
                                <ul class="hidden-tools">
                                    <li onclick="delete_item(308)">Delete</li>
                                </ul>
                            </div>
                        </td>

                        <td class="td-fix">
                            <label class="checker float-right">
                                <input class="checkbox" type="checkbox" checked="checked" />
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
                        <td class="td-checkbox right-no-padding">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="td-title left-no-padding">
                            <div>Slug length
                                <ul class="hidden-tools">
                                    <li onclick="delete_item(308)">Delete</li>
                                </ul>
                            </div>
                        </td>

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
                        <td class="td-checkbox right-no-padding">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="td-title left-no-padding">
                            <div>Title slug interference
                                <ul class="hidden-tools">
                                    <li onclick="delete_item(308)">Delete</li>
                                </ul>
                            </div>
                        </td>

                        <td class="td-fix">
                            <label class="checker float-right">
                                <input class="checkbox" type="checkbox" checked="checked"/>
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
                        <td class="td-checkbox right-no-padding">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="td-title left-no-padding">
                            <div>Force ALT tags
                                <ul class="hidden-tools">
                                    <li onclick="delete_item(308)">Delete</li>
                                </ul>
                            </div>
                        </td>

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
                <div class="add-row">Add new</div>
            </div>
            <div id="tab-content-section-4" class="tab-section">
                <div class="table-row shadow-light">
                    <div class="tab-header clear-after">
                    <div class="float-left">
                        <div class="last-update">
                            <div class="no-margin no-padding">
                                <span class="label">Rules</span>
                                <span class="date">5</span>
                            </div>
                            <div>
                                <span class="label">Last update</span>
                                <span class="date">12 Jan, '19 - 10:45</span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right">

                        <div class="submit-button green-bg shadow-light small-button select-button icon-after border-light "
                             onclick="select_all_posts()">
                            save
                        </div>
                        <div id="sel-3" class="submit-button small-button extend-button blue-bg icon-after border-light shadow-light">Add</div>
                    </div>
                </div>
                    <table id="theme-analyser" data-show_parent="false">
                        <thead>
                    <tr>
                        <th colspan="2" class="align-left">Option</th>
                        <th class="align-center small-col">Enable</th>
                    </tr>
                    </thead>
                        <tbody>
                    <tr class="odd_row">
                        <td class="td-checkbox right-no-padding">
                            <label class="checkbox-container">
                                <input type="checkbox" >
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="td-title left-no-padding">
                            <div>Title length
                                <ul class="hidden-tools">
                                    <li onclick="delete_item(308)">Delete</li>
                                </ul>
                            </div>
                        </td>

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
                        <td class="td-checkbox right-no-padding">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="td-title left-no-padding">
                            <div>Title keyword interference
                                <ul class="hidden-tools">
                                    <li onclick="delete_item(308)">Delete</li>
                                </ul>
                            </div>
                        </td>

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
                        <td class="td-checkbox right-no-padding">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="td-title left-no-padding">
                            <div>Slug length
                                <ul class="hidden-tools">
                                    <li onclick="delete_item(308)">Delete</li>
                                </ul>
                            </div>
                        </td>

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
                        <td class="td-checkbox right-no-padding">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="td-title left-no-padding">
                            <div>Title slug interference
                                <ul class="hidden-tools">
                                    <li onclick="delete_item(308)">Delete</li>
                                </ul>
                            </div>
                        </td>

                        <td class="td-fix">
                            <label class="checker float-right">
                                <input class="checkbox" type="checkbox" checked="checked"/>
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
                        <td class="td-checkbox right-no-padding">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="td-title left-no-padding">
                            <div>Force ALT tags
                                <ul class="hidden-tools">
                                    <li onclick="delete_item(308)">Delete</li>
                                </ul>
                            </div>
                        </td>
                        <td class="td-fix">
                            <label class="checker float-right">
                                <input class="checkbox" type="checkbox" checked="checked"/>
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
                <div class="add-row">Add new</div>
            </div>
        </div>
	</div>

</section>