<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
  .card {
    border: 1px solid #ccc;
    background-color: #f4f4f4;
    padding: 0px;
    margin-bottom: 10px;
    margin:10px 10px 10px 30px;
    float:left;
  }
  .list {
   
    margin:10px 10px 10px 30px;
    
  }
</style>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    </br></br>
     &nbsp; &nbsp;
      <button type="button" class="btn btn-primary" id="news">Show New List</button>
      <button class="btn btn-primary" onclick="window.location.href='/domain'">Site Management</button>
     
        <!-- Fonts -->
        <h2  class="list" > News List </h2>
        <?php
      $count=1;
     ?>
      &nbsp; &nbsp;
     
              @foreach($articles as $article)  
              <?php  
              $publish =date("Y-m-d h:i:sa", strtotime($article['publishedAt']));
               $author = strip_tags($article['author']);
              ?>
              <div class="card" style="width: 75rem;">
             
              <div class="card-body">
                @if($article['urlToImage'])<a href={{$article['url']}}><img style="width:200px" src="{{$article['urlToImage']}}"></a>@endif
                @if($article['title'])<h5 class="card-title">Title:<a href={{$article['url']}}>{{$article['title']}}</a></h5>@endif
                  @if($article['description'])<p class="card-text">Description:<a href={{$article['url']}}>{{$article['description']}}</a></p>@endif
              
                  @if($author)<p class="card-text">
                    Author:{{$author}}</p> @endif
                  @if($publish)<p class="card-text">Publish:{{$publish}}</p>@endif
                  @if($article['content']) <p class="card-text">Content:<a href={{$article['url']}}>{{$article['content']}}</a></p>@endif
                </div>
              </div>
              
      
        @endforeach
      

	