<?php 
	require "header.php";
	require "sidebar.php";
	require "config.php";
	
    
    

    
$errors=array();

if (isset($_POST['submit'])) {
    $name=isset($_POST['name'])?$_POST['name']:'';
       if (count($errors)==0) {
        $sql="INSERT INTO categories (name)
	    VALUES ('".$name."')";

        if ($conn->query($sql) == true) {
            echo "<script>alert('Categories ADD')</script>";   
                 
            
        } else {
            $errors[]=array("input"=>"form","msg"=>"*");
        }
        

    } else {
        foreach ($errors as $error) {
            echo "*".$error['msg'];
        }
    }
    
}


?>


		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			
			
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>ADD Categories</h3>
					
					<ul class="content-box-tabs">
						
					</ul>
					
					<div class="clear"></div>
					
				</div> 
						
										
										
										
					<div class="tab-content" id="tab2" style="margin-left:30px;margin-top:20px;">
					
						<form action="new.php" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								
								
								<p>
									<label>Name</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="name" required/>
									<br /><small>Enter the name of the product</small>
								</p>

								
								<p>
									<input class="button" type="submit" name="submit" value="ADD" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->

			<div class="clear"></div>



<?php require "footer.php"; ?>
