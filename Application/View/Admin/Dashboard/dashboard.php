<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">overview</h2>

                </div>
            </div>
        </div>
        <div class="row m-t-25">
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h2>
                                <?php
                                    $con = mysqli_connect('localhost','root','','application');
                                    $sql = mysqli_query($con, 'select count(customerId) from customer');
                                    $row = mysqli_fetch_assoc($sql);
                                    echo $row['count(customerId)'];
                                    mysqli_close($con);
                                ?>
                                </h2>
                                <span>Members</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                            <div class="text">
                                <h2>0</h2>
                                <span>Total Orders</span>
                            </div>
                            <div class="overview-chart">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                              
                            </div>
                            <div class="text">
                                <h2>Not Avail</h2>
                                <span>Reports</span>
                            </div>
                            <div class="overview-chart">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <img height="20px" width="20px" src="images/icon-rupee.png">
                            </div>
                            <div class="text">
                                <h2>0</h2>
                                <span>Total earnings</span>
                            </div>
                            <div class="overview-chart">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>