<?php
session_start();
$id = $_SESSION["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expense Tracker | Add Your Expenses </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="plugins/animate/animate.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<!-- <button type="button" id="get">get</button> -->
    <h5 class="form-title text-center"><a href="login2.php">Login/Logout</a></h5>
    
    <div class="main">
        <div class="container">
            <div class = "row">
                <div class="col-md-12">
                    <h2 class="form-title expense-list">Expenses List</h2>
                    <table>
                        <thead>
                            <tr>
                            <th>Expense Category</th>
                            <th>Date</th>
                            <th>Amount</th>
                            </tr>
                            <!-- <tr>
                            <td>Alfreds Futterkiste</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            </tr> -->
                        </thead>                    
                        <tbody id="entries">
                        </tbody>
                    </table>
                    <br>
                    <div class = "row">
                        <div class="col-md-12">
                            <button type="button" id="add_item" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add Expenses</button>
                        </div>
                    </div>
                    <div id="modalDialog" class="modal">
                        <div class="modal-content animate-top">
                            <div class="modal-header">
                                <h5 class="modal-title ">Add a new expense</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="post" id="contactFrm">
                                <div class="modal-body">
                                    <!-- Form submission status -->
                                    <div class="response"></div>
                
                                    <!-- Contact form -->
                                    <div class="form-group">
                                        <label for="category"></label>
                                        <input type="text" id="category" name="category" class="form-control" placeholder="Category" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="expense_date"></label>
                                        <input type="date" id="expense_date" name="expense_date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount"></label>
                                        <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount in LBP" required>
                                    </div>
        
                
                                </div>
                                <div class="modal-footer">
                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div> 
    </div>
  

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        var modal = $('#modalDialog');
        var btn = $("#add_item");
        var span = $(".close");
        $('body').bind('click', function (e) {
            if ($(e.target).hasClass("modal")) {
                modal.hide();
            }
        });

        $(document).ready(function () {
            btn.on('click', function () {
                modal.show();
            });

            span.on('click', function () {
                modal.hide();
            });
        });
        </script>
        <script>
        $(document).ready(function() {
            $('#contactFrm').submit(function (e) {
                e.preventDefault();
                $('.modal-body').css('opacity', '1');
                $('.btn').prop('disabled', true);
                modal.hide();

                var amount = $("#amount").val();
                var expense_date = $("#expense_date").val();
                var category = $("#category").val();

            });
        });

        async function fetchAPI(){
				const response = await fetch('http://localhost/expenses/expenses.php?id=<?php echo $id;?>');
				if(!response.ok){
					const message = "An Error has occured";
					throw new Error(message);
				}
				
				const results = await response.json();
				return results; 
			}

    
            fetchAPI().then(results => {
               for (var i=0; i<results.length; i++) {
                   var row = 
                    ` 
                        <tr>
                            <th scope="row"></th>
                            <td>${results[i].category}</td>
                            <td>${results[i].amount}</td>
                            <td>${results[i].date}</td>
                        </tr>
                        ` ;
                        $('#entries').append(row);
            }
            
        }).catch(error => {
            console.log(error.message);
        })
               
        
    
        
            $("#get").click(getData);
            function getData(){
                fetchAPI().then(results => {
                    console.log(results);
                }).catch(error => {
                    console.log(error.message);
                })
            }


    </script>

    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>