<?php include_once 'apps/public/header.php';?>

<div style="margin-bottom: 140px;"></div>




<div class="container" style="margin-top: 50px">
<div class="row">

<div class="col-md-4 col-sm-5 col-xs-2">
<?php appsConfig::img('apps/images/login.png')?>
</div>

<div class="col-md-8 col-sm-7 col-xs-10">
<h1>Are you Admin???</h1>
<hr>


<?php
$db = new DBContext();
$input = new Validation();
$tablename= "ict_admin";


  $email = "";
  $password = "";



if(isset($_POST['btn'])){
 
  $input->post("email")->isEmpty()->email();
  $input->post("password")->isEmpty()->password()->length(5,15);


  $email = $input->values['email'];
  $password = $input->values['password'];


  if($input->submit()){

      if($db->Authentication($tablename,$email)){
        foreach ($db->Authentication($tablename,$email) as $key => $value){
          if(password_verify ($password ,$value['passwords'])){

            if(isset($_POST['remember']) && $_POST['remember'] == 'yes'){
              //cookie here....
              setcookie('name', $value['name'], time() +600,'/',null,null,true);
              //setcookie('name', $value['name'], time() +600);
              appsConfig::Redirect('panel.php');
            }
            else{
              //session here...
              Session::set('name',$value['name']);
              Session::set('last-login-timestamp',time());
              appsConfig::Redirect('panel.php');
            }



              echo '<div class="alert alert-success" role="alert">Success ! Login Successfully.....</div>';
            break;
          }else{
            echo '<div class="alert alert-danger" role="alert">Error ! Your password does not match.</div>';
          }
        }


      }
      else{
        echo '<div class="alert alert-danger" role="alert">Error ! Your username does not match.</div>';
      }

    
  }
  else{
     echo '<div class="alert alert-danger" role="alert">';
     foreach ($input->errors as $key => $value) {
       foreach ($value as $k => $v) {
         echo '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '.$key.' field : '.$v.'<br/>';
       }
     }
     echo '</div>';

  }
}


?>


<?php Csrf::csrf();?>




<form method="post" action="">
<input type="hidden" name="_token" value="<?php echo Csrf::_token();?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $email;?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo $password;?>">
  </div>

    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="remember" value="yes">
      Remember Password
    </label>
  </div>
  <br/>
  <button type="submit" class="btn btn-primary" name="btn"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Login Account</button>



  </form>
</div>



</div>
</div>

<div style="margin-bottom: 100px"></div>