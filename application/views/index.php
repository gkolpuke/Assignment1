<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Questionnaire Demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.greyborder{
	border:2px solid grey; 
	padding-bottom:10px;}
	.divider{border:1px solide grey;}.padlr20{padding-left:20px; padding-right: 20px}
 .divider{margin: 10px 0px 10px !important;}.heading{margin-bottom: 0px !important;color:#7CC6C6;}
 .linkcolor{color:gray;}
 .mainans{ margin: 10px }
</style>
</head>
<body>


<div class="container">
<div class="greyborder">
<div class ="row padlr20">
<div class="header padlr20">  <h4 class="heading"> ADD NEW CALL </h4> </div></div>
<form id="quest">
<div class="questions">
	<!-- <hr class= "divider">
	<div class="row question">
		<div  class="col-md-12">	
			<div class="col-md-10">  <input type="" name="quest[]" class="form-control">   </div>
			<div class="col-md-2"> 
				<select name="type[]" class="form-control" onChange="ansdiv(this,0);">
					<option value="Multiline Text">Multiline Text</option>
					<option value="Single Choice">Single Choice</option>
					<option value="Multi Choice">Multi Choice</option>
				</select>
			</div>
 		</div>
 		<div class="col-md-12" id="ansdiv0">
 	
 		</div> 
	</div> -->

</div>
</form>


<hr class="divider">
<div class="row padlr20">
	<div class="col-md-12"> 
   <a href="javascript:void(0)" onclick="addnewq();"  class ="pull-right linkcolor">+Add new question</a>
</div>
  </div>
 
<hr class="divider">
<div class="row">
<div class="col-md-12">
 <div class="col-md-6">
 	<input type="button"  class="btn btn-primary" onclick="savedata();"  value="save">
   <a href="">Cancel  </a>
  </div>
</div>
 </div> 

</div>
</div>

</body>
<script>
	function ansdiv(id,no)
	{
		var count=$('.question').length;
		var value=id.value;
		if(value=='Multiline Text')
		{
			html='<div class="col-md-12"><textarea class="form-control" name="ans'+count+'[]"></textarea></div>';
		}
		else if(value=='Single Choice')
		{
			html='<div class="col-md-6"><input type="text" class="form-control" name="ans'+count+'[]"></textarea></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div>';
		}
		else if(value=='Multi Choice')
		{
			html='<div class="col-md-6"><input type="text" class="form-control" name="ans'+count+'[]"></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div><div class="col-md-6"><input type="text" class="form-control" name="ans'+count+'[]"></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div><div class="col-md-6"><input type="text" class="form-control" name="ans'+count+'[]"></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div><div class="col-md-6"><input type="text" class="form-control" name="ans'+count+'[]"></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div><div class="col-md-6"><input type="text" class="form-control" name="ans'+count+'[]"></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div>';
		}
		$('#ansdiv'+no).html(html);
	}
	function subansdiv(id,no)
	{
		var count=$('.subquestion').length;
		var value=id.value;
		if(value=='Multiline Text')
		{
			html='<div class="col-md-12"><textarea class="form-control" name="ans'+no+'[]"></textarea></div>';
		}
		else if(value=='Single Choice')
		{
			html='<div class="col-md-6"><input type="text" class="form-control" name="ans'+no+'[]"></textarea></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div>';
		}
		else if(value=='Multi Choice')
		{
			html='<div class="col-md-6"><input type="text" class="form-control" name="ans'+no+'[]"></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div><div class="col-md-6"><input type="text" class="form-control" name="ans'+count+'[]"></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div><div class="col-md-6"><input type="text" class="form-control" name="ans'+count+'[]"></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div><div class="col-md-6"><input type="text" class="form-control" name="ans'+count+'[]"></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div><div class="col-md-6"><input type="text" class="form-control" name="ans'+count+'[]"></div><div class="col-md-6"><a href="javascript:void(0)" onclick="addnewsq('+count+');"  class ="linkcolor">+Add new sub question</a></div><div class="col-md-12 subq'+count+'"></div>';
		}
		$('#subansdiv'+no).html(html);
	}
	function addnewsq(no)
	{
		//var count=$('.question').length;
		var html='<hr class= "divider"><div class="row subquestion"><div  class="col-md-12"><div class="col-md-10">  <input type="" name="subquest'+no+'[]" class="form-control"></div><div class="col-md-2"><select name="subtype'+no+'[]" class="form-control" onChange="subansdiv(this,'+no+');"><option value="Multiline Text">Multiline Text</option><option value="Single Choice">Single Choice</option><option value="Multi Choice">Multi Choice</option></select></div></div><div class="col-md-12" id="subansdiv'+no+'"></div></div>';
		$(".subq"+no).append(html);
	}

	function addnewq()
	{
		var count=$('.question').length;
		var qno=count+1;
		var html='<hr class= "divider">'+qno+'<div class="row question"><div  class="col-md-12"><div class="col-md-10">  <input type="" name="quest[]" class="form-control"></div><div class="col-md-2"><select name="type[]" class="form-control" onChange="ansdiv(this,'+count+');"><option value="Multiline Text">Multiline Text</option><option value="Single Choice">Single Choice</option><option value="Multi Choice">Multi Choice</option></select></div></div><div class="col-md-12 mainans" id="ansdiv'+count+'"></div></div>';
		$(".questions").append(html);
	}
	function savedata()
	{
		var burl="<?php echo base_url(); ?>";
		$.ajax({
           type: "POST",
           url: burl+'api/Restapi/save',
           data: $("#quest").serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data.message); // show response from the php script.
               location.reload();
           }
         });
	}
</script>
</html>