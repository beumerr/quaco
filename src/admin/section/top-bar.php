<section id="top-bar">
    <div id="search">
        <div id="search-bar">
            <form class="default-layout white-fields">
                <div class="form-row-full-width border-light shadow-medium no-margin">
                    <label for="field-search">
                        <i class="la la-user"></i>
                    </label>
                    <div class="label-overflow"></div>
                    <input id="field-search" type="text" name="search" placeholder="Search.." autocomplete="off" />
                </div>
            </form>
        </div>
        <div id="search-settings">
            <i class="la la-cog"></i>
        </div>
    </div>
    <div id="personal">
        <ul>
            <li class="container-hover">
                <i class="la la-phone"></i>
                <div class="hidden-container hidden-right">
                    <ul class="tr-up contact-list medium-list shadow-medium border-light">
                        <li><i class="la la-mobile-phone"></i> 06 37 54 98 18</li>
                        <li><i class="la la-envelope-o"></i> info@quaco.io</li>
                    </ul>
                </div>
            </li>
            <li class="container-hover">
                <i class="la la-bell"></i>
                <span class="note">3</span>
                <div class="hidden-container hidden-right">
                    <ul class="tr-up hover-list medium-list shadow-medium border-light">
                        <li class="counter red">Low on stock <i>3</i></li>
                        <li class="counter green">Updates <i>0</i></li>
                    </ul>
                </div>
            </li>
            <li class="container-hover fill-icon">
                <i class="la la-user shadow-medium"></i>
                <div class="hidden-container hidden-right">
                    <ul class="tr-up hover-list shadow-medium border-light">
                        <li class="icon icon-user">Profile</li>
                        <?php $str =  '{&#34id&#34:3, &#34slug&#34:&#34;test&#34;}'; ?>
                        <li class="icon icon-logout" onclick="load_xml('SIGN_OUT','<?php echo $str; ?>')">Log out</li>
                    </ul>
                </div>

            </li>
        </ul>
    </div>
</section>