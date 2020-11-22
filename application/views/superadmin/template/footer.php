    
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <?php foreach ($activity as $log) { ?>

                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-history"></i>
                        </div>
                        <div class="tm-title">
                            <h4><?= $log->ip_address ?></h4>
                            <span class="time"><i class="ti-time"></i><?= $log->waktu ?></span>
                        </div>
                        <p><?= $log->username." ".$log->keterangan ?>
                        </p>
                    </div>
                    <?php } ?>

                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="<?= base_url() ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/js/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.slicknav.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="<?= base_url() ?>assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="<?= base_url() ?>assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="<?= base_url() ?>assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="<?= base_url() ?>assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="<?= base_url() ?>assets/js/plugins.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts.js"></script>
    <?php if($content == "daftar-pemilih") { 
        if($id == 1) {?>
    
    <script src="<?= base_url("assets/js/custom/daftar-pemilih.js") ?>"></script>

    <?php } else if($id == 2) {?>
    <script src="<?= base_url("assets/js/custom/daftar-belum-memilih.js") ?>"></script>
    <?php } } ?>

    <?php if($content == 'detail-pemilih') { ?>
    <script src="<?= base_url("assets/js/custom/detail-pemilih.js") ?>"></script>
    <?php } ?>

    <?php if($content == 'timeline') { ?>
    <script src="<?= base_url("assets/js/custom/timeline.js") ?>"></script>
    <?php } ?>
</body>

</html>
