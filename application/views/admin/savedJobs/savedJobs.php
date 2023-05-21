  <div class="pcoded-content">
      <div class="pcoded-inner-content">
          <!-- Main-body start -->
          <div class="main-body">
              <div class="page-wrapper">
                  <!-- Page-header start -->
                  <div class="page-header">
                      <div class="row align-items-end">
                          <div class="col-lg-8">
                              <div class="page-header-title">
                                  <div class="d-inline">
                                      <h4><?php echo $pagetitle; ?></h4>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="page-header-breadcrumb">
                                  <ul class="breadcrumb-title">
                                      <li class="breadcrumb-item" style="float: left;"><a href="#!"><?php echo $pageUrl; ?></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Page-header end -->
                  <!-- Page body start -->
                  <div class="page-body">
                      <div class="row">
                          <!-- Left column start -->
                          <div class="col-lg-12 col-xl-9">
                              <!-- Job description card start -->

                              <!-- visitor start -->

                              <div class="card">

                                  <div class="card-block">




                                      <div class="table-responsive">
                                          <table id="simpletable" class="table dt-responsive task-list-table  table-bordered nowrap">
                                              <thead>
                                                  <tr>


                                                      <th style="text-transform:uppercase;">Saved Jobs</th>

                                                  </tr>
                                              </thead>
                                              <tbody class="task-page">
                                                  <?php $no = 1; ?>
                                                  <?php foreach ($applications as $record) : ?>
                                                      <tr>


                                                          <td>
                                                              <div class="job-cards">
                                                                  <div class="media">
                                                                      <a class="media-left media-middle" href="#">
                                                                          <img class="media-object m-r-10 m-l-10" src="assets/admin/files/assets/images/browser/chrome.jpg" alt="Generic placeholder image">
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <div class="company-name m-b-10">
                                                                              <p>
                                                                                  <?php echo $no++ ?>. <?php echo strtoupper($record->jobtitle); ?> </p>
                                                                              <i class="text-muted f-14">Posted: <?php echo (substr($record->created_at, 0, 10)); ?></i>
                                                                          </div>
                                                                          <p class=" mb-5 ">A Reputable Company<br>
                                                                              <span><?php echo (strtoupper($record->joblocation) . '  |  ' . "Salary:" . $record->expectedsalary); ?></span>
                                                                              <br>
                                                                              <?php if ($record->applicationclosingdate > date("Y-m-d")) { ?>
                                                                                  Status: <label class="label bg-primary">Still Opened For Applications</label>
                                                                              <?php } else { ?>
                                                                                  Status: <label class="label bg-primary">Application Date Closed</label>
                                                                              <?php } ?> <br>
                                                                              <i class="text-muted f-14">Closing Date:<?php echo ($record->applicationclosingdate); ?></i> <i class="" style="float:right!important;">Saved Date :<?php echo (substr($record->SavedDate, 0, 10)); ?> </i>
                                                                          </p>
                                                                      </div>
                                                                      <div class="media-right">
                                                                          <div class="label-main">
                                                                              <!-- <a href="1"> <label class="label bg-primary">View</label></a> -->
                                                                              <a href="<?php echo base_url($record->id); ?>" class="label bg-primary" value="<?php echo $record->id; ?>">View</a>

                                                                              <br>
                                                                              <i class="fa fa-eye"> <?php echo ($record->totalviewed); ?></i><br>
                                                                              <i class="fa fa-pencil-square-o"> <?php echo ($record->totalapplications); ?></i>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </td>


                                                      </tr>
                                                  <?php endforeach; ?>
                                              </tbody>
                                          </table>
                                      </div>








                                  </div>
                              </div>




                              <!-- Job description card end -->


                          </div>
                          <!-- Left column end -->
                          <!-- right column start -->
                          <div class="col-lg-12 col-xl-3">
                              <!-- Filter card start -->
                              <div class="card">
                                  <div class="card-header">
                                      <h5><i class="icofont icofont-filter m-r-5"></i>Filter</h5>
                                  </div>
                                  <div class="card-block">
                                      <form action="#">
                                          <div class="form-group row">
                                              <div class="col-sm-12">
                                                  <input type="text" class="form-control" placeholder="Job-title">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-sm-12">
                                                  <input type="text" class="form-control" placeholder="Location">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-sm-12">
                                                  <select class="form-control">
                                                      <option>Select Job Type</option>
                                                      <option>Full Time</option>
                                                      <option>Part Time</option>
                                                      <option>Remote</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="text-right">
                                              <button type="submit" class="btn btn-primary btn-sm">
                                                  <i class="icofont icofont-job-search m-r-5"></i> Job
                                                  Find
                                              </button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <!-- Filter card end -->
                              <!-- Location card start -->
                              <div class="card job-right-header">
                                  <div class="card-header">
                                      <h5>Location</h5>
                                      <div class="card-header-right">
                                          <label class="label label-danger">Add</label>
                                      </div>
                                  </div>
                                  <div class="card-block">
                                      <form action="#">
                                          <div class="checkbox-fade fade-in-primary">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  <span class="cr">
                                                      <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                  </span>
                                              </label>
                                              <div>Amsterdam, North Holland Province, Netherlands
                                              </div>
                                          </div>
                                          <div class="checkbox-fade fade-in-primary">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  <span class="cr">
                                                      <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                  </span>
                                              </label>
                                              <div>Koog aan de Zaan, North Holland Province,
                                                  Netherlands</div>
                                          </div>
                                          <div class="checkbox-fade fade-in-primary">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  <span class="cr">
                                                      <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                  </span>
                                              </label>
                                              <div>Amsterdam Binnenstad en Oostelijk Havengebied,
                                                  North Holland Province, Netherlands</div>
                                          </div>
                                          <div class="checkbox-fade fade-in-primary">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  <span class="cr">
                                                      <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                  </span>
                                              </label>
                                              <div>Hoofddorp, North Holland Province, Netherlands
                                              </div>
                                          </div>
                                          <div class="checkbox-fade fade-in-primary">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  <span class="cr">
                                                      <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                  </span>
                                              </label>
                                              <div>Alkmaar, North Holland Province, Netherlands</div>
                                          </div>
                                      </form>
                                  </div>

                              </div>
                              <!-- Location card end -->
                              <!-- Job Title card start -->
                              <div class="card job-right-header">
                                  <div class="card-header">
                                      <h5>Job Title</h5>
                                      <div class="card-header-right">
                                          <label class="label label-danger">Add</label>
                                      </div>
                                  </div>
                                  <div class="card-block">
                                      <form action="#">
                                          <div class="checkbox-fade fade-in-primary">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  <span class="cr">
                                                      <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                  </span>
                                              </label>
                                              <div>
                                                  Developer
                                                  <span class="text-muted">(30)</span>
                                              </div>
                                          </div>
                                          <div class="checkbox-fade fade-in-primary">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  <span class="cr">
                                                      <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                  </span>
                                              </label>
                                              <div>
                                                  Front end designer
                                                  <span class="text-muted">(48)</span>
                                              </div>
                                          </div>
                                          <div class="checkbox-fade fade-in-primary">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  <span class="cr">
                                                      <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                  </span>
                                              </label>
                                              <div>
                                                  UX designer
                                                  <span class="text-muted">(37)</span>
                                              </div>
                                          </div>
                                          <div class="checkbox-fade fade-in-primary">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  <span class="cr">
                                                      <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                  </span>
                                              </label>
                                              <div>
                                                  Software engineer
                                                  <span class="text-muted">(57)</span>
                                              </div>
                                          </div>
                                          <div class="checkbox-fade fade-in-primary">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  <span class="cr">
                                                      <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                  </span>
                                              </label>
                                              <div>
                                                  PHP developer
                                                  <span class="text-muted">(60)</span>
                                              </div>
                                          </div>
                                      </form>
                                  </div>

                              </div>
                              <!-- Job Title card end -->

                              <!-- Date Posted card start -->
                              <div class="card job-right-header">
                                  <div class="card-header">
                                      <h5>Date Posted</h5>
                                      <div class="card-header-right">
                                          <label class="label label-danger">Add</label>
                                      </div>
                                  </div>
                                  <div class="card-block">
                                      <form action="#">
                                          <div class="form-radio">
                                              <div class="radio radiofill radio-inline">
                                                  <label>
                                                      <input type="radio" name="radio" checked="checked">
                                                      <i class="helper"></i> Today
                                                      <span class="text-muted">(30)</span>
                                                  </label>
                                              </div>
                                              <div class="radio radiofill radio-inline">
                                                  <label>
                                                      <input type="radio" name="radio">
                                                      <i class="helper"></i> Yesterday
                                                      <span class="text-muted">(85)</span>
                                                  </label>
                                              </div>
                                              <div class="radio radiofill radio-inline">
                                                  <label>
                                                      <input type="radio" name="radio">
                                                      <i class="helper"></i> Last-week
                                                      <span class="text-muted">(184)</span>
                                                  </label>
                                              </div>
                                              <div class="radio radiofill radio-inline">
                                                  <label>
                                                      <input type="radio" name="radio">
                                                      <i class="helper"></i> Last month
                                                      <span class="text-muted">(195)</span>
                                                  </label>
                                              </div>
                                          </div>
                                      </form>
                                  </div>

                              </div>
                              <!-- Date Posted card end -->


                          </div>
                          <!-- right column end -->
                      </div>
                  </div>
                  <!-- Page body start -->
              </div>
          </div>
          <!-- Main-body end -->

          <div id="styleSelector"> applications

          </div>
      </div>
  </div>