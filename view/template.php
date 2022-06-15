<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

  <style>
    span.status {
      border-radius: 50%;
      width: 15px;
      height: 15px;
      display: block;
    }

    span.status.active {
      background-color: green;
    }

    span.status.no-active {
      background-color: transparent;
      border: 1px solid gray;
    }

    .title-wrap {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .table {
      border-top: 1px solid gray;
    }
  </style>
</head>

<body>
  <div class="container">
    <?= $isi ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>

  <?php
  $id = addslashes($_GET['id']);
  $add = addslashes($_GET['add']);

  if ($id || $add) {
  ?>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <?php
  }
  ?>


  <script>
    $(document).ready(function() {
      $('#dtOrderExample').DataTable({
        "aaSorting": [],
        columnDefs: [{
          orderable: false,
          targets: [3, 4, 5],
          pagination: false,
        }]
      });
      $('.dataTables_length').addClass('bs-select');

      $('.toggle-group').click(function(e) {
        e.preventDefault();

        $('#status').is(function() {
          if ($(this).val() == 0) {
            $(this).val(1);
          } else {
            $(this).val(0);
          }
        });
      });
    });
  </script>
</body>

</html>