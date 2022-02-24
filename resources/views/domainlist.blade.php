<!DOCTYPE html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    </br></br>
     &nbsp; &nbsp;
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<style type="text/css">
    #domainlist {
        padding: 0px;
        margin-bottom: 30px;
        margin:30px 30px 30px 10px;
   
        
      }
      #list{
        margin:10px 10px 10px 30px;
      }
     
      
      </style>
 <button class="btn btn-primary" onclick="window.location.href='/domain'">Back</button>
        <!-- Fonts -->
        <h2  id="list" > Domain List </h2>
        <?php
      $count=1;
     ?>
      
        <table style="height:50px"  id="domainlist" class="table table-bordered mb-0">
           
            <thead>
                
                <tr>
                    <th >ID</th>
                    <th >Domain name</th>
                    <th >Domain Valid</th>
                    <th >Delete</th>
                    
                    
                </tr>
            </thead>
            <tbody>
              @foreach($domains as $domain)  
              
         <tr>
        <td>{{$count++}}</td>
      <td>{{$domain->domain}}</td>
        <td>@if($domain->valid==1)
               Yes
               @else
               No
               @endif </td>
<td>  <a href="#" data-toggle="modal" data-target="#deletemodal{{ $domain->id }}"><i class="fa fa-trash-o fa-lg"></i></a>
    &nbsp;&nbsp;
    <div class="modal fade" id="deletemodal{{ $domain->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                       Domain Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{url('/deletedomain')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$domain->id}}">
                        <div class="card-body">
                            Are You Sure To Delete?
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary float-right">Yes
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
   
    
        @endforeach
        
    </tbody>
   
   </table>
   
   
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
    <script>
    $(document).ready( function () {
        $('#domainlist').DataTable();
          } );
          </script>