<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container py-3">
    <div class="row"> 
      <div class="col-md-12">
        <div id="successmsg"></div>
        <div class="card">
              <div class="card-header">
              <h4>Books Data
                <a  class="btn btn-primary float-end btn-sm" data-bs-toggle="modal" data-bs-target="#addBook">Add Book</a>
                
              </h4>
              </div>
              <div class="card-body">
                
                  <table class="table table-borderd table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Edition</th>
                        <th>No of Pages</th>
                        <th colspan="2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                
              </div>
        </div>
      </div>
    </div>
  </div>
    

<!-- Book Modal -->
<div class="modal fade" id="addBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Book</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
        @csrf
        <ul id="errlist"></ul>
          <div class="mb">
            <label for="recipient-name" class="col-form-label">Book Title:</label>
            <input type="text" class="form-control" id="title" required>
          </div>
          <div class="mb">
            <label for="recipient-name" class="col-form-label">Author:</label>
            <input type="text" class="form-control" id="author" required>
          </div>
          <div class="mb">
            <label for="recipient-name" class="col-form-label">Edition:</label>
            <input type="text" class="form-control" id="edition" required>
          </div>
          <div class="mb">
            <label for="recipient-name" class="col-form-label">No of pages:</label>
            <input type="number" class="form-control" id="no_of_pages" required>
          </div>
          
        </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary addbook">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- end Book Model -->

<!-- edit Book Modal -->
<div class="modal fade" id="editbook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Book</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
        @csrf
        <ul id="update_errlist"></ul>
        <div class="mb">
            <label for="recipient-name" class="col-form-label">ID</label>
            <input type="number"  class="form-control" id="editid" disabled required>
          </div>
          <div class="mb">
            <label for="recipient-name" class="col-form-label">Book Title:</label>
            <input type="text"  class="form-control" id="edittitle" required>
          </div>
          <div class="mb">
            <label for="recipient-name" class="col-form-label">Author:</label>
            <input type="text" class="form-control" id="editauthor" required>
          </div>
          <div class="mb">
            <label for="recipient-name" class="col-form-label">Edition:</label>
            <input type="text" class="form-control" id="editedition" required>
          </div>
          <div class="mb">
            <label for="recipient-name" class="col-form-label">No of pages:</label>
            <input type="number" class="form-control" id="editno_of_pages" required>
          </div>
          
        </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary updatebook">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- end Edit Book Model -->


<!-- Delete Book Modal -->
<div class="modal fade" id="deletebook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Book</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form>
        <h5>Are you sure ? Want to Delete the Record?</h5>
        <div class="mb">
            <input type="hidden"  class="form-control" id="deleteid" disabled required>
          </div>
          
          </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary Yesdelete_book">Yes Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- end Delete Book Model -->



<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {

      ///Get Books Data
      showbooks();
      function showbooks(){
        $.ajax({
          type: "GET",
          url: "/showbooks",
          dataType: "json",
          success: function (response) {
            //console.log(response.books);
            $.each(response.books, function (key, item) { 
               $('tbody').append('<tr>\
                          <td>'+item.id+'</td>\
                          <td>'+item.title+'</td>\
                          <td>'+item.author+'</td>\
                          <td>'+item.edition+'</td>\
                          <td>'+item.no_of_pages+'</td>\
                          <td><button value="'+item.id+'" class="btn btn-primary edit_book" >Edit</button></td>\
                          <td><button value="'+item.id+'" class="btn btn-danger deletebook">Delete</button></td>\
                      </tr>');
            });
          }
        });
      }
      // End Show Book Data

    //// Add Book Model
    $(document).on('click','.addbook',function (e) {
      e.preventDefault();
      // console.log("cliked");
        var data ={
          'title': $('#title').val(),
          'author': $('#author').val(),
          'edition': $('#edition').val(),
          'nofpages': $('#no_of_pages').val(),
          
        
        }
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        //console.log(data);
          $.ajax({
            type: "POST",
            url: "/storebooks",
            data: data,
            dataType: "json",
            success: function (response) {
              //console.log(response);
              if(response.status ==400){
                $('#errlist').html("");
                $('#errlist').addClass('alert alert-danger');
                $.each(response.errors, function (key, err_values) { 
                  $('#errlist').append('<li>'+err_values+'</li>');
                });
              }
              else{
                $('#errlist').html("");
                $('#successmsg').addClass('alert alert-success');
                $('#successmsg').text(response.message);
                $('#addBook').each(function(){
                        $(this).modal('hide');
                    });
                //$('#addBook').model('hide');
                $('#addBook').find('input').val("");
              }
            }
          });
    });
    /// End add Book Model

    //// loading Edit Book Model
    $(document).on('click','.edit_book',function (e) {
        e.preventDefault();
        var book_id= $(this).val();
       // console.log(book_id);
        //$('#editbook').model('show');
        $('#editbook').each(function(){
              $(this).modal('show');
          });

          $.ajax({
            type: "GET", 
            url: "/editbooks/"+book_id,
            success: function (response) {
              //console.log(response);
              if(response.status == 400){
                  $('#success').html("");
                  $('#success').addClass('alert alert-danger');
                  $('#success').text(response.message);
              }
              else{
                $('#editid').val(response.books.id);
                $('#edittitle').val(response.books.title);
                $('#editauthor').val(response.books.author);
                $('#editedition').val(response.books.edition);
                $('#editno_of_pages').val(response.books.no_of_pages);
               
              }
            }
          });
      });
      /// End Edit Model
    
    
  
    ///// UpdatingBook Record
    $(document).on('click','.updatebook',function (e) {
      e.preventDefault();
      // console.log("cliked");
      var book_id =$('#editid').val();
        var data ={
          
          'title': $('#edittitle').val(),
          'author': $('#editauthor').val(),
          'edition': $('#editedition').val(),
          'nofpages': $('#editno_of_pages').val(),
          
        }
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        //console.log(data);
          $.ajax({
            type: "PUT",
            url: "/booksupdate/"+book_id,
            data: data,
            dataType: "json",
            success: function (response) {
              console.log(response);
              if(response.status ==400){
                $('#update_errlist').html("");
                $('#update_errlist').addClass('alert alert-danger');
                $.each(response.errors, function (key, err_values) { 
                  $('#update_errlist').append('<li>'+err_values+'</li>');
                });

              }
              else if(response.status ==404){
                $('#update_errlist').html("");
                $('#editbook').each(function(){
                        $(this).modal('hide');
                    });
                  $('#successmsg').addClass('alert alert-danger');
                  $('#successmsg').text(response.message);
              }
              else{

                  $('#update_errlist').html("");
                  $('#successmsg').html("");
                  $('#successmsg').addClass('alert alert-success');
                  $('#successmsg').text(response.message);
                  $('#editbook').each(function(){
                        $(this).modal('hide');
                    });
                    // Get Books Data
                   //showbooks();
                   //location.reload();
              }
            }
          });
    });
    //End Updating Record

    ///Loading Delete the Book Record Model//////
  $(document).on('click','.deletebook', function (e) {
        e.preventDefault();
        var book_id= $(this).val();
      //  alert(book_id);
        $('#deletebook').each(function(){
              $(this).modal('show');
          });
          
        $('#deleteid').val(book_id);

      });

      //////Deleting Record
    $(document).on('click','.Yesdelete_book', function (e) {
        e.preventDefault();
        var book_id= $('#deleteid').val();
      //  alert(book_id);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        $.ajax({
          type: "DELETE",
          url: "/delete-book/"+book_id,
          success: function (response) {
           // console.log(response);
            if(response.status==200){
              $('#successmsg').html("");
                $('#deletebook').each(function(){
                        $(this).modal('hide');
                    });
                  $('#successmsg').addClass('alert alert-success');
                  $('#successmsg').text(response.message);
                 // showbooks();
               }
          }
        });
      });
  /////end Delete record
  });
</script>
</body>
</html>