<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JCI: Recover Account</title>
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    <link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container">
        <header>
            <div class="row gutter">
                <div class="col m2 logo">
                    <a href="index.php"><img class="logo" src="../images/jcilogo.svg" alt="" />
                    </a>
                </div>
                <div class="col m7 navbar">
                    <ul class="navprimary">
                        <li><a href="resources.php">Resources</a>
                        </li>
                        <li><a href="journals.php">Critical Incidents</a>
                        </li>
                        <li><a href="about.php">About</a>
                        </li>
                    </ul>
                </div>
                <div class="col m3 navbar">
                    <ul class="login">
                        <li><a href="memberRegistration.php">Join</a>
                        </li>
                        <span style="font-size:1.5rem">|</span>
                        <li><a href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="row gutter">
                <div class="col s4 m4">
                    <h5 class="login">Please Answer Your Security Question</h5>
                    <p>Forgot Email:<br>Please enter the cell phone number you provided at registration.  If you cannot remember the cell phone number or did not provide one at registration please contact Tim Brotherton via the Contact link at the bottom of this page.<br></br>Forgot Password:<br>Please enter the email you used to register your account.  If you cannot remember your email please use the Forgot Email process or contact Tim Brotherton via the Contact link at the bottom of the page.<br></br></p>
                    <h5 class="login">ATTENTION</h5>
                    <p>Due to general server slowness please allow up to 10 minutes to receive either your email/text verification.<br>If you do not see your email within that time check your spam folder and or check the spelling of your email.<br>Thank you!</p>
                </div>
                <div class="col m8 s8 tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#tab1">Forgot Email</a>
                        </li>
                        <li><a href="#tab2">Forgot Password</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab1" class="tab active">
                            <form action="includes/showInfo.php" method="post">
                                <ul class="list-form">
                                    <li class="textfield-container">
                                        <label for="phone" class="textlabelwhite">Phone Number (no format):</label>
                                        <input id="number" name="number" type="text" placeholder="0123456789">
                                    </li>
                                    <li class="textfield-container">
                                        <label for="text" class="textlabelwhite">Cellular Provider:</label>
                                        <div class="statedropdown">
                                            <label for="select" class="select">
                                                <select name="cellproviders" id="select">
                                                    <a href='#' class="button arrow greyarrowsingledown"></a>
                                                    <option value="Providers">Select A Cellular Provider: </option>
                                                    <option value="@sms.3rivers.net">3 River Wireless</option>
                                                    <option value="@paging.acswireless.com">ACS Wireless</option>
                                                    <option value="@message.alltel.com">Alltel</option>
                                                    <option value="@txt.att.net">AT&T</option>
                                                    <option value="@txt.bellmobility.ca">Bell Canada</option>
                                                    <option value="@bellmobility.ca">Bell Canada</option>
                                                    <option value="@txt.bell.ca">Bell Mobility (Canada)</option>
                                                    <option value="@txt.bellmobility.ca">Bell Mobility</option>
                                                    <option value="@blueskyfrog.com">Blue Sky Frog</option>
                                                    <option value="@sms.bluecell.com">Bluegrass Cellular</option>
                                                    <option value="@myboostmobile.com">Boost Mobile</option>
                                                    <option value="@bplmobile.com">BPL Mobile</option>
                                                    <option value="@cwwsms.com">Carolina West Wireless</option>
                                                    <option value="@mobile.celloneusa.com">Cellular One</option>
                                                    <option value="@csouth1.com">Cellular South</option>
                                                    <option value="@cwemail.com">Centennial Wireless</option>
                                                    <option value="@messaging.centurytel.net">CenturyTel</option>
                                                    <option value="@txt.att.net">Cingular (Now AT&T)</option>
                                                    <option value="@msg.clearnet.com">Clearnet</option>
                                                    <option value="@comcastpcs.textmsg.com">Comcast</option>
                                                    <option value="@corrwireless.net">Corr Wireless Communications</option>
                                                    <option value="@mobile.dobson.net">Dobson</option>
                                                    <option value="@sms.edgewireless.com">Edge Wireless</option>
                                                    <option value="@fido.ca">Fido</option>
                                                    <option value="@sms.goldentele.com">Golden Telecom</option>
                                                    <option value="@messaging.sprintpcs.com">Helio</option>
                                                    <option value="@text.houstoncellular.net">Houston Cellular</option>
                                                    <option value="@ideacellular.net">Idea Cellular</option>
                                                    <option value="@ivctext.com">Illinois Valley Cellular</option>
                                                    <option value="@inlandlink.com">Inland Cellular Telephone</option>
                                                    <option value="@pagemci.com">MCI</option>
                                                    <option value="@page.metrocall.com">Metrocall</option>
                                                    <option value="@my2way.com">Metrocall 2-way</option>
                                                    <option value="@mymetropcs.com">Metro PCS</option>
                                                    <option value="@fido.ca">Microcell</option>
                                                    <option value="@clearlydigital.com">Midwest Wireless</option>
                                                    <option value="@mobilecomm.net">Mobilcomm</option>
                                                    <option value="@text.mtsmobility.com">MTS</option>
                                                    <option value="@messaging.nextel.com">Nextel</option>
                                                    <option value="@onlinebeep.net">OnlineBeep</option>
                                                    <option value="@pcsone.net">PCS One</option>
                                                    <option value="@txt.bell.ca">President's Choice</option>
                                                    <option value="@sms.pscel.com">Public Service Cellular</option>
                                                    <option value="@qwestmp.com">Qwest</option>
                                                    <option value="@pcs.rogers.com">Rogers AT&T Wireless</option>
                                                    <option value="@pcs.rogers.com">Rogers Canada</option>
                                                    <option value="@satellink.net">Satellink</option>
                                                    <option value="@email.swbw.com">Southwestern Bell</option>
                                                    <option value="@messaging.sprintpcs.com">Sprint</option>
                                                    <option value="@tms.suncom.com">Sumcom</option>
                                                    <option value="@mobile.surewest.com">Surewest Communicaitons</option>
                                                    <option value="@tmomail.net">T-Mobile</option>
                                                    <option value="@msg.telus.com">Telus</option>
                                                    <option value="@txt.att.net">Tracfone</option>
                                                    <option value="@tms.suncom.com">Triton</option>
                                                    <option value="@utext.com">Unicel</option>
                                                    <option value="@email.uscc.net">US Cellular</option>
                                                    <option value="@txt.bell.ca">Solo Mobile</option>
                                                    <option value="@messaging.sprintpcs.com">Sprint</option>
                                                    <option value="@tms.suncom.com">Sumcom</option>
                                                    <option value="@mobile.surewest.com">Surewest Communicaitons</option>
                                                    <option value="@tmomail.net">T-Mobile</option>
                                                    <option value="@msg.telus.com">Telus</option>
                                                    <option value="@tms.suncom.com">Triton</option>
                                                    <option value="@utext.com">Unicel</option>
                                                    <option value="@email.uscc.net">US Cellular</option>
                                                    <option value="@uswestdatamail.com">US West</option>
                                                    <option value="@vtext.com">Verizon</option>
                                                    <option value="@vmobl.com">Virgin Mobile</option>
                                                    <option value="@vmobile.ca">Virgin Mobile Canada</option>
                                                    <option value="@sms.wcc.net">West Central Wireless</option>
                                                    <option value="@cellularonewest.com">Western Wireless</option>
                                                </select>
                                            </label>
                                        </div>

                                    </li>
                                    <li class="textfield-container">
                                        <input type="submit" value="Submit the form" />
                                    </li>
                                </ul>
                            </form>
                        </div>

                        <div id="tab2" class="tab">
                            <form action="confirmation.php" method="post">
                                <ul class="list-form">
                                    <li class="textfield-container">
                                        <label for="text" class="textlabelwhite">Email Address:</label>
                                        <input id="emailAddress" type="text" name="emailAddress" maxlength="100" placeholder="SoAndSo@email.com">
                                    </li>
                                    <li class="textfield-container">
                                        <input type="submit" value="Submit the form" />
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- tab-content -->
                </div>
                <!-- tabs -->
                <div class="col s1 m1"></div>
            </div>
        </div>
        <footer>
            <div class="row gutter">
                <nav>
                    <div class="navfoot grey">
                        <p class="copyright">&copy;copyright 2016</p>
                        <ul class="navfoot">
                            <li class="links"><a href="../resources.php">Links</a>
                            </li>
                            <li class="help"><a href="../resources.php">Help</a>
                            </li>
                            <li class="archive"><a href="../journals.php">Critical Incidents</a>
                            </li>
                            <li class="contact"><a href="../contactUs.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                
            </div>
        </footer>
    </div>
    </div>
    <script src="../js/jquery-1.12.0.min.js"></script>
    <script src="../js/tabs.js"></script>
</body>

</html>