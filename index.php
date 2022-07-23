<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sample Ajax</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>List of Categories</h1>
        <button type="button" name="" id="btnCreateCategory" class="btn btn-primary btn-lg btn-block">
            Create Category
        </button>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                </tr>
            </thead>

            <tbody id="tableBody">
               
            </tbody>

        </table>
    </div>

    <template id="categoryRowTemplate">
        <tr>
            <td class="tdID">id </td>
            <td class="tdName">Name</td>
        </tr>
    </template>
    
    <script>
       
       function loadData(){
            //get data from php file: GET method
            $.ajax({
                url : "categories.get.php"
            })
            .done(function(data){
                let result = JSON.parse(data);

                var template = document.querySelector("#categoryRowTemplate");
                var parent = document.querySelector("#tableBody");
                parent.innerHTML = "";

                result.forEach(item => {
                    let clone = template.content.cloneNode(true);
                    clone.querySelector("tr td.tdID").innerHTML = item.id;
                    clone.querySelector("tr td.tdName").innerHTML = item.name;
                    parent.append(clone);
                });
            });
       }

       $(document).ready(function(){
           loadData();
            $("#btnCreateCategory").click(function(){
                $.ajax({
                    url: "categories.create.php",
                    type: "GET",
                    data:  {
                        name : "HELLLLLLLLLLLPPPPPPPPPPPPPPPPPPPPPPPP"
                    }
                }).done(function(data){
                    let result = JSON.parse(data);
                    console.log(result);
                    if(result.res == "success"){
                        loadData();
                    }else{
                        alert("Something happened");
                    }
                });
            });

       });



       
    </script>


</body>
</html>