<?php include AWP_FREE_INCLUDES.'/header.php'; ?>
<div class="app-directory">
        <div class="tabs-panel">
            <div class="pages-background"></div>
            <div class="tabs-panel__container">
                <h2 class="main-title"><?php esc_html_e( 'App Directory ', 'automate_hub' ); ?><span class="counter">(<span id="visibleCounter">0</span>)</span></h2>
                <div class="tabs-panel__inner">
                    <div class="tabs-panel__left">
                        <div class="tabs-panel__left-tab semitabactive" id="tab-all" data-type="all">
                            <span class="tabs-panel__left-icon">
                                <svg width="18" height="19" viewBox="0 0 18.126 19">
                                    <g id="Group_9182" data-name="Group 9182" transform="translate(2887 1544)">
                                        <g id="Group_9181" data-name="Group 9181" transform="translate(-2887 -1544)">
                                            <g id="Rectangle_4640" data-name="Rectangle 4640">
                                                <rect id="Rectangle_4647" data-name="Rectangle 4647" width="15" height="16" rx="3" transform="translate(0 3)" fill="none" />
                                                <path id="Round_6916" data-name="Round 6916" d="M12,19H3a3,3,0,0,1-3-3V6A3,3,0,0,1,3,3h9a3,3,0,0,1,3,3V16A3,3,0,0,1,12,19ZM3,4.5A1.5,1.5,0,0,0,1.5,6V16A1.5,1.5,0,0,0,3,17.5h9A1.5,1.5,0,0,0,13.5,16V6A1.5,1.5,0,0,0,12,4.5Z" fill="#616a6e" />
                                            </g>
                                            <path id="copy" d="M18.126,14.176V2.969A2.973,2.973,0,0,0,15.157,0H6.919a.742.742,0,1,0,0,1.484h8.238a1.486,1.486,0,0,1,1.484,1.484V14.176a.742.742,0,0,0,1.484,0Z" fill="#616a6e" />
                                            <path id="Round_6917" data-name="Round 6917" d="M10.646,8.989H4.378a.75.75,0,0,1,0-1.5h6.268a.75.75,0,0,1,0,1.5Z"  fill="#616a6e" />
                                            <path id="Round_6918" data-name="Round 6918" d="M10.646,11.714H4.378a.75.75,0,0,1,0-1.5h6.268a.75.75,0,0,1,0,1.5Z" fill="#616a6e" />
                                            <path id="Round_6919" data-name="Round 6919" d="M10.646,14.439H4.378a.75.75,0,0,1,0-1.5h6.268a.75.75,0,0,1,0,1.5Z" fill="#616a6e" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span class="tabs-panel__left-text"><?php esc_html_e( 'All', 'automate_hub' ); ?></span>
                        </div>
                        <div class="tabs-panel__left-tab" id="tab-forms" data-type="forms">
                            <span class="tabs-panel__left-icon">
                                <svg width="17" height="17" viewBox="0 0 16.712 16.711">
                                    <g id="Group_9171" data-name="Group 9171" transform="translate(-800.484 -147)">
                                        <path id="reminders" d="M5.875,4.341a.653.653,0,0,1,.653-.653H12.8a.653.653,0,0,1,0,1.306H6.528A.653.653,0,0,1,5.875,4.341ZM8.094,11.75H6.528a.653.653,0,1,0,0,1.306H8.094a.653.653,0,0,0,0-1.306ZM6.528,8.91H10.02a.653.653,0,0,0,0-1.306H6.528a.653.653,0,1,0,0,1.306ZM3.917,7.6a.653.653,0,1,0,.653.653A.653.653,0,0,0,3.917,7.6Zm0-3.917a.65.65,0,1,1,0,.005Zm0,8.062a.65.65,0,1,1,0,.005ZM14.1,0H2.611A2.614,2.614,0,0,0,0,2.611V14.1a2.614,2.614,0,0,0,2.611,2.611H7.572a.653.653,0,0,0,0-1.306H2.611A1.307,1.307,0,0,1,1.306,14.1V2.611A1.307,1.307,0,0,1,2.611,1.306H14.1a1.307,1.307,0,0,1,1.306,1.306V8.486a.653.653,0,1,0,1.306,0V2.611A2.614,2.614,0,0,0,14.1,0Z" transform="translate(800.484 147)" fill="#616a6e" />
                                        <path id="reminders-2" data-name="reminders" d="M3.344,0H.686a.653.653,0,1,0,0,1.306H3.344A1.307,1.307,0,0,1,4.65,2.611V5.955c.034.866,1.153,1.009,1.306,0V2.611A2.614,2.614,0,0,0,3.344,0Z" transform="translate(817.195 157.755) rotate(90)" fill="#616a6e" />
                                    </g>
                                </svg>
                            </span>
                            <span class="tabs-panel__left-text "><?php esc_html_e( 'Forms', 'automate_hub' ); ?></span>
                            <div class="tabs-panel__left-popup triangle"> 
                                <span class='head'><strong><?php esc_html_e( 'List of Incoming Data Sources', 'automate_hub' ); ?></strong></span><br/><br/><p>
                                
                                <?php esc_html_e( 'To create an integration you must specify a data source. Your input data can be received through the Receiver Webhook, or when using the Wordpress Plugin, from any of the supported Form sources actively installed in your Wordpress site.', 'automate_hub' ); ?>
                                </p>
                            </div>
                        </div>
                        <div class="tabs-panel__left-tab" id="tab-apps" data-type="apps">
                            <span class="tabs-panel__left-icon">
                                <svg width="17" height="17" viewBox="0 0 16.71 16.71">
                                    <path id="voice-message-app" d="M15.4,10.963V2.61A1.307,1.307,0,0,0,14.1,1.3H2.61A1.307,1.307,0,0,0,1.3,2.61V14.1A1.307,1.307,0,0,0,2.61,15.4H14.1a1.307,1.307,0,0,0,1.3-1.3.653.653,0,1,1,1.305,0,2.613,2.613,0,0,1-2.61,2.61H2.61A2.613,2.613,0,0,1,0,14.1V2.61A2.613,2.613,0,0,1,2.61,0H14.1a2.613,2.613,0,0,1,2.61,2.61v8.353a.655.655,0,1,1-1.31,0Zm-3.181.294a1.941,1.941,0,0,0,1.942-1.941V6.983a.653.653,0,0,0-1.305,0V9.315a.639.639,0,0,1-.636.636h0a.637.637,0,0,1-.636-.636V4.568A1.925,1.925,0,0,0,9.658,2.643h0A1.928,1.928,0,0,0,7.733,4.568v7.57a.62.62,0,0,1-.62.62h0a.621.621,0,0,1-.62-.62V7A1.941,1.941,0,1,0,2.61,7v3.525a.653.653,0,0,0,1.305,0V7A.636.636,0,1,1,5.188,7v5.139a1.927,1.927,0,0,0,1.925,1.925h0a1.925,1.925,0,0,0,1.925-1.925V4.568a.621.621,0,0,1,.619-.62h0a.62.62,0,0,1,.62.62V9.316a1.944,1.944,0,0,0,1.942,1.941Z" fill="#616a6e" />
                                </svg>
                            </span>
                            <span class="tabs-panel__left-text"><?php esc_html_e( 'Apps', 'automate_hub' ); ?></span>
                            <div class="tabs-panel__left-popup triangle"> 
                                <span class='head'><strong><?php esc_html_e( 'List of Outgoing Destinaton Apps ', 'automate_hub' ); ?></strong></span><br/><br/><p>
                                <?php esc_html_e( "You can send the received form data to any of the dozens of external applications listed below. You'll need to have valid account credentials with an active acccount for the platform provider in order to connect and send to it.", 'automate_hub' ); ?>
                                </p>
                            </div>
                        </div>
                        <div class="tabs-panel__left-tab" id="tab-enterprise" data-type="enterprises">
                            <span class="tabs-panel__left-icon">
                                <svg width="17" height="17" viewBox="0 0 16.366 16.366">
                                    <g id="Group_9170" data-name="Group 9170" transform="translate(0 0)">
                                        <g id="Group_9169" data-name="Group 9169">
                                            <path id="Round_6908" data-name="Round 6908" d="M279,279.474a1.139,1.139,0,0,0,1.137,1.137h1.336a1.139,1.139,0,0,0,1.137-1.137v-1.336A1.139,1.139,0,0,0,281.474,277h-1.336A1.139,1.139,0,0,0,279,278.137Zm1.137-1.336h1.336v1.336h-1.337Z" transform="translate(-269.954 -268.418)" fill="#616a6e" />
                                            <circle id="Ellipse_619" data-name="Ellipse 619" cx="0.71" cy="0.71" r="0.71" transform="translate(11.379 6.387)" fill="#616a6e" />
                                            <circle id="Ellipse_620" data-name="Ellipse 620" cx="0.71" cy="0.71" r="0.71" transform="translate(9.046 6.387)" fill="#616a6e" />
                                            <path id="Round_6909" data-name="Round 6909" d="M15.727,11.252a.639.639,0,0,0,.639-.639V3.836a2.56,2.56,0,0,0-2.557-2.557h-.831V.639a.64.64,0,0,0-1.279,0v.639H8.791V.639a.64.64,0,0,0-1.279,0v.639H4.635V.639a.639.639,0,1,0-1.279,0v.639h-.8A2.56,2.56,0,0,0,0,3.836v9.973a2.56,2.56,0,0,0,2.557,2.557H13.809a2.56,2.56,0,0,0,2.557-2.557.64.64,0,0,0-1.279,0,1.28,1.28,0,0,1-1.279,1.279H2.557a1.28,1.28,0,0,1-1.279-1.279V3.836A1.28,1.28,0,0,1,2.557,2.557h.8V3.2a.639.639,0,0,0,1.279,0V2.557H7.512V3.2a.64.64,0,1,0,1.279,0V2.557H11.7V3.2a.64.64,0,1,0,1.279,0V2.557h.831a1.28,1.28,0,0,1,1.279,1.279v6.777a.639.639,0,0,0,.638.639Z" fill="#616a6e" />
                                            <circle id="Ellipse_621" data-name="Ellipse 621" cx="0.71" cy="0.71" r="0.71" transform="translate(3.567 10.648)" fill="#616a6e" />
                                            <circle id="Ellipse_626" data-name="Ellipse 626" cx="0.71" cy="0.71" r="0.71" transform="translate(6.408 10.648)" fill="#616a6e" />
                                            <circle id="Ellipse_622" data-name="Ellipse 622" cx="0.71" cy="0.71" r="0.71" transform="translate(3.567 6.387)" fill="#616a6e" />
                                            <circle id="Ellipse_624" data-name="Ellipse 624" cx="0.71" cy="0.71" r="0.71" transform="translate(6.408 6.387)" fill="#616a6e" />
                                            <circle id="Ellipse_623" data-name="Ellipse 623" cx="0.71" cy="0.71" r="0.71" transform="translate(3.567 8.517)" fill="#616a6e" />
                                            <circle id="Ellipse_625" data-name="Ellipse 625" cx="0.71" cy="0.71" r="0.71" transform="translate(6.408 8.517)" fill="#616a6e" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span class="tabs-panel__left-text"><?php esc_html_e( 'Enterprise', 'automate_hub' ); ?></span>
                            <div class="tabs-panel__left-popup triangle"> 
                                <span class='head'><strong><?php esc_html_e( 'Enterprise Apps', 'automate_hub' ); ?></strong></span><br/><br/><p>
                                </p>
                                <?php esc_html_e( 'Enterprise Apps require custom integration or access to 3rd-party software and support. Contact us for implementation details.', 'automate_hub' ); ?>
                            </div>
                        </div>
                        <div class="tabs-panel__left-tab" id="tab-disabled" data-type="disableds">
                            <span class="tabs-panel__left-icon">
                                <svg width="17" height="17" viewBox="0 0 16.71 16.71">
                                    <path id="voice-message-app" d="M15.4,10.963V2.61A1.307,1.307,0,0,0,14.1,1.3H2.61A1.307,1.307,0,0,0,1.3,2.61V14.1A1.307,1.307,0,0,0,2.61,15.4H14.1a1.307,1.307,0,0,0,1.3-1.3.653.653,0,1,1,1.305,0,2.613,2.613,0,0,1-2.61,2.61H2.61A2.613,2.613,0,0,1,0,14.1V2.61A2.613,2.613,0,0,1,2.61,0H14.1a2.613,2.613,0,0,1,2.61,2.61v8.353a.655.655,0,1,1-1.31,0Zm-3.181.294a1.941,1.941,0,0,0,1.942-1.941V6.983a.653.653,0,0,0-1.305,0V9.315a.639.639,0,0,1-.636.636h0a.637.637,0,0,1-.636-.636V4.568A1.925,1.925,0,0,0,9.658,2.643h0A1.928,1.928,0,0,0,7.733,4.568v7.57a.62.62,0,0,1-.62.62h0a.621.621,0,0,1-.62-.62V7A1.941,1.941,0,1,0,2.61,7v3.525a.653.653,0,0,0,1.305,0V7A.636.636,0,1,1,5.188,7v5.139a1.927,1.927,0,0,0,1.925,1.925h0a1.925,1.925,0,0,0,1.925-1.925V4.568a.621.621,0,0,1,.619-.62h0a.62.62,0,0,1,.62.62V9.316a1.944,1.944,0,0,0,1.942,1.941Z" fill="#616a6e" />
                                </svg>
                            </span>
                            <span class="tabs-panel__left-text"><?php esc_html_e( 'Disabled', 'automate_hub' ); ?></span>
                            <div class="tabs-panel__left-popup triangle"> 
                                <span class='head'><strong><?php esc_html_e( 'Disabled Apps ', 'automate_hub' ); ?></strong></span><br/><br/><p>
                                <?php esc_html_e( ' Disabled Apps are temporarily not in service by their respective providers. Please contact them for further status updates.', 'automate_hub' ); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tabs-panel__right">
                        <div class="tabs-panel__right-tabs">
                            <span class="cat secondarytabsactive hide"></span>
                            <span class="cat" data-cat="favourites"><?php esc_html_e( 'Favorites', 'automate_hub' ); ?></span>
                            <span class="cat" data-cat="crm"><?php esc_html_e( 'CRM', 'automate_hub' ); ?></span>
                            <span class="cat" data-cat="esp"><?php esc_html_e( 'ESP', 'automate_hub' ); ?></span>
                            <span class="cat" data-cat="sms"><?php esc_html_e( 'SMS', 'automate_hub' ); ?></span>
                            <span class="cat" data-cat="webinars"><?php esc_html_e( 'Webinars', 'automate_hub' ); ?></span>
                            <span class="cat" data-cat="other"><?php esc_html_e( 'Other', 'automate_hub' ); ?></span>                    
                        </div>
                        <div class="tabs-panel__search-input is-active">
                            <div class="tabs-panel__input-icon">
                                <svg width="23" height="23" viewBox="0 0 19.438 19.766">
                                    <g id="Search" transform="translate(-65.009)">
                                        <g id="Group_2369" data-name="Group 2369" transform="translate(65.009)">
                                            <path id="Round_3164" data-name="Round 3164" d="M12.387,16.756a8.361,8.361,0,1,1,5.929-2.449,8.378,8.378,0,0,1-5.929,2.449Zm0-15.467a7.089,7.089,0,1,0,7.089,7.089,7.089,7.089,0,0,0-7.089-7.089Z" transform="translate(-4.009)" fill="#616a6e" />
                                            <path id="Round_3165" data-name="Round 3165" d="M334.213,339.358a.646.646,0,0,1-.473-.172l-5.113-5.113a.638.638,0,1,1,.9-.9l5.113,5.113a.623.623,0,0,1,0,.9A.5.5,0,0,1,334.213,339.358Z" transform="translate(-315.395 -319.594)" fill="#616a6e" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <input type="text" id="platform-filter" autocomplete="off" placeholder="Search Platform">
                        </div>
                        <div class="tabs-panel__search-button close-btn">
                            <svg version="1.1" id="Capa_1" x="30px" y="30px" viewBox="0 0 512.001 512.001" xml:space="preserve">
                                <g><g><path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717
                    L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859
                    c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287
                    l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285
                    L284.286,256.002z" fill="#616a6e" />
                                </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                            </svg>
                        </div>
                        <div class="tabs-panel__search-button is-hide">
                            <svg width="19.438" height="19.766" viewBox="0 0 19.438 19.766">
                                <g id="Search" transform="translate(-65.009)">
                                    <g id="Group_2369" data-name="Group 2369" transform="translate(65.009)">
                                        <path id="Round_3164" data-name="Round 3164" d="M12.387,16.756a8.361,8.361,0,1,1,5.929-2.449,8.378,8.378,0,0,1-5.929,2.449Zm0-15.467a7.089,7.089,0,1,0,7.089,7.089,7.089,7.089,0,0,0-7.089-7.089Z" transform="translate(-4.009)" fill="#616a6e" />
                                        <path id="Round_3165" data-name="Round 3165" d="M334.213,339.358a.646.646,0,0,1-.473-.172l-5.113-5.113a.638.638,0,1,1,.9-.9l5.113,5.113a.623.623,0,0,1,0,.9A.5.5,0,0,1,334.213,339.358Z" transform="translate(-315.395 -319.594)" fill="#616a6e" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main>
        <section class="main-section">
        <div class="container-app">
        <div class="row-app">     
        <div class="to-center-screen">
        <div class="col-app" data-type="app"  data-category="crm,esp" >
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'sperse'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/sperse.png'); ?>" height="40" alt="Sperse"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Sperse', 'automate_hub' ); ?><span class="free-app-directory"><?php esc_html_e( 'Free', 'automate_hub' ); ?></span></h3>                            
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Sperse is a software suite providing you clarity, connectivity and collaboration, to know your customer, your cash and your data.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/sperse"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'sperse'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'aweber'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/aweber.png'); ?>" height="40"  alt="Aweber"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Aweber', 'automate_hub' ); ?><span class="free-app-directory"><?php esc_html_e( 'Free', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Aweber is an email marketing automation tool with a high delivery rate, GDPR compliant, responsive email templates and analytics.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/aweber" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div> 
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'aweber'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googlesheets'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/googlesheets.png'); ?>" height="40" alt="Google Sheets"></a><br/> <h3 class="title-app"><?php esc_html_e( 'GoogleSheets', 'automate_hub' ); ?><span class="free-app-directory"><?php esc_html_e( 'Free', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Google Sheets is an online program of GSuite to create, edit spreadsheets directly in your web browser and collaborate with others.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/googlesheets"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googlesheets'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'hubspot'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/hubspot.png'); ?>" height="40"  alt="Hubspot"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Hubspot', 'automate_hub' ); ?><span class="free-app-directory"><?php esc_html_e( 'Free', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'HubSpot is an inbound marketing, sales, customer service and CRM software platform to convert traffic to leads and close deals.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/hubspot"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'hubspot'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'mailchimp'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/mailchimp.png'); ?>" height="40" alt="MailChimp"></a><br/> <h3 class="title-app"><?php esc_html_e( 'MailChimp', 'automate_hub' ); ?><span class="free-app-directory"><?php esc_html_e( 'Free', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Mailchimp is an all-in-one integrated small business marketing suite to promote with email, social, landing pages and postcards.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/mailchimp"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'mailchimp'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'activecampaign'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/activecampaign.png'); ?>" height="40"  alt="Active Campaign"></a><br/><h3 class="title-app"><?php esc_html_e( 'Active Campaign', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Active Campaign is a customer experience automation platform for businesses to build meaningful connections with their customers.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31" ><a href="https://sperse.io/go/activecampaign" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31" ><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'activecampaign'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'agilecrm'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/agilecrm.png'); ?>" height="40"  alt="Agile CRM"></a><br/><h3 class="title-app"><?php esc_html_e( 'Agile CRM', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'AgileCRM is an all-in-one software suite for sales enablement, marketing automation, customer service and task management.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/agilecrm" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'agilecrm'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'airtable'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/airtable.png'); ?>" height="40"  alt="airtable"></a><br/><h3 class="title-app"><?php esc_html_e( 'Airtable', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Airtable is a low-code platform to build collaborative apps, customize and automate workflow tasks and integrate with your favorite apps.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31"> <a href="https://sperse.io/go/airtable" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31" ><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'airtable'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'appcues'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/appcues.png'); ?>" height="40"  alt="appcues"></a><br/><h3 class="title-app"><?php esc_html_e( 'Appcues', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Appcues makes it super easy to simplify how users interact with your product. Move fast and deliver results.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31"> <a href="https://sperse.io/go/appcues" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31" ><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'appcues'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'asana'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/asana.png'); ?>" height="40"  alt="Asana"></a><br/><h3 class="title-app"><?php esc_html_e( 'Asana', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Asana is a team collaboration app to manage your work, projects, & tasks online – from small projects to strategic initiative.', 'automate_hub' ); ?></p>
        <div class="visit-app"><a href="https://sperse.io/go/asana" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                          
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'asana'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'autopilot'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/autopilot.png'); ?>" height="34" alt="AutoPilot"></a><br/> <h3 class="title-app"><?php esc_html_e( 'AutoPilot', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Autopilot is a simple and visual marketing automation software to acquire, nurture, grow your customers and automate their journey.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/autopilot" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>    
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'autopilot'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'basecamp'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/basecamp.png'); ?>" height="40" alt="basecamp"></a><br/><h3 class="title-app"><?php esc_html_e( 'Basecamp', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Basecamp cuts through the noise and reveals the insights you need to make profitable decisions that propel the business forward.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31" ><a href="https://sperse.io/go/basecamp" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31"><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'basecamp'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        
  

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'baremetrics'), admin_url( 'admin.php?page=automate_hub' ) )); ?>baremetrics"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/baremetrics.png'); ?>" height="40" alt="baremetrics"></a><br/><h3 class="title-app"><?php esc_html_e( 'Baremetrics', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Baremetrics is a project management and communication tool that gathers teams all in one place allowing them to collaborate remotely.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31" ><a href="https://sperse.io/go/baremetrics" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31" ><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'baremetrics'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'benchmark'), admin_url( 'admin.php?page=automate_hub' ) )); ?>benchmark"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/benchmark.png'); ?>" height="40" alt="Benchmark"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Benchmark', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Benchmark Email is an integrated and automated email marketing platform for businesses to connect with subscribers and customers.', 'automate_hub' ); ?></p>
        <div class="visit-app"><a href="https://sperse.io/go/benchmark" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>    
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'benchmark'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'calcom'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/calcom.png'); ?>" height="40" alt="calcom"></a><br/><h3 class="title-app"><?php esc_html_e( 'Cal.com', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Meet Cal.com, the event-juggling scheduler for everyone.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31" ><a href="https://sperse.io/go/calcom" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31"><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'basecamp'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'calendly'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/calendly.png'); ?>" height="40" alt="Calendly"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Calendly', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Calendly is an online calender to coordinate and schedule meetings and calendar events, send reminders and streamline your workflows.', 'automate_hub' ); ?></p>
        <div class="visit-app"><a href="https://sperse.io/go/calendly" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>    
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'calendly'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'callrail'), admin_url( 'admin.php?page=automate_hub' ) )); ?>callrail"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/callrail.png'); ?>" height="40" alt="Callrail"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Callrail', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Match inbound calls, text, forms, and live chats to your marketing campaigns to finally learn what\'s working and what\'s not.', 'automate_hub' ); ?></p>
        <div class="visit-app"><a href="https://sperse.io/go/callrail" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>    
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'callrail'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>        
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'campaignmonitor'), admin_url( 'admin.php?page=automate_hub' ) )); ?>campaignmonitor"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/campaignmonitor.png'); ?>" height="37"  alt="Campaign Monitor"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Campaign Monitor', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Campaign Monitor is a marketing software to send emails, automate marketing processes and track results with insightful analytics.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/campaignmonitor" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'campaignmonitor'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'capsulecrm'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/capsulecrm.png'); ?>" height="40" alt="Capsule CRM"></a><br/><h3 class="title-app"><?php esc_html_e( 'Capsule CRM', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Capsule works seamlessly with popular applications such as G Suite, Mailchimp, Xero and many more.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/capsulecrm" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                          
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'capsulecrm'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'chargebee'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/chargebee.png'); ?>" height="40" alt="Chargebee"></a><br/><h3 class="title-app"><?php esc_html_e( 'Chargebee', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Chargebee is a recurring billing management tool to allow subscription-based businesses to automate payments, invoicing, and revenue.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/chargebee" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                          
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'chargebee'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'cleverreach'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/cleverreach.png'); ?>" height="40" alt="Cleverreach"></a><br/><h3 class="title-app"><?php esc_html_e( 'Cleverreach', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'CleverReach is an email marketing software to create and send professional email campaigns with clarity using real-time reporting.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/cleverreach" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                          
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'cleverreach'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'clickup'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/clickup.png'); ?>" height="40" alt="Clickup"></a><br/><h3 class="title-app"><?php esc_html_e( 'Clickup', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'An all-in-one suite to manage people, projects, and everything in between. Start for free! Stop switching between multiple tools.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/clickup" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                          
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'clickup'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'clinchpad'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/clinchpad.png'); ?>" height="40" alt="Clinchpad"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Clinchpad', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'ClinchPad is a simple online lead management CRM for small teams, and fills the gap between spreadsheets and complex CRMs.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/clinchpad"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                         
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'clinchpad'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'clockify'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/clockify.png'); ?>" height="40" alt="Clockify"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Clockify', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Time tracking software used by millions. Clockify is a time tracker and timesheet app that lets you track work hours across projects.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/clockify"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                         
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'clockify'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'close'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/close.png'); ?>" height="40" alt="Close"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Close', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Close is the inside sales automation CRM for startups and SMBs, to make calls, send emails, automate workflows and close more deals.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/close"      target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'close'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'companyhub'), admin_url( 'admin.php?page=automate_hub' ) )); ?>companyhub"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/companyhub.png'); ?>" height="40" alt="Companyhub"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Companyhub', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Quickly create a new Lead / Contact, organize and segment leads, products and more, just how you like it..', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/companyhub"      target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'companyhub'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>     
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'contactsplus'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/contactsplus.png'); ?>" height="40" alt="Contacts+"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Contacts+', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>   
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Contacts+ is a smart contact management app for power-networkers, which syncs multiple accounts and devices into a unified address book.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/contactsplus"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'contactsplus'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>         
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'convertkit'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/convertkit.png'); ?>" height="40" alt="Convertkit"></a><br/> <h3 class="title-app"><?php esc_html_e( 'ConvertKit', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>   
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'ConvertKit is an email service provider (ESP) and includes email marketing automation and landing pages for online content creators.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/convertkit"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'convertkit'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'copper'), admin_url( 'admin.php?page=automate_hub' ) )); ?>copper"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/copper.png'); ?>" height="40" alt="Copper"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Copper', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Copper is a sales management and productivity CRM software for SMBs that works with Gmail, Calendar, and Sheets.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/copper"      target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                          
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'copper'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'curated'), admin_url( 'admin.php?page=automate_hub' ) )); ?>">
        <img class="apps-object-fit"  src="<?php echo esc_url(AWP_ASSETS.'/images/logos/curated.png'); ?>" height="40" alt="Curated"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Curated', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Curated is an app to curate engaging content and build a relationship with your subscriber list with email newsletter publications.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/curated"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'curated'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'customer'), admin_url( 'admin.php?page=automate_hub' ) )); ?>">
        <img class="apps-object-fit" src="<?php echo esc_url(AWP_ASSETS.'/images/logos/customer.png'); ?>" height="40" alt="Customer.io Logo"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Customer.io', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Customer.io is an automated messaging platform for marketers who want flexibility to craft and send data-driven emails and SMS messages.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/customer.io"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'customer'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'directiq'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/directiq.png'); ?>" height="40" alt="DirectIQ"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Directiq', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                            
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'DirectIQ is an email marketing app to send segmented email campaigns, template creation, email campaign delivery and reporting.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/directiq"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div> 
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'directiq'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'drift'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/drift.png'); ?>" height="40" alt="drift"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Drift', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                         
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Drift is a revenue acceleration platform to bring marketing and customer engagement together in real-time to increase turnaround.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/drift"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                       
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'drift'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'drip'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/drip.png'); ?>" height="40" alt="Drip"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Drip', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                         
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Drip is a marketing automation and multi-channel engagement app for eCommerce utilizing email, SMS, and 3rd-party integrations.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/drip"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                       
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'drip'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'elasticemail'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/elasticemail.png'); ?>" height="40" alt="Elastic Email"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Elastic Email', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Elastic Email is an all-in-one email marketing and email delivery service platform with SMTP relay, API and email campaign reports.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/elasticemail"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                           
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'elasticemail'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'emailoctopus'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/emailoctopus.png'); ?>" height="40"  alt="Email Octopus"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Email Octopus', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'EmailOctopus is an email marketing app to manage and email your subscribers with an email builder, delivery tracking, and analytics.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/emailoctopus"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'emailoctopus'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'esputnik'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/esputnik.png'); ?>" height="40"  alt="Esputnik"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Esputnik', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'eSputnik is an omnichannel Customer Data Platform for all email, SMS, Viber and push communications through a single system.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/esputnik"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'esputnik'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="webinars">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'eventbrite'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/eventbrite.png'); ?>" height="40"  alt="eventbrite"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Eventbrite', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>  
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Eventbrite is an online event and ticketing management website for businesses to create and promote events and manage ticket sales online.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/eventbrite"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'eventbrite'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="webinars">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'everwebinar'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/everwebinar.png'); ?>" height="40"  alt="EverWebinar"></a><br/> <h3 class="title-app"><?php esc_html_e( 'EverWebinar', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>  
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'EverWebinar streams recorded webinars to unlimited attendees with flexible schedules, live chat simulator, clickable offers and more.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/everwebinar"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'everwebinar'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="others">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'firstpromoter'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/firstpromoter.png'); ?>" height="40"  alt="Firstpromoter"></a><br/><h3 class="title-app"><?php esc_html_e( 'Firstpromoter', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'FirstPromoter is an all-in-one platform that allows SaaS companies to track, manage and optimize any type of referral based marketing programs.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31" ><a href="https://sperse.io/go/firstpromoter" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31" ><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'firstpromoter'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="favorites">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'fivetran'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/fivetran.png'); ?>" height="40" alt="Fivetran"></a><br/><h3 class="title-app"><?php esc_html_e( 'Fivetran', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'The most reliable data pipelines you\'ll never build.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/fivetran" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                          
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'fivetran'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'followupboss'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/followupboss.png'); ?>" height="40"  alt="followupboss"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Followupboss CRM', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Get all your leads in one place and take control of your follow up. Work smarter, deliver a first-class client experience and close more deals.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/followupboss"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'followupboss'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'freshworks'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/freshworks.png'); ?>" height="40"  alt="Freshworks"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Freshworks CRM', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Freshworks CRM is an integrated software suite to enable synergetic workflows between your sales and customer support teams.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/freshworks"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'freshworks'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>



        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'getresponse'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/getresponse.png'); ?>" height="40"  alt="GetResponse"></a><br/> <h3 class="title-app"><?php esc_html_e( 'GetResponse', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'GetResponse is a marketing automation tool to send emails, create landing pages and convesion funnels and engage with customers.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/getresponse"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'getresponse'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'go4client'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/go4client.png'); ?>" height="40"  alt="Go4client"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Go4client', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Go4client make omnichannel and automation simple. Just pick your message and choose the most relevant channel for the very right time.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/go4client"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'go4client'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googlecalendar'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/googlecalendar.png'); ?>" height="40" alt="Google Calendar"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Google Calendar', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Google Calendar is a time-management service designed for teams to quickly create, edit and share events, schedule meetings and get reminders.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/googlecalendar"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googlecalendar'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>        
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googlecontacts'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/googlecontacts.png'); ?>" height="40" alt="Google Contacts"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Google Contacts', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Google Contacts is an online address book integrated with other Google products to store and organize the information of your contacts.', 'automate_hub' ); ?></p>
        <div class="visit-app"><a href="https://sperse.io/go/googlecontacts"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googlecontacts'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>        
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googledrive'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/googledrive.png'); ?>" height="40" alt="Google Drive"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Google Drive', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Google Drive is a cloud-based file storage solution offered by Google for users to create, store and synchronize their files across all devices.', 'automate_hub' ); ?></p>
        <div class="visit-app"><a href="https://sperse.io/go/googledrive"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googledrive'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>        
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googleforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/googleforms.png'); ?>" height="40" alt="Google Forms"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Google Forms', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Google Forms is a Google survey management service that provides users with an easy way to create custom forms, surveys and questionnaires.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/googleforms"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googleforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>        
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googlegmail'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/gmail.png'); ?>" height="40" alt="Google Gmail"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Google Gmail', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Gmail is a freemium email service to send and receive emails via web or mobile devices. It is part of Google Workspace collaboration suite.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/gmail"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'googlegmail'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'gotomeeting'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/gotomeeting.png'); ?>" height="40" alt="Gotomeeting"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Gotomeeting', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Goto help you focus on the things that matter most throughout the day: your projects, your professions, and even your personal passions.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/gotomeeting"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'gotomeeting'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'growmatik'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/growmatik.png'); ?>" height="40" alt="Growmatik"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Gotomeeting', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Know your audience in depth and turn them into customers with smart emails, popups and web pages.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/growmatik"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'growmatik'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="webinars">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'gotowebinar'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/gotowebinar.png'); ?>" height="40"  alt="Gotowebinar"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Gotowebinar', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>  
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Gotowebinar is a virtual conference platform offers flexible webinar modes, interactive features, insightful analytics, powerful integrations, and more.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/gotowebinar"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'gotowebinar'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <!-- <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'go4client'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/go4client.png'); ?>" height="35" alt="Go4client"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Go4client', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Go4client make omnichannel and automation simple. Just pick your message and choose the most relevant channel for the very right time', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/go4client"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'go4client'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>  -->
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'ghostdrive'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/ghostdrive.png'); ?>" height="40" alt="GhostDrive"></a><br/> <h3 class="title-app"><?php esc_html_e( 'GhostDrive', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'GhostDrive is an affordable, Web 3.0 decentralized private data storage platform for secure and encrypted file storage and workspaces.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/ghostdrive"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'ghostdrive'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="others">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'helpscout'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/helpscout.png'); ?>" height="40"  alt="Helpscout"></a><br/><h3 class="title-app"><?php esc_html_e( 'Helpscout', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Simple to start, powerful at scale, and proven to build better customer relationships.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31" ><a href="https://sperse.io/go/helpscout" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31" ><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'helpscout'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>  

        <div class="col-app" data-type="app" data-category="others">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'helpwise'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/helpwise.png'); ?>" height="40"  alt="Helpwise"></a><br/><h3 class="title-app"><?php esc_html_e( 'Helpwise', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'With shared inboxes for email, SMS, WhatsApp, website chat widget and social media accounts, you can easily collaborate with your team.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31" ><a href="https://sperse.io/go/helpwise" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31" ><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'helpwise'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>  

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'highlevel'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/highlevel.png'); ?>" height="40" alt="High Level"></a><br/> <h3 class="title-app"><?php esc_html_e( 'High Level', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'HighLevel is a sales and marketing suite for agencies, with a website and funnel builder, lead capture forms, surveys and scheduling.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/highlevel"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'highlevel'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'influencersoft'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/influencersoft.png'); ?>" height="35" alt="InfluencerSoft"></a><br/> <h3 class="title-app"><?php esc_html_e( 'InfluencerSoft', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'InfluencerSoft is a complete visual mapping and sales funnel creation, monetization, marketing automation and eCommerce system.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/influencersoft"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'influencersoft'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'insightly'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/insightly.png'); ?>" height="40" alt="Insightly"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Insightly', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Insightly is a CRM and marketing automation software platform for Gmail, Gsuite and Outlook, with integrated voice telephony.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/insightly"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'insightly'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'intercom'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/intercom.png'); ?>" height="40" alt="Intercom"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Intercom', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Intercom is a conversational relationship platform that helps businesses communicate with their customers through personalized interactions.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/intercom"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'intercom'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="webinars">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'jetwebinar'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/jetwebinar.png'); ?>" height="40" alt="JetWebinar"></a><br/> <h3 class="title-app"><?php esc_html_e( 'JetWebinar', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'JetWebinar is a real-time live and simulated live webinar hosting, broadcasting and webinar marketing automation software.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/jetwebinar"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'jetwebinar'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'jumplead'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/jumplead.png'); ?>" height="40" alt="Jumplead"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Jumplead', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Jumplead is an all-in-one inbound B2B marketing automation platform for lead generation, management and live chat messaging.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/jumplead"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'jumplead'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'kajabi'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/kajabi.png'); ?>" height="40" alt="Kajabi"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Kajabi', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Kajabi is a knowledge-focused commerce platform that helps users to create, deliver, market and sell online courses and other digital products.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/kajabi"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'kajabi'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'kartra'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/kartra.png'); ?>" height="40" alt="Kartra"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Kartra', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Kartra is an all-in-one digital business and marketing platform for funnels, pages, leads, memberships, calendars and more.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/kartra"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'kartra'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="https://sperse.io/go/keap"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/keap.png'); ?>" height="40" alt="Keap"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Keap', 'automate_hub' ); ?><span class="title-app-span"> (Formerly Infusionsoft)</span><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                          
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Keap is a private company that offers an e-mail marketing and sales platform for small businesses, including products to manage customers', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/keap"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><a href="<?php echo esc_url(add_query_arg( array('tab' => 'keap'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>                            
        </div>               
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'klaviyo'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/klaviyo.png'); ?>" height="40" alt="Klaviyo"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Klaviyo', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Klaviyo is an email and SMS marketing automation platform for online businesses to deliver more personalized experiences.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/klaviyo"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'klaviyo'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'klipfolio'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/klipfolio.png'); ?>" height="40" alt="klipfolio"></a><br/> <h3 class="title-app"><?php esc_html_e( 'klipfolio', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Escape static spreadsheets and upgrade your analytics to a dynamic platform that has everything you need to validate your business decisions..', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/klipfolio"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'klipfolio'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'lemlist'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/lemlist.png'); ?>" height="40" alt="Lemlist"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Lemlist', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Lemlist lets sales teams, agencies and B2B businesses automate cold email outreach campaigns with personalized images and videos.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/lemlist"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'lemlist'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>                      
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'lifterlms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/lifterlms.png'); ?>" height="40" alt="Lifter LMS"></a><br/> <h3 class="title-app"><?php esc_html_e( 'LifterLMS', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'LifterLMS is a Learning Management System WordPress plugin for online course creators to create and sell membership training courses.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/lifterlms"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'lifterlms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>     

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'liondesk'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/liondesk.png'); ?>" height="40" alt="Liondesk"></a><br/> <h3 class="title-app"><?php esc_html_e( 'LionDesk', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'LionDesk CRM for Real Estate agents and brokers, is a sales and marketing automation app with email, SMS, video texts, AI and more.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/liondesk"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'liondesk'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>  

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'liveagent'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/liveagent.png'); ?>" height="40" alt="Live Agent"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Live Agent', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'LiveAgent is a help desk platform that offers businesses online realtime chat and ticket support features to deliver great customer service.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/liveagent"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'liveagent'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>    

        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'messagebird'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/messagebird.png'); ?>" height="40" alt="MessageBird"></a><br/> <h3 class="title-app"><?php esc_html_e( 'MessageBird', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'MessageBird is a unfied communications platform and API for Voice Calls, SMS and Chat, to programmatically communicate with global customers.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/messagebird"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'messagebird'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>                        
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'mailerlite'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/mailerlite.png'); ?>" height="40" alt="MailerLite"></a><br/> <h3 class="title-app"><?php esc_html_e( 'MailerLite', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'MailerLite let you create advanced email marketing campaigns with list segmentation, automation, landing pages and surveys.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/mailerlite"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'mailerlite'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'mailgun'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/mailgun.png'); ?>" height="40" alt="Mailgun"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Mailgun', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                         
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Mailgun is an email deliverability service provider and ESP with powerful APIs for developers, to send, receive and track emails.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/mailgun"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <?php esc_html_e( 'Premium', 'automate_hub' ); ?></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'mailify'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/mailify.png'); ?>" height="40" alt="Mailify"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Mailify', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                         
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Mailify is a marketing solution and consultancy for email and SMS campaigns, landing pages, automatic workflows, and more.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/mailify"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'mailify'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'mailjet'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/mailjet.png'); ?>" height="40" alt="Mailjet"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Mailjet', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Mailjet is an email delivery service and ESP you can use to create, optimize, send, and track marketing and transactional emails.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/mailjet"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'mailjet'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>    
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'monday'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/monday.png'); ?>" height="40" alt="Monday.com"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Monday.com', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Monday.com is a Work OS that helps teams build customizable web and mobile workflow apps to collaborate and manage their work processes.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/monday"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'monday'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'moonmail'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/moonmail.png'); ?>" height="40" alt="MoonMail"></a><br/> <h3 class="title-app"><?php esc_html_e( 'MoonMail', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'MoonMail is an omnichannel service provider and marketing platform for email messages, push notifications and chatbot AI.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/moonmail"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'moonmail'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'moosend'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/moosend.png'); ?>" height="40" alt="Moosend"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Moosend', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Moosend is an email marketing and automation platform to send responsive, GDPR compliant email newsletters to your subscribers.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/moosend"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'moosend'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'omnisend'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/omnisend.png'); ?>" height="40" alt="Omnisend"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Omnisend', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Omnisend’s all-in-one ecommerce email marketing, SMS and automation platform for Shopify converts more visitors into customers.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/omnisend"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'omnisend'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'onehash'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/onehash.png'); ?>" height="40" alt="onehash"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Onehash', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Keep a track of your leads and deals through sales funnel and pipelines.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/onehash"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'onehash'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>  

        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'ontraport'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/ontraport.png'); ?>" height="40" alt="Ontraport"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Ontraport', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Ontraport is a business automation platform for businesses to automate and integrate sales, marketing and other business processes all in one system.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/ontraport"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'ontraport'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>  

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'pabbly'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/pabbly.png'); ?>" height="40" alt="Pabbly"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Pabbly', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Pabbly is a cloud-based software suite for email marketing, sales, accounting, subscription billing and SaaS app integrations.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/pabbly"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'pabbly'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>              
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'pipedrive'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/pipedrive.png'); ?>" height="40" alt="Pipedrive"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Pipedrive', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Pipedrive is a deal-driven CRM to track leads, manage sales pipelines and activities and convert potential deals into sales.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/pipedrive"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'pipedrive'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>   

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'postmark'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/postmark.png'); ?>" height="40" alt="Postmark"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Postmark', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Postmark is an email management platform developed for developers, to help with the automation and delivery of their application emails.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/postmark"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'postmark'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'productlift'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/productlift.png'); ?>" height="40" alt="productlift"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Productlift', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'ProductLift is a prioritization, roadmap, and changelog tool for SaaS product managers, project managers, and marketing strategists.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/productlift"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'productlift'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'pushover'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/pushover.png'); ?>" height="40" alt="Pushover"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Pushover', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Pushover is a simple push service to send real-time notification messages to multiple users on mobile and desktop devices.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/pushover"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'pushover'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'readwise'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/readwise.png'); ?>" height="40" alt="Readwise"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Readwise', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Readwise makes it easy to revisit and learn from your ebook & article highlights.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/readwise"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'readwise'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'revue'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/revue.png'); ?>" height="40" alt="Revue"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Revue', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                         
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Revue is a content marketing and editorial newsletter service for writers and publishers to monetize your subscription audience.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/revue"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'revue'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'salesflare'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/salesflare.png'); ?>" height="40" alt="Revue"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Salesflare', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                         
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Salesflare is a sales CRM tool that empowers businesses to sell more by automating their data and customer engagement across multiple channels.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/salesflare"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'salesflare'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 


        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'salesforce'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/salesforce.png'); ?>" height="40" alt="Salesforce"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Salesforce', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Salesforce is an enterprise software suite for CRM, customer service, marketing automation, analytics, and application development.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/salesforce"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                           
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'salesforce'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 


        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'salesmate'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/salesmate.png'); ?>" height="42" width="246" alt="salesmate"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Salesmate', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Salesmate is a sales CRM platform for sales reps to streamline their sales processes across multiple channels to increase lead generation.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/salesmate"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                           
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'salesmate'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'sendfox'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/sendfox.png'); ?>" height="40" alt="SendFox"></a><br/> <h3 class="title-app"><?php esc_html_e( 'SendFox', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'SendFox is a marketing tool for content creators to grow your audience with email campaigns, automations, and landing pages.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/sendfox"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                           
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'sendfox'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="https://sperse.io/go/sendgrid"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/sendgrid.png'); ?>" height="40" alt="Sendgrid"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Sendgrid', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'SendGrid is a leading email delivery service provider and communication platform for sending promotional and transactional emails', 'automate_hub' ); ?>.</p>    
        <div class="visit-app"><a href="https://sperse.io/go/sendgrid"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><?php esc_html_e( 'Premium', 'automate_hub' ); ?></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'sendinblue'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/sendinblue.png'); ?>" height="38" width="264" alt="Sendinblue"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Sendinblue', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Sendinblue is a digital marketing automation platform with email, SMS, relationship marketing and retargeting capabilities.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/sendinblue"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'sendinblue'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>                      
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'sendpulse'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/sendpulse.png'); ?>" height="40" alt="Sendpulse"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Sendpulse', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'SendPulse is an all-in-one multi-channel communication and marketing automation platform for email, SMS, messenger apps and chatbots.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/sendpulse"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'sendpulse'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app"  data-category="crm,esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'sendy'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/sendy.png'); ?>" height="40" alt="Sendy"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Sendy', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Sendy is a self-hosted email newsletter app for trackable email marketing and authenticated bulk email campaigns via Amazon SES.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/sendy"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'sendy'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app"  data-category="crm,esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'shopify'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/shopify.png'); ?>" height="40" alt="Shopify"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Shopify', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Shopify is a leading, all-in-one hosted platform to create eCommerce stores and websites, and sell products at a retail location.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/shopify"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'shopify'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="crm">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'simvoly'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/simvoly.png'); ?>" height="42" width="246" alt="salesmate"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Simvoly', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Engage with your audience, and grow your business online from one place.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/simvoly"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                           
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'simvoly'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="enterprise">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'slack'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/slack.png'); ?>" height="40" alt="Slack"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Slack', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Slack is a business team collaboration and communication platform with chat rooms by topic, private groups, and direct messaging.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/slack"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <?php esc_html_e( 'Premium', 'automate_hub' ); ?></div>
        </div> 
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'smartsheet'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/smartsheet.png'); ?>" height="40" alt="Smartsheet"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Smartsheet', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Smartsheet is a SaaS productivity platform to work collaboratively and share data, documents, calendars, tasks and projects online.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/smartsheet"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'smartsheet'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'smtpmail'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/smtpmail.png'); ?>" height="40" alt="smtpmail"></a><br/> <h3 class="title-app"><?php esc_html_e( 'smtpmail', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'An SMTP (Simple Mail Transfer Protocol) host server relays your email and sends outgoing mail to your recipient’s inbox service provider.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/smtpmail" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'smtpmail'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>   

        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'squarespace'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/squarespace.png'); ?>" height="40" alt="smtpmail"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Squarespace', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Create a modern platform that enables millions to build a brand, share their stories, and transact with their customers in an impactful and beautiful online presence.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/squarespace" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'squarespace'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>   

        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'teachable'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/teachable.png'); ?>" height="40" alt="Teachable"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Teachable', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                            
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Teachable is a collaborative productivity portal for teams, using visual kanban-style cards to organize, ideate, plan and manage work.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/teachable"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'teachable'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>   

        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'testmonitor'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/testmonitor.png'); ?>" height="40" alt="Testmonitor"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Testmonitor', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                            
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Whether your are implementing enterprise software, building a quality app or need to improve your manual testing process, TestMonitor has you covered.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/testmonitor"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'testmonitor'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>   
        
        
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'todoist'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/todoist.png'); ?>" height="40" alt="Todoist"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Todoist', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                            
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Todoist is a cloud-based task manager that helps individuals and teams achieve productivity by organizing their to-do lists and projects.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/todoist"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'todoist'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'trello'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/trello.png'); ?>" height="40" alt="Trello"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Trello', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                            
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Trello is a collaborative productivity portal for teams, using visual kanban-style cards to organize, ideate, plan and manage work.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/trello"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'trello'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'trigger'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/trigger.png'); ?>" height="40" alt="Trello"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Trigger', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                            
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Trigger is a collaborative productivity portal for teams, using visual kanban-style cards to organize, ideate, plan and manage work.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/trigger"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'trigger'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 

        <div class="col-app" data-type="app" data-category="sms">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'twilio'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/twilio.png'); ?>" height="40" alt="Twilio"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Twilio', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                            
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Twilio is a leading cloud-based programmable telephony, SMS and video platform to send and receive voice calls and text messages.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/twilio"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'twilio'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="sms">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'vercel'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/vercel.png'); ?>" height="40" alt="vercel"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Vercel', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                            
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Vercel combines the best developer experience with an obsessive focus on end-user performance. Our platform enables frontend teams to do their best work.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/vercel"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'vercel'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>

        <div class="col-app" data-type="app" data-category="others">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'wealthbox'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/wealthbox.png'); ?>" height="40"  alt="Wealthbox"></a><br/><h3 class="title-app"><?php esc_html_e( 'Wealthbox', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Wealthbox is CRM you’ll actually enjoy. Powerful and beautiful. Web-based and secure. No training required.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31"> <a href="https://sperse.io/go/wealthbox" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31"><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'wealthbox'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'webhookout'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/webhookout.png'); ?>" height="40" alt="Webhook Outbound Sender"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Webhook Sender', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'You can define any external webhook where you want to post any for data with all the paramters received from web forms.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/webhookout"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'webhookout'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="webinars">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'webinarjam'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/webinarjam.png'); ?>" height="40" alt="WebinarJam"></a><br/> <h3 class="title-app"><?php esc_html_e( 'WebinarJam', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'WebinarJam is an online broadcasting, live casting, event streaming and webinar app that can reach up to 5,000 people per session.', 'automate_hub' ); ?></p>    
        <div class="visit-app"><a href="https://sperse.io/go/webinarjam"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'webinarjam'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div> 
        <div class="col-app" data-type="app" data-category="esp">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'woodpecker'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/woodpecker.png'); ?>" height="40" alt="Woodpecker"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Woodpecker', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Woodpecker is a drip email tool for cold email campaigns and follow-ups to reach your prospective clients and check performance.', 'automate_hub' ); ?></p>  
        <div class="visit-app"><a href="https://sperse.io/go/woodpecker"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'woodpecker'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>                      
        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'zapier'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/zapier.png'); ?>" height="40" alt="Zapier"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Zapier', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Zapier is an online automation service and productivity app to connect applications so you can move data between them without coding.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/zapier"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                            
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'zapier'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>  

        <div class="col-app" data-type="app">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="https://sperse.io/go/zoho"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/zoho.png'); ?>" height="40" alt="Zoho"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Zoho', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                          
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Zoho is a cloud-based platform for virtual video and audio conferencing, online meetings, live chat, group messaging, and webinars.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/zohocampaings"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'zoho'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>            
        </div>                                              
        <div class="col-app" data-type="enterprise">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="https://sperse.io/go/zoom"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/zoom.png'); ?>" height="40" alt="Zoom"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Zoom', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>                          
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Zoom is a cloud-based platform for virtual video and audio conferencing, online meetings, live chat, group messaging, and webinars.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/zoom"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                              
        <div class="install-app"><?php esc_html_e( 'Premium', 'automate_hub' ); ?></div>                            
        </div>   
        <div class="col-app" data-type="app" data-category="others">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'zulip'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/zulip.png'); ?>" height="40"  alt="Zulip"></a><br/><h3 class="title-app"><?php esc_html_e( 'Zulip', 'automate_hub' ); ?><span class="pro-app-directory"><?php esc_html_e( 'Pro', 'automate_hub' ); ?></span></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'With Zulip, you can catch up on important conversations while ignoring irrelevant ones.', 'automate_hub' ); ?></p> 
        <div class="visit-app margintop31" ><a href="https://sperse.io/go/zulip" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app margintop31"><i class="fa fa-download" aria-hidden="true"></i><a href="<?php echo esc_url(add_query_arg( array('tab' => 'zulip'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <!--// FORM SOURCES //--> 
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'buddyboss'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/buddyboss.png'); ?>" height="40" alt="Buddy Boss"></a><h3 class="title-app"><?php esc_html_e( 'Buddy Boss', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'BuddyBoss is an open source platform to sell memberships, courses, and create online communities for audience engagement and loyalty.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/buddyboss" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'buddyboss'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'calderaforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/calderaforms.png'); ?>" height="40" alt="Caldera Forms"></a><h3 class="title-app"><?php esc_html_e( 'Caldera Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Caldera Forms is a form builder for WordPress. It has an intuitive drag and drop visual interface to create responsive forms.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/calderaforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'calderaforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'contactform7'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/contactform7.png'); ?>" height="40" alt="Contact Form 7"></a><h3 class="title-app"><?php esc_html_e( 'Contact Form 7', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Contact Form 7 is a free, popular and customizable contact form creator for WordPess with simple markup and several field types.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/contactform7" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'contactform7'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>        
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'elementorpro'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/elementorpro.png'); ?>" height="40" alt="Elementor Pro Forms"></a><h3 class="title-app"><?php esc_html_e( 'Elementor Pro Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Elementor Pro is an advanced drag and drop page and form builder plugin to visual design WordPress websites with no coding needed.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/elementorpro" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'elementorpro'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'everestforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/everestforms.png'); ?>" height="40" alt="Everest Forms"></a><h3 class="title-app"><?php esc_html_e( 'Everest Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Everest Forms lets you create any kind of Wordpress forms using pre-built templates with intuitive usability and simplicity.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/everestforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'everestforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'fluentforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/fluentforms.png'); ?>" height="40" alt="Fluent Forms"></a><h3 class="title-app"><?php esc_html_e( 'Fluent Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Fluent Forms is a beginner-friendly, intuitive WordPress contact form builder plugin to capture leads using pre-built form templates.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/fluentforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'fluentforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'formcraft'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/formcraft.png'); ?>" height="40" alt="Form Craft"></a><h3 class="title-app"><?php esc_html_e( 'Form Craft', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'FormCraft is a drag-and-drop builder for WordPress forms ranging from simple contact forms to embedding customized application forms.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/formcraft" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'formcraft'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'formidableforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/formidableforms.png'); ?>" height="40"  alt="Formidable Forms"></a><h3 class="title-app"><?php esc_html_e( 'Formidable Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Formidable Forms is a drag and drop form builder to create WordPress forms and collect data with conditional logic and formulas.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/formidableforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'formidableforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'forminator'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/forminator.png'); ?>" height="40" alt="Forminator"></a><h3 class="title-app"><?php esc_html_e( 'Forminator', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Forminator is a Wordpress Plugin with a drag-and-drop editor to create versatile forms like contact forms, polls and quizzes.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/forminator" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'forminator'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'gravityforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/gravityforms.png'); ?>" height="40" alt="Gravity Forms"></a><h3 class="title-app"><?php esc_html_e( 'Gravity Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Gravity Forms is a WordPress form builder plugin to create complex powerful forms, polls, quizzes and more, with no coding required!', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/gravityforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'gravityforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'happyforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/happyforms.png'); ?>" height="40" alt="Happy Forms"></a><h3 class="title-app"><?php esc_html_e( 'Happy Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Happy Forms is a Wordpress plugin to create forms, polls, and surveys that can help you manage and track conversations with customers.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/happyforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'happyforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'jetengineforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/jetengine.png'); ?>" height="40" alt="Jet Engine Forms"></a><h3 class="title-app"><?php esc_html_e( 'Jet Engine Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'JetEngine Forms is a Wordpress plugin by Crocoblock which allows you to easily create custom front-end forms and user profile pages.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/jetengineforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'jetengineforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'jetpack'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/jetpack.png'); ?>" height="40" alt="Jetpack"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Jetpack', 'automate_hub' ); ?></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Jetpack is a real-time live and simulated live webinar hosting, broadcasting and webinar marketing automation software.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/jetpack"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'jetpack'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>                 
        <div class="col-form" data-type="form" >
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'jotform'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/jotform.png'); ?>" height="40" alt="jotform"></a><br/> <h3 class="title-app"><?php esc_html_e( 'JotForm', 'automate_hub' ); ?></h3>
        <div class="rating-app"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Jotform is an online form builder to create custom online forms, automate tasks, collect online payments using a drag-and-drop interface.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/jotform"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'jotform'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'influencerforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/influencersoft.png'); ?>" height="35" alt="Influencersoft Forms"></a><h3 class="title-app"><?php esc_html_e( 'Influencersoft Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'InfluencerSoft forms are powerful custom forms for your funnel pages, that can pass any user input data using the Automation Process.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/influencersoftforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'influencerforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'ninjaforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/ninjaforms.png'); ?>" height="40" alt="Ninja Forms"></a><h3 class="title-app"><?php esc_html_e( 'Ninja Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Ninja Forms is a beginner-friendly, freemium form builder plugin for WordPress to build highly interactive forms without any coding.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/ninjaforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'ninjaforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'plansoforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/plansoforms.png'); ?>" height="40" alt="Planso Forms"></a><h3 class="title-app"><?php esc_html_e( 'Planso Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'PlanSo Forms is a Wordpress form-builder of professional online forms including contact forms, online surveys and invitations.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/plansoforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'plansoforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'smartforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/smartforms.png'); ?>" height="40" alt="Smart Forms"></a><h3 class="title-app"><?php esc_html_e( 'Smart Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'SmartForms is a form plugin to create any type of responsive WordPress forms with powerful functionality such as calculated fields.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/smartforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'smartforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('tab' => 'typeform'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img class="apps-object-fit" src="<?php echo esc_url(AWP_ASSETS.'/images/logos/typeform.png'); ?>" height="40" alt="typeform"></a><br/> <h3 class="title-app"><?php esc_html_e( 'Typeform', 'automate_hub' ); ?></h3>
        <div class="rating-app "><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div>
        <p class="app-desc"><?php esc_html_e( 'Typeform is an app to make interactive online forms, quizzes, surveys and polls, to take orders and payments or collect and share data.', 'automate_hub' ); ?></p>   
        <div class="visit-app"><a href="https://sperse.io/go/typeform"  target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>                             
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('tab' => 'typeform'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'webhookin'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/webhookin.png'); ?>" height="40" alt="Webhook Inbound Receiver"></a><h3 class="title-app"><?php esc_html_e( 'Webhook Inbound Receiver', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( '"Receiver" Inbound Webhook is a versitile and powerful tool to capture and process data parameters in as QueryString or JSON POST.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/webhookin" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'webhookin'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>       
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'weforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/weforms.png'); ?>" height="40" alt="We Forms"></a><h3 class="title-app"><?php esc_html_e( 'We Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'WeForms is a drag and drop builder that has customizable templates for your forms, including registration, application and payment forms.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/weforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'weforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'woocommerce'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/woocommerce.png'); ?>" height="40" alt="WooCommerce"></a><h3 class="title-app"><?php esc_html_e( 'WooCommerce', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'WooCommerce is a free, open-source, self-hosted WordPress plugin to build customizable eCommerce stores to sell  and collect payments.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/woocommerce" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'woocommerce'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'wpforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/wpforms.png'); ?>" height="40" alt="WP Forms"></a><h3 class="title-app"><?php esc_html_e( 'WP Forms', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'WPForms is a popular WordPress contact form builder plugin with drag and drop capabilities to create any type of online form.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/wpforms" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'wpforms'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
        <div class="col-form" data-type="form">
        <span class = "heart"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
        <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'wsform'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><img src="<?php echo esc_url(AWP_ASSETS.'/images/logos/wsform.png'); ?>" height="40" alt="WS Form"></a><h3 class="title-app"><?php esc_html_e( 'WS Form', 'automate_hub' ); ?></h3>
        <div class="rating-app fivestar"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></div>
        <p class="app-desc"><?php esc_html_e( 'WS Form is a powerful contact form builder WordPress plugin to let you create professional, mobile friendly, accessible contact forms.', 'automate_hub' ); ?></p> 
        <div class="visit-app"><a href="https://sperse.io/go/wsform" target="_blank"><?php esc_html_e( 'View Website', 'automate_hub' ); ?></a> <i class="fa fa-external-link"></i></div>
        <div class="install-app"><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url(add_query_arg( array('trigger' => 'wsform'), admin_url( 'admin.php?page=automate_hub' ) )); ?>"><?php esc_html_e( 'Connect', 'automate_hub' ); ?></a></div>
        </div>
    </div> <!-- end of to center -->    
    </div>
</div>
</section>      
<!-- Scroll to top -->
<div class="scrollup scrollup__hide"><?php esc_html_e('To Top', 'automate_hub'); ?></div>
</main>
</div>