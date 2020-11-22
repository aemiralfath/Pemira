<main>
    <div class="container py-5">
        <div class="card mt-5 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select id="status" name="timeline_status" class="form-control">
                                <option value="1" <?php if($timeline[0]->status == 1) echo "selected='selected'"?>>Countdown</option>
                                <option value="2" <?php if($timeline[0]->status == 2) echo "selected='selected'"?>>Pemilihan</option>
                                <option value="3" <?php if($timeline[0]->status == 3) echo "selected='selected'"?>>Menunggu Pengumuman</option>
                                <option value="4" <?php if($timeline[0]->status == 4) echo "selected='selected'"?>>Pengumuman</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md">
                                <button id="updateTimeline" class="btn btn-md btn-success m-0 z-depth-0 w-100">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>