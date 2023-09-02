<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 Fetch records using jQuery AJAX - Cairocoders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Laravel 9 Fetch records using jQuery AJAX </h2>
        <div class="row">
            <div class="col-lg-2">
                <input type='text' id='search' name='search' placeholder='Enter product id 1-27' class="form-control">
            </div>
            <div class="col-lg-10">
                <input type='button' value='Search' id='but_search' class="btn btn-success">
            </div>
        </div>
        <p><br /><input type='button' value='Fetch all records' id='but_fetchall' class="btn btn-success"></p>
        <table class="table table-bordered table-striped" id="productTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <script type='text/javascript'>
        $(document).ready(function() {

            // Fetch all records
            $('#but_fetchall').click(function() {
                fetchRecords(0);
            });

            // Search by id
            $('#but_search').click(function() {
                var userid = Number($('#search').val().trim());
                if (userid > 0) {
                    fetchRecords(userid);
                }
            });

        });

        function fetchRecords(id) {
            $.ajax({
                url: 'getproducts/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {

                    var len = 0;
                    $('#productTable tbody').empty(); // Empty <tbody>
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var price = response['data'][i].price;

                            var tr_str = "<tr>" +
                                "<td>" + (i + 1) + "</td>" +
                                "<td>" + name + "</td>" +
                                "<td>" + price + "</td>" +
                                "</tr>";

                            $("#productTable tbody").append(tr_str);
                        }
                    } else {
                        var tr_str = "<tr>" +
                            "<td colspan='4'>No record found.</td>" +
                            "</tr>";

                        $("#productTable tbody").append(tr_str);
                    }

                }
            });
        }
    </script>
</body>

</html>
