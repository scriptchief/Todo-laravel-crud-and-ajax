

<!--  -->

<!DOCTYPE html>
<html>
<head>
  <title>Laravel</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
  <div class="card text-center">
    <div class="card-header">
      Kumsal Agency Simple Sample Project for Hiring 
    </div>
  </div>

  @yield('content')  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
  <script type="text/javascript">

    $(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('todos.index') }}",
        columns: [
        {data: 'id', name: 'id'},
        {data: 'title', name: 'title'},
        {data: 'task', name: 'task'},
        {data: 'cost', name: 'cost'},
        {data: 'location', name: 'location'},
        {data: 'status', name: 'status'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
      });
      $('#createNewTodo').click(function () {
        $('#kaydetBtn').val("olustur-todo");
        $('#todo_id').val('');
        $('#todoForm').trigger("reset");
        $('#modelHeading').html("Yeni Görev");
        $('#ajaxModel').modal('show');
      });
      $('body').on('click', '.editTodo', function () {
        var todo_id = $(this).data('id');
        $.get("{{ route('todos.index') }}" +'/' + todo_id +'/edit', function (data) {
          $('#modelHeading').html("Düzenle");
          $('#kaydetBtn').val("edit-todo");
          $('#ajaxModel').modal('show');
          $('#todo_id').val(data.id);
          $('#title').val(data.title);
          $('#task').val(data.task);
          $('#cost').val(data.cost);
          $('#location').val(data.location);
          $('input[name="status"]:checked').val(data.status)
        })
      });
      $('#kaydetBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Kaydet');

        $.ajax({
          data: $('#todoForm').serialize(),
          url: "{{ route('todos.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

            $('#todoForm').trigger("reset");
            $('#ajaxModel').modal('hide');
            table.draw();

          },
          error: function (data) {
            console.log('Error:', data);
            $('#kaydetBtn').html('Kaydet');
          }
        });
      });

      $('body').on('click', '.deleteTodo', function () {

        var todo_id = $(this).data("id");
        confirm("Silmek istiyor musun?");

        $.ajax({
          type: "DELETE",
          url: "{{ route('todos.store') }}"+'/'+todo_id,
          success: function (data) {
            table.draw();
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      });


     

    });
  </script>
</body>
</html>