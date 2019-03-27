
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="signup" name="signup">
                            <fieldset>
                                <div id="show_msg" class="form-group"></div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" name="name" type="name" autofocus>
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone" name="phone" type="phone" autofocus>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="address" name="address"></textarea>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        Click here <a href="<?php echo base_url('Login') ?>">Sign In</a>
                                        </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Sign Up">
                                <!--<a class="btn btn-lg btn-success btn-block">Sign Up</a>-->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
