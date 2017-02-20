<?php $this->load->view('clients/fixed_files/header'); ?>


<div class="col-md-9">
    <div class="profile-body margin-bottom-20" id="fsvas">


        <div class="tab-v1">
            <ul class="nav nav-justified nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile" aria-expanded="true">Edit Profile</a></li>
                <li class=""><a data-toggle="tab" href="#passwordTab" aria-expanded="false">Change Password</a></li>
                <li><a data-toggle="tab" href="#settings">Notification Settings</a></li>
            </ul>
            <div class="tab-content">
                <div id="profile" class="profile-edit tab-pane fade active in">
                    <h2 class="heading-md">Manage your Name, ID and Email Addresses.</h2>
                    <p>Below are the name and email addresses on file for your account.</p>
                    <br>
                    <dl class="dl-horizontal">
                        <dt><strong>Your name </strong></dt>
                        <dd>
                            Edward Rooster
                            <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Your ID </strong></dt>
                        <dd>
                            FKJ-032440
                            <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Company name </strong></dt>
                        <dd>
                            Htmlstream
                            <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Primary Email Address </strong></dt>
                        <dd>
                            edward-rooster@gmail.com
                            <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Phone Number </strong></dt>
                        <dd>
                            (304) 33-2867-499
                            <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Office Number </strong></dt>
                        <dd>
                            (304) 44-9810-296
                            <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Address </strong></dt>
                        <dd>
                            California, US
                            <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
                        </dd>
                        <hr>
                    </dl>

                </div>

                <div id="passwordTab" class="profile-edit tab-pane fade">
                    <h2 class="heading-md">Manage your Security Settings</h2>
                    <p>Change your password.</p>
                    <br>
                    <form class="sky-form" id="sky-form4" action="#" novalidate="novalidate">
                        <dl class="dl-horizontal">
                            <dt>Username</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="text" placeholder="Username" name="username">
                                        <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                                    </label>
                                </section>
                            </dd>
                            <dt>Email address</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope"></i>
                                        <input type="email" placeholder="Email address" name="email">
                                        <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                    </label>
                                </section>
                            </dd>
                            <dt>Enter your password</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" id="password" name="password" placeholder="Password">
                                        <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                    </label>
                                </section>
                            </dd>
                            <dt>Confirm Password</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" name="passwordConfirm" placeholder="Confirm password">
                                        <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                    </label>
                                </section>
                            </dd>
                        </dl>
                        <label class="toggle toggle-change"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                class="no-rounded"></i>Remember password</label>
                        <br>
                        <section>
                            <label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I agree
                                    with the Terms and Conditions</a></label>
                        </section>
                        <button type="button" class="btn-u btn-u-default">Cancel</button>
                        <button class="btn-u" type="submit">Save Changes</button>
                    </form>
                </div>


                <div id="settings" class="profile-edit tab-pane fade">
                    <h2 class="heading-md">Manage your Notifications.</h2>
                    <p>Below are the notifications you may manage.</p>
                    <br>
                    <form class="sky-form" id="sky-form3" action="#">
                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                class="no-rounded"></i>Email notification</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                class="no-rounded"></i>Send me email notification when a user comments on my blog</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                class="no-rounded"></i>Send me email notification for the latest update</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                class="no-rounded"></i>Send me email notification when a user sends me message</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                class="no-rounded"></i>Receive our monthly newsletter</label>
                        <hr>
                        <button type="button" class="btn-u btn-u-default">Reset</button>
                        <button class="btn-u" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
</div>
</div>

<?php $this->load->view('clients/fixed_files/footer'); ?>
