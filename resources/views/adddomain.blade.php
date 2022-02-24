<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style type="text/css">
    .error {
      color: #F00;
    
    }
    .required-field::before {
      content: "*";
      color: red;
    }
</style>
</br>  
&nbsp;&nbsp;
<button class="btn btn-primary" onclick="window.location.href='/'">Back</button>
<form  role="form"  action="{{url('/adddomain')}}" method="POST" enctype="multipart/form-data" id="add_forms">
    @csrf
   
        <div class="col-md-6">
            <h2> Add Domain </h2>
            <label for="title">Domain Name
                : <span class="required-field"></span> </label>
            <input type="text" class="form-control" name="domain" id="domain" placeholder="Enter Domain Name">
        </div>
      

        <div class="col-md-6">
        </br>
        <button type="submit" class="btn btn-primary">Add
            Domain</button>
        </div>
   
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
function validateDOMAIN(value){
      
      //var expression =(/^[a-z0-9_-]+(\.(com|net|org))?$/i);
      var expression = /^([A-Za-z0-9\-\.])+\.((com)|(org)|(co.in)|(net))$/i;
      
      var regex = new RegExp(expression);
      return value.match(regex);
    }
    $.validator.addMethod("domain", function(value, element) {
      return this.optional(element) || validateDOMAIN(value);
    }, "Domain Name extension Should be .com,.org,.co.in,.net");

        $("#add_forms").validate({
                
                rules: {
                    domain:{
                    required:true,
                    domain : {domain : true }
                    
            },
                },
            messages: {
                domain: {
            required: "Please Enter Domain Name",
            
        },
    },


              
            });
});
            </script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('success'))
    <script type="text/javascript">
      swal("Congratulations!", " {{ Session::get('success') }}", "success");
    </script>
    @endif
   
    @if(Session::has('error'))
    <script type="text/javascript">
      swal("Bad Luck!", " {{ Session::get('error') }}", "error");
    </script>
    @endif