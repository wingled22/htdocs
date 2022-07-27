
    var idOfItemToUpdate;
    var idOfItemToDelete;
      
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

                clone.querySelector("tr td .updateCategory").setAttribute("data-cat-id", item.id);
                clone.querySelector("tr td .deleteCategory").setAttribute("data-cat-id", item.id);

                parent.append(clone);
            });
        });
    }

    $(document).ready(function(){

        loadData();

        $("#btnSaveCategory").click(function(){
            var categoryName = document.querySelector("#categoryName").value;

            if(categoryName.length > 0){
                // send data to server
                $.ajax({
                    url  : "categories.create.php",
                    type : "GET",
                    data :  {
                        name : categoryName
                    }
                })
                .done(function(data){
                    let result = JSON.parse(data);

                    if(result.res == "success"){
                        // alert("done saving data");
                        loadData();

                        //to hide modal
                        $("#exampleModal").modal("toggle");
                        
                        //clear form
                        document.querySelector("form").reset();

                    }else{
                        alert("Error, Something happened");
                    }
                });

            }else{
                alert("no data on the name");
            }
        });


        // $(".updateCategory").click(function(){
        //     console.log("I was clicked");
        // });

        $("body").on("click",".updateCategory", function(){
            $("#updateModal").modal("toggle");

            idOfItemToUpdate = $(this).data('cat-id');
            
            var getCatPromise = new Promise(function(resolve, reject){
                //get data by Id
                $.ajax({
                    url  : "categories.getById.php",
                    type : "GET",
                    data :  {
                        catId : idOfItemToUpdate
                    },
                    success: function (data) {
                        resolve(data)
                    },
                    error: function (data) {
                        reject(data)
                    }
                });
            });
        
            getCatPromise.then(function(data){

                let result = JSON.parse(data);
                console.log(result);
                $("#categoryNameUpdate").val(result.name);
            })
            .catch((err) => {
                console.table(err);
            });

            //append the data to form

            
        });



        $("#btnUpdateCategory").click(function(){

            var newNameValue = $("#categoryNameUpdate").val();

            $.ajax({
                url  : "categories.update.php",
                type : "GET",
                data :  {
                    name : newNameValue,
                    id: idOfItemToUpdate
                }
            })
            .done(function(data){
                let result = JSON.parse(data);

                if(result.res == "success"){
                    // alert("done saving data");
                    loadData();

                    //to hide modal
                    $("#updateModal").modal("toggle");
                    
                    //clear form
                    document.querySelector("form").reset();

                }else{
                    alert("Error, Something happened");
                }
            });

        });

        $("body").on("click",".deleteCategory", function(){

            idOfItemToDelete = $(this).data('cat-id');

            // $("#deleteModal").modal("toggle");
            Swal.fire({
                title: 'Are you sure?',
                text: "<h1>You won't be able to revert this!</h1>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {

                if (result.isConfirmed) {
                   
                    $.ajax({
                        url  : "categories.delete.php",
                        type : "GET",
                        data :  {
                            id: idOfItemToDelete
                        }
                    })
                    .done(function(data){
                        let result = JSON.parse(data);
        
                        if(result.res == "success"){
                            // alert("done saving data");
                            loadData();
        

                            Swal.fire(
                                'Deleted!',
                                'Category has been deleted.',
                                'success'
                            );
        
                        }else{
                            alert("Error, Something happened");
                        }
                    });

                    
                    ;
                }
            })
        });
    })
  
