 <div class="row">
      
          <form action="#" method="post">
            <div class="col-xs-12 col-md-3">
          <div class="input-group date" data-provide="datepicker">
              <input type="text" class="form-control" name="">
            <div class="input-group-addon"  >
                <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-3">
          <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" name="">  
            <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-3">
          <select name="" class="form-control">
              <option value="0">Pilih kategori</option>
          </select>
        </div>
        <div class="col-xs-12 col-md-3">
          <button type="submit" class="btn btn-success col-xs-12"><i class="glyphicon glyphicon-filter"></i>&nbspFilter</button>
        </div>
          </form>
      
  </div>
  <div class="row" style="margin-top: 15px;">

      <?php
      if (isset($list) && $list) {
        foreach ($list as $key => $value) { ?>
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
          <div class="col-xs-12 col-md-4">
              <img class="media-object col-xs-12" src="assets/images/<?php echo $value['event_file_poster'];?>" alt="<?php echo $value['event_title'];?>" />  
            </div>
          <div class="col-xs-12 col-md-8">
      <h4 class="media-heading"><?php echo $value['event_title'];?></h4>
      <p><?php echo $value['event_desc'];?></p>
            </div>
            </div>
            </div>
            <div class="panel-footer"> 
              <a href="daftar" class="btn btn-success">Tertarik mendaftar</a>
            </div>
          </div>
    <?php    }
      }
      ?>

    </div>
  </div>