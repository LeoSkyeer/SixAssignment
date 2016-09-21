<h4 style="text-align: center">Список членов организации</h4>
<p style="text-align: center">(только для зарегестрированных лиц) </p>
<!--<table>-->
<!--<tr><td>Имя</td><td>Возраст</td><td>Сообщение</td></tr>-->
	<?php

	?>
<div class="row" style="margin-top: 30px">
	
    <form role="form" class="shake" action="sendLogin\send" method="POST" id="loginPassword" data-toggle="validator" name="setLogin" enctype="multipart/form-data">
  <div class="col-md-8 col-md-offset-2" >
  		<div class="well" style="background-color:lightgrey" >
  					<div class="row">
  							<div class="form-group col-md-8 col-md-offset-2">
  									<label for="login">Имя</label>
  									<input id="login" type="text" name="userLogin" placeholder="Login" class="form-control">
  									<div class="help-block with-errors"></div>
  							</div>
                    	<input type="submit" class="col-md-6 btn btn-xs btn-success col-md-offset-3" value="Login" name="setLogin">
  					</div>

            </div>
  </div>

    </form>
    </div>
