



<div class="admin-form">
<form action="panel.php?url=storetestlist" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Test Data</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="enter here.......">
  </div>
  <input type="hidden" name="_token" value="<?php echo Csrf::_token();?>">


  <button type="submit" name="btn" class="btn btn-default">Add Course List</button>

  
</form>



<hr>
<a href="<?php echo appsConfig::URL('panel.php?url=testlist')?>">Back to List</a>

</div>


